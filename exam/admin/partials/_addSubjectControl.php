<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    
    $course=$_POST['course'];
    $semester=$_POST['semester'];
    $subject=$_POST['subject'];
    $id=$_POST['teacher'];
    
 

    //to check email is alreadyy exists or not

    $existsql="select * from `subject` where course_id='$course' and semester='$semester' and subject_name='$subject';";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Subject is already registered";
      header("location: http://localhost/exam/admin/subject.php?subjectAdded=false&&error=$showError");
    //   echo $showError;

    }
    else{
            $sql="INSERT INTO `subject` ( `subject_name`, `course_id`, `semester`,`teacher_id`) VALUES ('$subject','$course', '$semester','$id');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
               header("location: http://localhost/exam/admin/subject.php?subjectAdded=true");
            //    echo $showAlert;
            }
            else{
                echo("Error description: " . $conn -> error);
                header("location: http://localhost/exam/admin/subject.php?subjectAdded=false&&databaseSideError");
            }
           


        }
        
    }
