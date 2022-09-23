<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo 'reading form data';
    include '_dbconnect.php';

    $course = $_POST['course'];
    $pattern = $_POST['pattern'];

    //to check email is alreadyy exists or not

    $existsql = "select * from `course` where course_name='$course' and pattern='$pattern';";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Course is already registered";
        header("location: http://localhost/result_management/admin/course.php?courseAdded=false&&error=$showError");
        //   echo $showError;

    } else {
        $sql = "INSERT INTO `course` ( `course_name`, `pattern`) VALUES ('$course', '$pattern');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            header("location: http://localhost/result_management/admin/course.php?courseAdded=true");
            //    echo $showAlert;
        } else {
            echo ("Error description: " . $conn->error);
            header("location: http://localhost/result_management/admin/course.php?courseAdded=false&&databaseSideError");
        }
    }
}
