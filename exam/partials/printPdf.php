<?php
require('../vendor/autoload.php');
include "_dbconnect.php";


$exam = $_POST['exam'];
$roll = $_POST['roll_no'];


// fetching exam details
$sql = "select * from exam where exam_id='$exam'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// to find course and sem details
$course = $row['course_id'];
$sem = $row['semester'];
// Fetching students daata
$sqlStud = "Select * from student where course_id='$course' and semester='$sem' and roll_no='$roll';";
$studResult = mysqli_query($conn, $sqlStud);
$calRows = mysqli_num_rows($studResult);
if ($calRows > 0) {
    $studRow = mysqli_fetch_assoc($studResult);
    //to get student  id
    $student_id = $studRow['student_id'];

    // fetching marks from database to display result

    $marks = "select * from marks where exam_id='$exam' and student_id='$student_id';";
    $marksResult = mysqli_query($conn, $marks);

    // fetchinng course details
    $coursesql = "select course_name from course where course_id='$course';";
    $courseResult = mysqli_query($conn, $coursesql);
    $courseRow = mysqli_fetch_assoc($courseResult);

?>


    <?php $html = ' 
            <div>
            <img src="../images/top.jpg" alt="" style="align-items: center; width:100%; margin-left:auto; margin-right:auto;display:block;">
            
        </div>
            <div>
                <table style="margin-top: 50px;
                margin-bottom: 50px;
                
                margin-left: auto;
                margin-right: auto;
                width: 600px;">
                    <tr>
                        <td>Student Name:</td>
                        <td>' . $studRow['student_name'] . '</td>
                    </tr>
                    <tr>
                        <td>Roll No:</td>
                        <td>' . $studRow['roll_no'] . '</td>
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
                        <td>Examination:</td>
                        <td>' . $row['exam_name'] . '</td>
                    </tr>
                </table>
                <table style="margin-top: 50px;
                margin-bottom: 50px;
                
                margin-left: auto;
                margin-right: auto;
                width: 600px;">
                    
                    <thead>
                        <tr style="border-bottom: 1px solid rgba(128, 128, 128, 0.308);
                        padding-top: 10px; text-align: left; color:red;">
                            <th style="text-align: left; border-bottom: 1px solid rgba(128, 128, 128, 0.308);padding-top: 10px;">Subject </th>
                            <th style="text-align: left; border-bottom: 1px solid rgba(128, 128, 128, 0.308);padding-top: 10px;">Total Marks </th>
                            <th style="text-align: left; border-bottom: 1px solid rgba(128, 128, 128, 0.308);padding-top: 10px;">Required Marks </th>
                            <th style="text-align: left; border-bottom: 1px solid rgba(128, 128, 128, 0.308);padding-top: 10px;">Obtained Marks </th>
                        </tr>
                    </thead>
                    <tbody>';
    ?>


    <?php
    $count = 0;
    while ($row = mysqli_fetch_assoc($marksResult)) {
        $subid = $row['subject_id'];
        $subject = "SELECT * FROM `subject` where subject_id='$subid';";
        $subResult = mysqli_query($conn, $subject);
        $sub = mysqli_fetch_assoc($subResult);
        // echo $sub['subject_name'],"---",$row['marks'];

    ?>
    <?php $html .= ' <tr style="border-bottom: 1px solid rgba(128, 128, 128, 0.308);
                        padding-top: 10px;">
                                <td style="font-size: small;
                                padding: 10px;
                                padding-left: 0px;">' . $sub['subject_name'] . '</td>
                                <td style="font-size: small;
                                padding: 10px;
                                padding-left: 0px;">100</td>
                                <td style="font-size: small;
                                padding: 10px;
                                padding-left: 0px;">40</td>';
        if ($row['marks'] < 40) {
            $html .= ' <td style="font-size: small;
                                padding: 10px;
                                padding-left: 0px;">' . $row['marks'] . '*</td>';

            $count = $count + 1;
        } else {
            $html .= ' <td style="font-size: small;
                                padding: 10px;
                                padding-left: 0px;">' . $row['marks'] . '</td>';
        }
        $html .= '</tr>';
    }

    $total = "select * , count(*) as num, sum(marks) as total from marks where exam_id='$exam' and student_id='$student_id';";
    $totalResult = mysqli_query($conn, $total);
    $rowTotal = mysqli_fetch_assoc($totalResult);
    // echo $rowTotal['total'];
    // echo $rowTotal['total']/$rowTotal['num'];

    $html .= '<tr>
                            <td></td>
                            <td></td>
                            <td>Total Marks</td>
                            <td>' . $rowTotal['total'] . '</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Percentage</td>';
    if ($count > 0) {
        $html .= ' <td>Fail- A.T.K.T</td>';
    } else {

        $html .= ' <td>' . round($rowTotal['total'] / $rowTotal['num'],2) . '%</td>';
    }
    $html .= ' </tr>
                    </tbody>
                    
                </table>';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->debug = true;
    $mpdf->WriteHTML($html);
    $file = 'resultTesting.pdf';
    $mpdf->output($file, 'D');
    ?>
    
    </div>

<?php
} else {
    header("location:index.php?wrongRollNumber");
}

?>
<div style="float:bottom;">
    <?php

    include "partials/_footer.php";
    ?>
</div> -->