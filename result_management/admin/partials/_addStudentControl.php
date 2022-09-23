<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    
    $name=$_POST['username'];
    $gender=$_POST['gender'];
    $mob_number=$_POST['mob'];
    $p_mob_number=$_POST['pmob'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $course=$_POST['course'];
    $semester=$_POST['semester'];
    $roll=$_POST['rollno'];
 

    //to check email is alreadyy exists or not

    $existsql="select * from `student` where course_id=$course and semester=$semester and roll_no=$roll;";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Student is already registered";
      header("location: http://localhost/result_management/admin/addStudent.php?studentAdded=false&&error=$showError");
    //   echo $showError;

    }
    else{
            $sql="INSERT INTO `student` ( `student_name`, `dob`, `gender`, `roll_no`, `course_id`, `semester`, `mobile_number`, `parent_mobile_number`, `address`) VALUES ('$name', '$dob', '$gender', '$roll', '$course', '$semester', '$mob_number', '$p_mob_number', '$address');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
               header("location: http://localhost/result_management/admin/addStudent.php?StudentAdded=true");
            //    echo $showAlert;
            }
            else{
                echo("Error description: " . $conn -> error);
                header("location: http://localhost/result_management/admin/addStudent.php?StudentAdded=false&&databaseSideError");
            }
           


        }
        
    }
