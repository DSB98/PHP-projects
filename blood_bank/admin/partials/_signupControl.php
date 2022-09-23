<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    $name=$_POST['username'];
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
    $role =$_POST['role'];
    $pass=$_POST['signupPassword'];
    $cpass=$_POST['signupcPassword'];

    //to check email is alreadyy exists or not

    $existsql="select * from `user` where email='$email'";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
      $showError="Email is already registered";
      header("location: /blood_bank/admin/index.php?signup=false&&error=$showError");
    //   echo $showError;

    }
    else{
        if($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` (`user_name`, `gender`, `pri_mob_number`, `sec_mob_number`, `email`, `address`, `pincode`, `blood_group`, `hb`, `dob`, `weight`, `role`, `reg_date`, `password`) VALUES ('$name', '$gender', '$pri_mob_number', '$sec_mob_number', '$email', '$address', '$pincode', '$blood_group', '$hb', '$dob', '$weight', '$role', current_timestamp(), '$hash');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
               header("location: /blood_bank/admin/index.php?signupsuccess=true");
            //    echo $showAlert;
            }


        }
        else{
            $showError="Password do not  match";
            // echo $showError;
           header("location: /blood_bank/admin/index.php?signupsuccess=false&&error=$showError");

        }
    }
}
?>