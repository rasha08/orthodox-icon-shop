<?php
    require('model.php');  


    if (isset($_POST["register_email"]) && isset($_POST["register_password"]) && isset($_POST["register_first_name"]) && isset($_POST["register_last_name"]))
    {
        $date = new DateTime();
        $registered_on = date_format($date, 'Y-m-d H:i:s');
        // prepare SQL

        $sql_only_email = sprintf("SELECT 1 FROM users WHERE email='%s'",
                       mysqli_real_escape_string($conn,$_POST["register_email"]));

        $sql_check_banned = sprintf("SELECT 1 FROM banned WHERE email='%s'",
                       mysqli_real_escape_string($conn,$_POST["register_email"]));

        $sql_register = sprintf("INSERT INTO users (`email`, `password`, `first_name`, `last_name`, `registered_on`) VALUES ('%s', '%s', '%s', '%s', '%s')",
                       mysqli_real_escape_string($conn,$_POST["register_email"]),
                       MD5(mysqli_real_escape_string($conn,$_POST["register_password"])),
                       mysqli_real_escape_string($conn,$_POST["register_first_name"]),
                       mysqli_real_escape_string($conn,$_POST["register_last_name"]),
                       $registered_on);
        // execute query

        $result_only_email = mysqli_query($conn,$sql_only_email);
        $num_rows_only_email=mysqli_num_rows($result_only_email);

        $result = mysqli_query($conn,$sql_register);

       $result_check_banned = mysqli_query($conn,$sql_check_banned);
        $num_rows_check_banned = mysqli_num_rows($result_check_banned);

        if ($result_only_email == false){
            print('<h4 class="text-center alert alert-danger">Something has gone wrong, please try again!</h4>');
        }
        elseif ($num_rows_check_banned == 1){
            print('<h4 class="text-center alert alert-danger">Account is banned from this website.</h4>');
        }
        elseif ($num_rows_only_email == 1) {
            print('<h4 class="text-center alert alert-danger">Account already exists, please log in.</h4>');
        }
        elseif($result === TRUE)
        {
            // remember that user's logged in
            print('<h4 class="text-center alert alert-success">You have successfully registered, please log in to your account.</h4>');
        }
        else{
            print('<h4 class="text-center alert alert-danger">Something has gone wrong, please try again!</h4>');
        } 
    }  
    $conn->close();
?>