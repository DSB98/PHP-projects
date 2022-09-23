<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo 'reading form data';
    include '_dbconnect.php';
    $exam=$_POST['exam'];
    $sql="UPDATE `exam` SET `result_status` = 'declared' WHERE `exam_id` = '$exam';";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location: http://localhost/result_management/admin/addExam.php?ResultDeclared=true");
    }else{
        header("location: http://localhost/result_management/admin/addExam.php?ResultDeclared=false&&");        
    }
    

}
else{
    header("location: http://localhost/result_management/admin/addExam.php?ResultDeclared=false");
}
?>