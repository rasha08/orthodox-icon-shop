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
            header("Location:http://localhost/orthodox-icons-shop/index.php?log_in=Log+In+%2F+Sign+Up&status=something-went-wrong");
        }
        elseif ($num_rows_check_banned == 1){
            header("Location:http://localhost/orthodox-icons-shop/index.php?log_in=Log+In+%2F+Sign+Up&status=banned");
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
            header("Location:http://localhost/orthodox-icons-shop/index.php?log_in=Log+In+%2F+Sign+Up&status=password");
        }
        else{
            header("Location:http://localhost/orthodox-icons-shop/index.php?log_in=Log+In+%2F+Sign+Up&status=not-registered");
        }
    }  
    $conn->close();
?>