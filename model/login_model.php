<?php   
    require('model.php'); 

    if (isset($_POST["email"]) && isset($_POST["password"]))
    {
        // prepare SQL
        $sql = sprintf("SELECT 1 FROM users WHERE email='%s' AND password='%s'",
                       mysqli_real_escape_string($conn,$_POST["email"]),
                       MD5(mysqli_real_escape_string($conn,$_POST["password"])));

        $sql_only_email = sprintf("SELECT 1 FROM users WHERE email='%s'",
                       mysqli_real_escape_string($conn,$_POST["email"]));

        $sql_check_banned = sprintf("SELECT 1 FROM banned WHERE email='%s'",
                       mysqli_real_escape_string($conn,$_POST["email"]));
        // execute query
        $result = mysqli_query($conn,$sql);
        $num_rows=mysqli_num_rows($result);

        $result_only_email = mysqli_query($conn,$sql_only_email);
        $num_rows_only_email=mysqli_num_rows($result_only_email);

        $result_check_banned = mysqli_query($conn,$sql_check_banned);
        $num_rows_check_banned = mysqli_num_rows($result_check_banned);

        if ($result == false){
            print('<h4 class="text-center alert alert-danger" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Something went wrong, please try again in couple of minutes.</h4>');
        }
        elseif ($num_rows_check_banned == 1){
            print('<h4 class="text-center alert alert-danger" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Account is banned from this website.</h4>');
        }
        // check whether we found a row
        elseif($num_rows == 1)
        {
            //geting user Id from database
            $sql_user_id = sprintf("SELECT id FROM users WHERE email='%s'",
                       mysqli_real_escape_string($conn,$_POST["email"]));
            $result_user_id = mysqli_query($conn,$sql_user_id);
            $user_info = $result_user_id->fetch_array(MYSQLI_ASSOC);
            $_SESSION["user_id"] = $user_info['id'];
            // remember that user's logged in
            $_SESSION["auth"] = "on";
            header("Location:http://localhost/orthodox-icons-shop/index.php?shop=Proceed+to+Shop");
            $conn->close();
            exit;
        }
        elseif ($num_rows_only_email == 1) {
            print('<h4 class="text-center alert alert-danger animated zoomIn" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Wrong Password!</h4>');
        }
        else{
            print('<h4 class="text-center alert alert-danger animated zoomIn" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">You are not registred. You have to register in order to Login! </h4>');
        } 
    }  
    $conn->close();
?> 