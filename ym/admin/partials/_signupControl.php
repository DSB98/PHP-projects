<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    $name=$_POST['username'];
    $role=$_POST['role'];
    $email=$_POST['signupEmail'];
    $gender=$_POST['gender'];
    $pri_mob_number=$_POST['pri_num'];
    $sec_mob_number=$_POST['sec_num'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $blood_group=$_POST['bgroup'];
    $hb=$_POST['hemoglobin'];
    $dob=$_POST['dob'];
    $weight=$_POST['weight'];
   // $role =$_SERVER[''];
    $pass=$_POST['signupPassword'];
    $cpass=$_POST['signupcPassword'];
    // New added, need to add in table
    $bloodDonor=$_POST['blood'];
    $plasmaDonor=$_POST['check'];
    $bloodDonatedDate=$_POST['bloodDate'];
    $CovidRecDate=$_POST['plasmaCheck'];
    $agreed=$_POST['agreed'];
 echo $bloodDonor;
 echo $plasmaDonor;
 echo $bloodDonatedDate;
 echo $CovidRecDate;
 echo $agreed;

    //to check email is alreadyy exists or not

    $existsql="select * from `user` where email='$email'";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Email is already registered";
      header("location: /index.php?signup=false&&error=$showError");
    //   echo $showError;

    }
    else{
        if($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` (`user_name`, `gender`, `pri_mob_number`, `sec_mob_number`, `email`, `address`, `pincode`, `blood_group`, `hb`, `dob`, `weight`, `role`,`bloodDonor`,`plasmaDonor`,`BDdate`,`covidRecDate`,`agreed`, `reg_date`, `password`) VALUES ('$name', '$gender', '$pri_mob_number', '$sec_mob_number', '$email', '$address', '$pincode', '$blood_group', '$hb', '$dob', '$weight', '$role','$bloodDonor','$plasmaDonor','$bloodDonatedDate','$CovidRecDate','$agreed', current_timestamp(), '$hash');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
               header("location: /admin/index.php?signupsuccess=true");
            //    echo $showAlert;
            }
            else{
                echo("Error description: " . $conn -> error);
            }
           


        }
        else{
            $showError="Password do not  match";
            // echo $showError;
           header("location: /admin/index.php?signupsuccess=false&&error=$showError");

        }
    }
}
?>