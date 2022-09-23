<!--
//index.php
!-->

<html>

<head>
  <title>Insert Marks</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
  <div class="container">
    <br />

    <h3 align="center">Insert marks</h3><br />
    <br />
    <br />
    <div align="right" style="margin-bottom:5px;">
      <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
    </div>
    <br />
    <form method="post" id="marks_form">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="user_data">
          <tr>

            <th>Roll No</th>
            <th>Student Name</th>
            <th>Subject</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Marks</th>

            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tbody>
            <?php
            // course 1, sem2, sub student
            include "partials/_dbconnect.php";
            $sql = "select * from exam where exam_id='1';";
            $sqlStud = "select * from student where course_id=1 and semester='2';";

            $courseSql = "select course_name from `course` where course_id='1';";
            $resultCourse = mysqli_query($conn, $courseSql);
            $courseRow = mysqli_fetch_array($resultCourse);

            $subSql = "select subject_name from `subject` where subject_id='1';";
            $resultSub = mysqli_query($conn, $subSql);
            $subRow = mysqli_fetch_array($resultSub);

            $result = mysqli_query($conn, $sqlStud);
            $count = 0;
            $sr = 1;
            $count = 1;
            while ($row = mysqli_fetch_array($result)) {
              $query = "select * from student where student_id=" . $row['student_id'] . ";";
              $excecution = $conn->query($query);
              $data = $excecution->fetch_object();

            ?>
              <tr>

                <td><?php echo $row['roll_no'] ?></td>
                <td><?php echo $row['student_name'] ?></td>
                <td><?php echo $subRow['subject_name'] ?></td>
                <td><?php echo $courseRow['course_name'] ?></td>
                <td><?php echo $row['semester'] ?></td>
                <td><input type="number" name="marks" id="marks<?php echo $count ?>" class="marks"></td>
                <td><input type="hidden" name="student[]" id="student<?php echo $count ?>" value="<?= $data->student_id ?>"></td>
                <td><input type="hidden" name="subject[]" id="subject<?php echo $count ?>" value="1"></td>
                <td><input type="hidden" name="exam[]" id="exam<?php echo $count ?>" value="1"></td>


              </tr>
            <?php
              $count = $count + 1;
              $sr = $sr + 1;
            }
            ?>


        </table>
      </div>
      <div align="center">
        <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
      </div>
    </form>

    <br />
  </div>
  <div class="test" name="test" id="test"></div>

</html>

<script>
  $(document).ready(function() {

    var count = 0;

    $('#marks_form').on('submit', function(event) {
      alert("function called");
      event.preventDefault();
      var count_data = 0;
      $('.marks').each(function() {
        count_data = count_data + 1;
      });
      if (count_data > 0) {
        var form_data = $(this).serialize();
        $.ajax({
          url: "insert.php",
          method: "POST",
          data: form_data,

          success: function(data) {


            $('#test').html('<p>Data Inserted Successfully</p>');

          }
        })
      } else {
        $('#action_alert').html('<p>Please Add atleast one data</p>');
        $('#action_alert').dialog('open');
      }
    });

  });
</script>