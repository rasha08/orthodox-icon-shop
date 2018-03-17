<?php
    require('model.php'); 
    if(@$_SESSION['admin_auth'] == 'on'){

        if(@$_POST['icon_change']=="Add New Icon To Database"){
            $name = @$_POST['name'];
            $description = @$_POST['description'];
            $large_img = @$_POST['img'];
            $min_img =  @$_POST['img'].'-min';
            $thumb_img = @$_POST['img'];
            $price_id = intval(@$_POST['price_id']);

            if (count($_FILES)==3) {
                foreach ($_FILES as $key => $value) {
                    try {
                        // Undefined | Multiple Files | $_FILES Corruption Attack
                        // If this request falls under any of them, treat it invalid.
                        if (
                            !isset($_FILES[$key]['error']) ||
                            is_array($_FILES[$key]['error'])
                        ) {
                            throw new RuntimeException('Invalid parameters.');
                        }

                        // Check $_FILES[$key]['error'] value.
                        switch ($_FILES[$key]['error']) {
                            case UPLOAD_ERR_OK:
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                throw new RuntimeException('<h3 class="text-center alert alert-danger animated zoomIn">No file sent.</h3>');
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                throw new RuntimeException('<h3 class="text-center alert alert-danger animated zoomIn">Exceeded filesize limit.</h3>');
                            default:
                                throw new RuntimeException('Unknown errors.');
                        }

                        // You should also check filesize here. 
                        if ($_FILES[$key]['size'] > 2000000) {
                            throw new RuntimeException('<h3 class="text-center alert alert-danger animated zoomIn">Exceeded filesize limit.</h3>.');
                        }

                        // DO NOT TRUST $_FILES[$key]['mime'] VALUE !!
                        // Check MIME Type by yourself.
                        $finfo = new finfo(FILEINFO_MIME_TYPE);
                        if (false === $ext = array_search(
                            $finfo->file($_FILES[$key]['tmp_name']),
                            array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                            ),
                            true
                        )) {
                            throw new RuntimeException('<h3 class="text-center alert alert-danger animated zoomIn">Invalid file format.</h3>');
                        }

                        // You should name it uniquely.
                        // DO NOT USE $_FILES[$key]['name'] WITHOUT ANY VALIDATION !!
                        // On this example, obtain safe unique name from its binary data.
                        if($key == 'thumb-size-img'){
                            if (!move_uploaded_file(
                            $_FILES[$key]['tmp_name'],
                            sprintf('./images/thumb/%s',
                                $_FILES[$key]['name']
                            )
                            )) {
                            throw new RuntimeException('<h3 class="text-center alert alert-danger animated zoomIn">Failed to move uploaded file.</h3>');
                        }   
                            $test_1 = TRUE;
                        }
                        else{
                            if (!move_uploaded_file(
                            $_FILES[$key]['tmp_name'],
                            sprintf('./images/%s',
                                $_FILES[$key]['name']
                            )
                            )) {
                            throw new RuntimeException('<h3 class="text-center alert alert-danger animated zoomIn">Failed to move uploaded file.</h3>');
                        }
                            $test_2 = TRUE; 
                        }
                        

                    } catch (RuntimeException $e) {

                        echo $e->getMessage();

                    }
                }
                if (@$test_1 && @$test_2) {
                    $sql = sprintf("INSERT INTO icons (name, description, min_img, tumb_img, large_img, price_id)
                    VALUES ('%s', '%s', '%s', '%s','%s', '%s')",mysqli_real_escape_string($conn, @$_POST['name']), mysqli_real_escape_string($conn, @$_POST['description']),$min_img, $thumb_img, $large_img, $price_id);
                    $result = mysqli_query($conn,$sql);
                    if ($result === FALSE) {
                        print('<h4 class="text-center alert alert-danger animated zoomIn">Somethin went wrong, please check all form parameters!</h4>');
                    }else if ($result === TRUE){
                        print('<h4 class="text-center alert alert-success animated zoomIn">Icon successfully added to database!</h4>');
                }
                
            }

        }
        }
        else if (@$_GET['icon_change']=="Edit Icon") {
            $sql = "SELECT * FROM `icons` WHERE 1";
            $result = mysqli_query($conn,$sql);
        }
        else if (@$_GET['icon_change'] == "Change Icon Details") {
             $sql = sprintf("SELECT * FROM `icons` WHERE `id`='%s'",
                       mysqli_real_escape_string($conn,$_GET["icon_id"]));
            $result = mysqli_query($conn,$sql);
        }
        else if(@$_POST['icon_change']=="Make Changes"){
            $id = @$_POST['id'];
            $name = @$_POST['name'];
            $description = @$_POST['description'];
            $large_img = @$_POST['img'];
            $min_img =  @$_POST['img'].'-min';
            $thumb_img = @$_POST['img'];
            $price_id = intval(@$_POST['price_id']);


            $sql = sprintf("UPDATE `icons` SET `name`= '%s', `description`= '%s', `min_img` = '%s', `tumb_img` = '%s', `large_img` = '%s', `price_id` = '%s' WHERE `id` = %s", 
                mysqli_real_escape_string($conn, @$_POST['name']), mysqli_real_escape_string($conn, @$_POST['description']),$min_img, $thumb_img, $large_img, $price_id, $id);
            $result = mysqli_query($conn,$sql);
            if ($result === FALSE) {
                print('<h4 class="text-center alert alert-danger animated zoomIn">Somethin went wrong, please check all form parameters!</h4>');
            }else if ($result === TRUE) {
                print('<h4 class="text-center alert alert-success animated zoomIn">You have successfully changed icon details!</h4>');
            }
        }
        else if (@$_GET['icon_change']=="Delete Icon") {
            $sql = "SELECT * FROM `icons` WHERE 1";
            $result = mysqli_query($conn,$sql);            
        }
        else if(@$_POST['icon_change'] == "Delete Icon From Database"){
            $sql = sprintf("DELETE FROM icons WHERE id='%s'", $_POST['icon_id']);
            $result = mysqli_query($conn,$sql);
            if ($result === FALSE) {
                print('<h4 class="text-center alert alert-danger animated zoomIn">Somethin went wrong, please check all form parameters!</h4>');
            }else if ($result === TRUE) {
                print('<h4 class="text-center alert alert-success animated zoomIn">You have successfully deleted icon from database!</h4>');
            }
        }
        else if(@$_POST['icon_change'] == "Add Price"){
             $sql = sprintf("INSERT INTO prices (id, size, price, weight)
            VALUES ('%s', '%s', '%s', '%s')", @$_POST['id'], mysqli_real_escape_string($conn, @$_POST['size']),mysqli_real_escape_string($conn, @$_POST['price']), @$_POST['weight']);
            $result = mysqli_query($conn,$sql);
            if ($result === FALSE) {
                print('<h4 class="text-center alert alert-danger animated zoomIn">Somethin went wrong, please check all form parameters!</h4>');
            }else if ($result === TRUE) {
                print('<h4 class="text-center alert alert-success animated zoomIn">Price successfully added to database!</h4>');
            }
        }
        else if(@$_POST['icon_change'] == "Ban User From Web Page"){
            $sql_ban_user = sprintf("INSERT INTO banned (email) VALUES ('%s')", mysqli_real_escape_string($conn, @$_POST['email']));
            $result_ban_user = mysqli_query($conn,$sql_ban_user);
            if ($result_ban_user === FALSE) {
                print('<h4 class="text-center alert alert-danger animated zoomIn">Something went wrong, user is already banned from website or check all form parameters!</h4>');
        
            }else if ($result_ban_user === TRUE) {
                print('<h4 class="text-center alert alert-success animated zoomIn">User successfully banned from website!</h4>');
            }
        }
        else{
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn,$sql);

            $sql_sold_icons = "SELECT * FROM `sold_icons`";
            $result_sold_icons = mysqli_query($conn,$sql_sold_icons);

            $sql_full_stats_icons = "SELECT icons.id, icons.name FROM sold_icons LEFT JOIN icons ON sold_icons.icon_id=icons.id ORDER BY sold_icons.icon_id";
            $result_full_stats_icons = mysqli_query($conn,$sql_full_stats_icons);

            $sql_full_stats_users = "SELECT users.id, users.first_name, users.last_name, users.last_name, users.email, users.last_visit FROM sold_icons LEFT JOIN users ON sold_icons.user_id=users.id ORDER BY sold_icons.icon_id";
            $result_full_stats_users = mysqli_query($conn,$sql_full_stats_users);

            $sql_full_stats_sold_icons = "SELECT * FROM sold_icons";
            $result_full_stats_sold_icons = mysqli_query($conn,$sql_full_stats_sold_icons);
        }
    }
    else if(isset($_POST['email']) && isset($_POST['password'])){
        $sql = sprintf("SELECT 1 FROM `admin` WHERE `email`='%s' AND `password`='%s'",
                       mysqli_real_escape_string($conn,$_POST["email"]),
                       mysqli_real_escape_string($conn,$_POST["password"]));

        $sql_only_email = sprintf("SELECT 1 FROM `admin` WHERE `email`='%s'",
                       mysqli_real_escape_string($conn,$_POST["email"]));
        // execute query
        $result = mysqli_query($conn,$sql);
        $num_rows=mysqli_num_rows($result);

        $result_only_email = mysqli_query($conn,$sql_only_email);
        $num_rows_only_email=mysqli_num_rows($result_only_email);
        if($num_rows == 1)
        {
            // remember that user's logged in
            $_SESSION["admin_auth"] = "on";
            unset($_POST["email"]);
            unset($_POST["password"]);
            $conn->close();
            header("Location:http://localhost/orthodox-icons-shop/index.php?web_master=WebMaster+Zone");
            exit;
        }
        elseif ($num_rows_only_email == 1) {
            print('<h4 class="text-center alert alert-danger animated zoomIn">Wrong Password!</h4>');
        }

    }
    
    

    $conn->close();
?>  
