<?php
$servername="localhost";
$username="root";
$password="";
$database="exam";
$connect=mysqli_connect($servername,$username,$password,$database);

if(isset($_POST["roll_no"])){
    $roll_no=$_POST["roll_no"];
    $exam_code=$_POST["exam_code"];
    $subject_code=$_POST["subject_code"];
    $marks=$_POST["marks"];
    echo (count($roll_no));
    
    $query=''; 
    for($count=0; $count<count($roll_no); $count++){
        $roll_no_clean=mysqli_real_escape_string($connect, $roll_no[$count]);
        $exam_id_clean=mysqli_real_escape_string($connect, $exam_code[$count]);
        $subject_id_clean=mysqli_real_escape_string($connect, $subject_code[$count]);
        $marks_clean=mysqli_real_escape_string($connect, $marks[$count]);

        if($roll_no_clean !='' && $exam_id_clean!='' && $subject_id_clean!='' && $marks_clean!=''){
        $sql="select * from marks where exam_id='$exam_id_clean' and subject_id='$subject_id_clean' and student_id='$roll_no_clean';";
        $result=mysqli_query($connect,$sql);
        $numRows=mysqli_num_rows($result);
        if($numRows>0){
            $row2=mysqli_fetch_assoc($result);
            $query.='UPDATE `marks` SET `marks` = '.$marks_clean.' WHERE `marks`.`id` = '.$row2['id'].';';
        }
        else{
            $query.='
            INSERT INTO `marks` (`id`, `exam_id`, `subject_id`, `student_id`, `marks`) VALUES (NULL,"'.$exam_id_clean.'", "'.$subject_id_clean.'", "'.$roll_no_clean.'", "'.$marks_clean.'");';
        }
    }
    }
    if($query!=''){
        if(mysqli_multi_query($connect, $query)){
            echo "Item data Inserted";
        }
        else{
            echo"error";
        }
    }
    else{
        echo "All fields are required";
    }
}
else echo"post error";
