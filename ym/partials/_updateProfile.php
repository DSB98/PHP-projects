<?php
session_start();
$user_id=$_SESSION['user_id'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    //echo 'reading form data';
    include '_dbconnect.php';
    $name=$_POST['username'];
    $email=$_POST['signupEmail'];
    $gender=$_POST['gender'];
    $pri_mob_number=$_POST['pri_num'];
    $sec_mob_number=$_POST['sec_num'];
    $address=str_replace(" ","%",str_replace(",","_",$_POST['address']));
    $pincode=$_POST['pincode'];
    $blood_group=$_POST['bgroup'];
    $hb=$_POST['hemoglobin'];
    $dob=$_POST['dob'];
    $weight=$_POST['weight'];
    $bloodDonor=$_POST['blood'];
    $plasmaDonor=$_POST['check'];
    
    
 

    //to check email is alreadyy exists or not
    $updateSql="UPDATE `user` SET `user_name` = '$name', `gender` = '$gender', `pri_mob_number` = '$pri_mob_number', `email` = '$email', `address` = '$address', `pincode` = '$pincode', `blood_group` = '$blood_group', `hb` = '$hb', `dob` = '$dob', `weight` = '$weight', `bloodDonor` = '$bloodDonor', `plasmaDonor` = '$plasmaDonor' WHERE `user`.`user_id` = $user_id;";
    
    $result=mysqli_query($conn,$updateSql);
    if($result){
        $showAlert=true;
       header("location: /profile.php?profileupdate=true");
    //    echo $showAlert;
    }
    else{
        header("location: /profile.php?profileupdate=false");
    }
}
?>