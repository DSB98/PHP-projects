<style>
    body{
        color:rgb(5, 1, 36);
    }
</style>

<?php
require('../vendor/autoload.php');
include "_dbconnect.php";


$exam = $_POST['exam'];
$subject = $_POST['subject'];
$easyQuestion = $_POST['easyQuestion'];
$moderateQuestion = $_POST['moderateQuestion'];
$hardQuestion = $_POST['hardQuestion'];


// fetching exam details
$sql = "select * from exam where exam_id='$exam'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$examName=$row['exam_name'];
// to find course and sem details
$course = $row['course_id'];
$sem = $row['semester'];
// Fetching students daata


// fetchinng course details
$coursesql = "select course_name from course where course_id='$course';";
$courseResult = mysqli_query($conn, $coursesql);
$courseRow = mysqli_fetch_assoc($courseResult);

$subjectsql = "select subject_name from subject where subject_id='$subject';";
$subjectResult = mysqli_query($conn, $subjectsql);
$subjectRow = mysqli_fetch_assoc($subjectResult);

?>


<?php $html = ' 
            <div>
            <img src="../images/top.jpg" alt="" style="align-items: center; width:100%; margin-left:auto; margin-right:auto;display:block;">
        </div>
            <div >
                <table style="margin-top: 50px;
                margin-bottom: 50px;
                
                margin-left: auto;
                margin-right: auto;
                width: 600px;
                color:rgb(5, 1, 36);
                font-weight:600;
                font-size:15px;
                ">
                    <tr>
                        <td>Exam Name:</td>
                        <td>' . $row['exam_name'] . '</td>
                    </tr>

                    <tr>
                        <td>Course:</td>
                        <td>' . $courseRow['course_name'] . '</td>
                    </tr>
                    <tr>
                        <td>Semester:</td>
                        <td>' . $sem . '</td>
                    </tr>
                    <tr>
                        <td>Subject:</td>
                        <td>' . $subjectRow['subject_name'] . '</td>
                    </tr>
                </table>
                <hr>

                 
                ';

$sqlEasy = "Select * from questions where subject_id='$subject' and difficulty='1' ORDER BY rand() limit $easyQuestion;";
$easyResult = mysqli_query($conn, $sqlEasy);
$calRows = mysqli_num_rows($easyResult);

$html .='<h2>Easy Questions --  1 Mark </h2>';

$count = 0;
if ($calRows > 0) {
    while ($row = mysqli_fetch_assoc($easyResult)) {
        $question = $row['question'];
        $answer1 = $row['answer1'];
        $answer2 = $row['answer2'];
        $answer3 = $row['answer3'];
        $answer4 = $row['answer4'];
        $count = $count + 1;

        $html .= '<h3>Q' . $count . ' ' . $question . '</h3>';
        $html .= '<p>A) ' . $answer1 . '</p>';
        $html .= '<p>B) ' . $answer2 . '</p>';
        $html .= '<p>C) ' . $answer3 . '</p>';
        $html .= '<p>D) ' . $answer4 . '</p>';
    }
}


$sqlEasy = "Select * from questions where subject_id='$subject' and difficulty='2' ORDER BY rand() limit $moderateQuestion";
$easyResult = mysqli_query($conn, $sqlEasy);
$calRows = mysqli_num_rows($easyResult);

$html .='<hr><h2>Moderate Questions --  2 Mark </h2>';

$count = 0;
if ($calRows > 0) {
    while ($row = mysqli_fetch_assoc($easyResult)) {
        $question = $row['question'];
        $answer1 = $row['answer1'];
        $answer2 = $row['answer2'];
        $answer3 = $row['answer3'];
        $answer4 = $row['answer4'];
        $count = $count + 1;

        $html .= '<h3>Q' . $count . ' ' . $question . '</h3>';
        $html .= '<p>A) ' . $answer1 . '</p>';
        $html .= '<p>B) ' . $answer2 . '</p>';
        $html .= '<p>C) ' . $answer3 . '</p>';
        $html .= '<p>D) ' . $answer4 . '</p>';
    }
}


$sqlEasy = "Select * from questions where subject_id='$subject' and difficulty='3' ORDER BY rand() limit $hardQuestion;";
$easyResult = mysqli_query($conn, $sqlEasy);
$calRows = mysqli_num_rows($easyResult);

$html .='<hr><h2>Hard Questions --  5 Mark </h2>';

$count = 0;
if ($calRows > 0) {
    while ($row = mysqli_fetch_assoc($easyResult)) {
        $question = $row['question'];
        $answer1 = $row['answer1'];
        $answer2 = $row['answer2'];
        $answer3 = $row['answer3'];
        $answer4 = $row['answer4'];
        $count = $count + 1;

        $html .= '<h3>Q' . $count . ' ' . $question . '</h3>';
        $html .= '<p>A) ' . $answer1 . '</p>';
        $html .= '<p>B) ' . $answer2 . '</p>';
        $html .= '<p>C) ' . $answer3 . '</p>';
        $html .= '<p>D) ' . $answer4 . '</p>';
    }
}
?>


<?php
$count = 0;

$hello = "jhsvjdkjbk";
$mpdf = new \Mpdf\Mpdf();
$mpdf->debug = true;
$mpdf->WriteHTML($html);
$file = $examName.'-'.$subjectRow['subject_name'].'-QuestionPaper.pdf';
$mpdf->output($file, 'D');
?>
<button class="btn btn-success">PRINT</button>
</div>

<?php



?>
<div style="float:bottom;">
    <?php

    include "partials/_footer.php";
    ?>
</div> -->