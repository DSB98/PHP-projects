<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    
    $subject=$_POST['subject'];
    $question=$_POST['question'];
    $answer1=$_POST['answer1'];
    $answer2=$_POST['answer2'];
    $answer3=$_POST['answer3'];
    $answer4=$_POST['answer4'];
    $answer=$_POST['answer'];
    $dificulty=$_POST['dificulty'];


    
            $sql="INSERT INTO `questions` (`question`, `answer1`, `answer2`, `answer3`, `answer4`, `difficulty`, `correctAnswer`, `subject_id`) VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$dificulty', '$answer', '$subject');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
               header("location: http://localhost/exam/admin/addQuestion.php?QuestionAdded=true");
            //    echo $showAlert;
            }
            else{
                echo("Error description: " . $conn -> error);
                header("location: http://localhost/exam/admin/addQuestion.php?QuestionAdded=false&&databaseSideError");
            }
           


        
        
    }
