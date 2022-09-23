<div class="formstyle">


  <div class="courseList">
    <h2>Exam List</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Sr. No</th>
          <th scope="col">Exam Name</th>
          <th scope="col">Course</th>
          <th scope="col">Semester</th>
          <th scope="col">Result</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select * from exam where result_status='pending' order by course_id, semester;";
        $result = mysqli_query($conn, $sql);
        $count = 0;
        $sr = 1;
        while ($row = mysqli_fetch_array($result)) {
          $courseSql = "select course_name from `course` where course_id=" . $row['course_id'] . ";";
          $resultCourse = mysqli_query($conn, $courseSql);
          $courseRow = mysqli_fetch_array($resultCourse);
          echo '
        <tr>
              <td>' . $sr . '</td>   
              <td>' . $row['exam_name'] . '</td>
              <td>' . $courseRow['course_name'] . '</td>
              <td>' . $row['semester'] . '</td>
              <td>' . $row['result_status'] . '</td>
              <td>
              <form action="partials/_insertMarks.php" method="post">
              <input type="hidden" name="exam" value="' . $row['exam_id'] . '" >
              <input type="hidden" name="semester" value="' . $row['semester'] . '">
              <input type="hidden" name="course" value="' . $row['course_id'] . '">
              <button type="submit" class="btn btn-success">Insert Marks</button>
              </form>
              </td>
        </tr>';
          $sr = $sr + 1;
        }
        ?>


      </tbody>
    </table>
  </div>