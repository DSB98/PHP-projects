<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';

    $name=$_POST['username'];
    $email=$_POST['email'];
    $mob_number=$_POST['mob'];
    $course=$_POST['course'];
    $role=$_POST['role'];
    
    // password
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

 

    //to check email is alreadyy exists or not

    $existsql="select * from `teacher` where email='$email';";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Teacher is already registered";
      header("location: http://localhost/exam/admin/addTeacher.php?teacherAdded=false&&error=$showError");
    //   echo $showError;

    }
    else{
            $sql="INSERT INTO `teacher` ( `name`, `email`, `phone`, `department`, `password`,`role`) VALUES ('$name', '$email', '$mob_number','$course','$pass','$role');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
                $to_email = "$email";
                $subject = "Login Credential";
                $body = "Dear $name, </br>";
               
                $body .= "<div>Congratulatons! </br></div>";
                $body .= "<div>Your account has been created sccessfully.</br></div>";
                $body .= "<div>Role: $role</br></div>";
                $body .= "<div>Username: $email</br></div>";
                $body .= "<div>Password: $pass</br></div>";
                
                // Set content-type for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: contact@vahansarathi.in";
                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                } else {
                    echo "Email sending failed...";
                }
               header("location: http://localhost/exam/admin/addTeacher.php?TeacherAdded=true");
            //    echo $showAlert;
            }
            else{
                echo("Error description: " . $conn -> error);
                header("location: http://localhost/exam/admin/addTeacher.php?TeacherAdded=false&&databaseSideError");
            }
           


        }
        
    }
