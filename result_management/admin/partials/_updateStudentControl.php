<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    
   
    $mob_number=$_POST['mob'];
    $p_mob_number=$_POST['pmob'];
    $address=$_POST['address'];
    $student=$_POST['student_id'];
    $semester=$_POST['semester'];
    $roll=$_POST['rollno'];
 

    //to check email is alreadyy exists or not

    $existsql="UPDATE `student` SET `roll_no` = '$roll', `mobile_number` = '$mob_number', `parent_mobile_number` = '$p_mob_number', `address` = '$address', `semester`='$semester' WHERE `student`.`student_id` = $student;";
    $result=mysqli_query($conn,$existsql);
    
    if($result){
        
      header("location: http://localhost/result_management/admin/studentList.php?studentUpdated=true");
    //   echo $showError;

    }
    else{

        header("location: http://localhost/result_management/admin/studentList.php?studentUpdated=false");
        }
        
    }
    else{
        header("location: http://localhost/result_management/admin/");
    }
