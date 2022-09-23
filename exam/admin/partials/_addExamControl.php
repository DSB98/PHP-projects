<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    
    $course=$_POST['course'];
    $semester=$_POST['semester'];
    $exam=$_POST['exam'];
    $status=$_POST['status'];
    
 

    //to check email is alreadyy exists or not

    $existsql="select * from `exam` where course_id='$course' and semester='$semester' and exam_name='$exam';";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Exam is already registered";
      header("location: http://localhost/exam/admin/addExam.php?examAdded=false&&error=$showError");
    //   echo $showError;

    }
    else{
            $sql="INSERT INTO `exam` ( `exam_name`, `course_id`, `semester`,`result_status`) VALUES ('$exam','$course', '$semester','$status');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
               header("location: http://localhost/exam/admin/addExam.php?examAdded=true");
            //    echo $showAlert;
            }
            else{
                echo("Error description: " . $conn -> error);
                header("location: http://localhost/exam/admin/addExam.php?examAdded=false&&databaseSideError");
            }
           


        }
        
    }
