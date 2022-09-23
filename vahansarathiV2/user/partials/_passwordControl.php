<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user = $_POST['username'];
    $sql = "select * from `user` where license_no='$user';";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['user_name'];
        $email = $row['email'];
        $id = $row['user_id'];

        function generateRandomString($length = 8)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $pass = generateRandomString();
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE `user` SET `password` = '$hash' WHERE `user`.`user_id` = '$id';";
        $result = mysqli_query($conn, $sql);
        if ($result) {


            $to_email = "$email";
            $subject = "Password Reset";
            $body = "<div>Dear $name, </br></div>";
            $body .= "<div>Your passwrod is changed and we recommend to login using following credentials and change your password from profile.</br></div>";
            $body .= "<div>Username: $user</br></div>";
            $body .= "<div>Password: $pass</br></div>";

            // Set content-type for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: contact@vahansarathi.in";
            if (mail($to_email, $subject, $body, $headers)) {
                echo "Email conatining new password is successfully sent to $to_email";
            } 
            echo"We recommend you to change syatem generated password by login in your account.";
            // header("location:../index.php?passChanged=true");
            exit();
        } else {
            echo"Error";
            // header("location:../index.php?passChanged=false");
            exit();
        }
    } else {
        $ShowEmailError = "User is not registered";
        echo "Wrong Username";
        // header("location:/index.php?loginEmailError=false&&error=$ShowEmailError");
    }
} else {
    header("location:../index.php");
}
