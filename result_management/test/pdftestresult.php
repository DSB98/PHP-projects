<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>Reuslt Management</title>
</head>

<body>
    <?php
    require('vendor/autoload.php');
    include "partials/_dbconnect.php";
    include "partials/_menubar.php";
    include "partials/_alerts.php";
    ?>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'partials/_dbconnect.php';
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


            <?php $html = ' <div class="container table-respomsive">
                <table>
                    <tr>
                        <td>Student Name:</td>
                        <td>' . $studRow['student_name'] . '</td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td>' . $courseRow['course_name'] . '</td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>' . $sem . '</td>
                    </tr>
                </table>
                <table calss="table">
                    
                    <thead>
                        <tr>
                            <th scope="col" style="margin-left: 10px; border: left 1%;">Subject </th>
                            <th scope="col" style="margin-left: 10px; border: left 1%;">Total Marks </th>
                            <th scope="col" style="margin-left: 10px; border: left 1%;">Required Marks </th>
                            <th scope="col" style="margin-left: 10px; border: left 1%;">Obtained Marks </th>
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
            <?php $html .= ' <tr>
                                <td>' . $sub['subject_name'] . '</td>
                                <td>100</td>
                                <td>40</td>';
                if ($row['marks'] < 40) {
                    $html .= ' <td>' . $row['marks'] . '*</td>';

                    $count = $count + 1;
                } else {
                    $html .= ' <td>' . $row['marks'] . '</td>';
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

                $html .= ' <td>' . $rowTotal['total'] / $rowTotal['num'] . '%</td>';
            }
            $html .= ' </tr>
                    </tbody>
                    
                </table>';
            echo $html;
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $file = time().'.pdf';
            $mpdf->output($file, 'D');
            ?>
            <button class="btn btn-success">PRINT</button>
            </div>

    <?php
        } else {
            header("location:index.php?wrongRollNumber");
        }
    } else {
        header("location:index.php");
    }

    ?>
    <div style="float:bottom;">
        <?php

        include "partials/_footer.php";
        ?>
    </div>
</body>

</html>