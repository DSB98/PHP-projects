<?php
include "partials/_dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['exam'])) {
    $exam = $_REQUEST['exam'];
    echo $exam;


    $sql = "select * from exam where exam_id='$exam';";
    $examresult = mysqli_query($conn, $sql);
    $examrow = mysqli_fetch_assoc($examresult);
    $course = $examrow['course_id'];
    $sem = $examrow['semester'];
    //$sqlStud="select * from student where course_id='$course' and semester='$sem' order by roll_no;";
    $courseSql = "select course_name from `course` where course_id='$course';";

    $resultCourse = mysqli_query($conn, $courseSql);
    $courseRow = mysqli_fetch_array($resultCourse);

    $subSql = "select * from `subject` where course_id='$course' and semester='$sem';";
    $resultSub = mysqli_query($conn, $subSql);
    $subRow = mysqli_fetch_array($resultSub);
    //$result=mysqli_query($conn,$sqlStud);
?>

    <div class="container ">
        <div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="float:left !important;">
                <div class="form-group">
                    <div class="form-control">
                        <input type="hidden" name="exam_id" value="<?php echo $exam ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="hidden" name="course_id" value="<?php echo $course ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input type="hidden" name="sem" value="<?php echo $sem ?>">
                    </div>
                </div>
                <label for="">Select Subject</label>
                <select id="subject" name="subject" onchange="submit()">
                    <?php
                    $sqlSelect = "SELECT * FROM `subject` where course_id='$course' and semester='$sem';";
                    $result = mysqli_query($conn, $sqlSelect);
                    echo ' <option value="">Select Subject</option>';
                    while ($row2 = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row2['subject_id']; ?>"><?php echo $row2['subject_name']; ?></option>';
                    <?php }
                    ?>
                </select>
            </form>
        </div>

    </div>
    <?php
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subject'])) {
        // echo " subject selected= ";
        // echo $_POST['subject'];
        // echo " course= ";
        // echo $_POST['course_id'];
        // echo " exam= ";
        // echo $_POST['exam_id'];
        // echo " sem= ";
        // echo $_POST['sem'];

        $course = $_POST['course_id'];
        $subject = $_POST['subject'];
        $sem = $_POST['sem'];
        $exam = $_POST['exam_id'];

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
                <div class="table-respomsive">
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

    <?php

    } else {

    ?>
        <div class="conatiner " style="margin-top:30px; margin-bottom:30px;">
            <div class="container ">
                <div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="float:left !important;">
                        <label for="">Select Exam</label>
                        <select id="exam" name="exam" onchange="submit()">
                            <?php
                            $sqlSelect = "SELECT * FROM `exam` where result_status='pending';";
                            $result = mysqli_query($conn, $sqlSelect);
                            echo ' <option value="">Select Exam</option>';
                            while ($row2 = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row2['exam_id']; ?>"><?php echo $row2['exam_name']; ?></option>';
                            <?php }
                            ?>
                        </select>
                    </form>
                </div>

            </div>
        </div>
<?php }
} ?>