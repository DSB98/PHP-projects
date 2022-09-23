<?php
if(($_SERVER["REQUEST_METHOD"]=="POST")) {
    
        
        $name = $_POST['name'];
        $mob_num = $_POST['mob_num'];
        $address= $_POST['address'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $helpdesk = $_POST['helpdesk'];
        

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "u789522342_avtatspc_2021";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            
            $Insert = "INSERT INTO `contact_us` (`name`, `mobile_num`, `address`, `email`, `country`, `helpdesk`) VALUES ('$name', '$mob_num', '$address', '$email', '$country', '$helpdesk');  ";

                        
              $Result = mysqli_query($conn,$Insert);
                if ($Result) {
                    $to_email = "contact@vahansarathi.in";
                    $subject = "Support/ Enquiry";
                    $body = "<div>Name: $name </br></div>";
                    $body .= "<div>Mobile No: $mob_num</br></div>";
                    $body .= "<div>Email: $email</br></div>";
                    $body .= "<div>Address: $address</br></div>";
                    $body .= "<div>Country: $country</br></div>";
                    $body .= "<div>Message: $helpdesk</br></div>";
                    // Set content-type for sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: contact@vahansarathi.in";
                    if (mail($to_email, $subject, $body, $headers)) {
                        echo "Email successfully sent to $to_email...";
                    } else {
                        echo "Email sending failed...";
                    }
                    header("location: Contact-Us.php?QuerySentSuccessfully");
                
                }
                else {
                  header("location: Contact-Us.php?errorOccurred");
                }
            }
            
            $conn->close();
        }
    
    

else {
    
    header("location: Contact-Us.php");
}
?>