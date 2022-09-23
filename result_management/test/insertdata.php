<?php
$servername="localhost";
$username="root";
$password="";
$database="result_management_2021_22";
$connect=mysqli_connect($servername,$username,$password,$database);
// $sql="INSERT INTO `marks` (`id`, `exam_id`, `subject_id`, `student_id`, `marks`) VALUES (NULL, '1', '1', '1', '10');";
// $result=mysqli_query($connect,$sql);
print_r($_POST);

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

        // if($roll_no_clean !='' && $exam_id_clean!='' && $subject_id_clean!='' && $marks_clean!=''){
            $query.='
            INSERT INTO `marks` (`id`, `exam_id`, `subject_id`, `student_id`, `marks`) VALUES (NULL,"'.$exam_id_clean.'", "'.$subject_id_clean.'", "'.$roll_no_clean.'", "'.$marks_clean.'");';

        // }
        // $result=mysqli_query($connect,$query);
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
