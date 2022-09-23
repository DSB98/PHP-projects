<?php
$course = 1;
$subject = 1;
$sem = 2;
$exam = 1;
?>

<?php
// course 1, sem2, sub student
include "partials/_dbconnect.php";
$sql = "select * from exam where exam_id='$exam';";
$sqlStud = "select * from student where course_id='$course' and semester='$sem' order by roll_no;";
$courseSql = "select course_name from `course` where course_id='$course';";

$resultCourse = mysqli_query($conn, $courseSql);
$courseRow = mysqli_fetch_array($resultCourse);

$subSql = "select * from `subject` where subject_id='$subject';";
$resultSub = mysqli_query($conn, $subSql);
$subRow = mysqli_fetch_array($resultSub);

$examresult = mysqli_query($conn, $sql);
$examrow = mysqli_fetch_array($examresult);

$result = mysqli_query($conn, $sqlStud);
$count = 0;
$sr = 1;
$count = 1;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/ css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Marks</title>
</head>

<body>
    <br /><br />
    <div class="container">
        <br />
        <h2 align="center">Insert Marks</h2>
        <br />
        <div class="table-respomsive courseList">
            <table class="table table-bordered" id="marks_table">
                <tr>
                    <th width="8%">Roll No</th>
                    <th>Student Name</th>
                    <th>Exam Name</th>
                    <th>Subject Name</th>
                    <th width="15%">Marks (out of 100)</th>
                    <th width="5%"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>

                </tr>

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $query = "select * from student where student_id=" . $row['student_id'] . ";";
                    $excecution = $conn->query($query);
                    $data = $excecution->fetch_object(); ?>
                    <tr>
                        <td contenteditable='false'><?php echo $row['roll_no'] ?></td>
                        <td contenteditable='false' class="student_name"><?php echo $row['student_name'] ?></td>
                        <td contenteditable='false' class="exam_name"><?php echo $examrow['exam_name'] ?></td>
                        <td contenteditable='false' class="subject_name"><?php echo $subRow['subject_name'] ?></td>
                        <td contenteditable='true' class="marks"></td>

                        <td type="hidden" style="display:none;" class="roll_no"><?php echo $row['student_id'] ?></td>
                        <td type="hidden" style="display:none;" class="exam_code"><?php echo $examrow['exam_id'] ?></td>
                        <td type="hidden" style="display:none;" class="subject_code"><?php echo $subRow['subject_id'] ?></td>
                        <td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger remove'>-</button></td>

                    </tr>
                <?php
                }
                ?>
            </table>
            <div align="right">
                <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
            </div>
            <div align="center">
                <button class="btn btn-info" name="save" id="save">Save</button>
            </div>
            <br />

            <div id="inserted_item_data"></div>


        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        var count = 1;
        $('#add').click(function() {
            count = count + 1;
            var html_code = "<tr id='row" + count + "'>";
            html_code += "<td contenteditable='true' class='roll_no'></td>";
            html_code += "<td contenteditable='true' class='exam_code'></td>";
            html_code += "<td contenteditable='true' class='subject_code'></td>";
            html_code += "<td contenteditable='true' class='marks'></td>";

            html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger remove'>-</button></td>";
            html_code += "</tr>";
            $('#marks_table').append(html_code);
        });
        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
        $('#save').click(function() {
            var roll_no = [];
            var exam_code = [];
            var subject_code = [];
            var marks = [];
            $('.roll_no').each(function() {
                roll_no.push($(this).text());
            });
            $('.exam_code').each(function() {
                exam_code.push($(this).text());
            });
            $('.subject_code').each(function() {
                subject_code.push($(this).text());
            });
            $('.marks').each(function() {
                marks.push($(this).text());
            });
            $.ajax({
                url: "insertdata.php",
                method: "POST",
                data: {
                    roll_no: roll_no,
                    exam_code: exam_code,
                    subject_code: subject_code,
                    marks: marks
                },
                success: function(data) {
                    alert("Record inserted successfully");
                    $("td[contenteditable='true']").text("");
                    for (var i = 2; i <= count; i++) {
                        $('tr#' + i + '').remove();
                    }
                }
            });
        });

    });
</script>