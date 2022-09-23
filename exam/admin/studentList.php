<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Admin</title>
</head>

<body>
  <?php
  include "partials/_menubar.php";
  ?>
  <div class="main">
    <?php
    include "partials/_sidebar.php";
    ?>
    <div class="maincontent">
      <?php
      include "partials/_dbconnect.php";

      ?>
      <div class="mainContaintTopMargin">
        <div class="courseList">
          <h2>Student List</h2>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"> Sr. No</th>
                <th scope="col"> Roll No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course</th>
                <th scope="col">Semester</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "select * from student order by  course_id, semester;";
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
              <td>' . $row['roll_no'] . '</td>
              <td>' . $row['student_name'] . '</td>
              <td>' . $courseRow['course_name'] . '</td>
              <td>' . $row['semester'] .'</td>
              <td>
              <form id="upForm" action="updateStdent.php" method="POST">
              <input type="hidden" name="student_id" value="'.$row['student_id'].'">
              
              <button type="submit" class="btn btn-primary">Edit</button>
            
               </form></td>
        </tr>';
                $sr = $sr + 1;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  

  <script>
function updateForm(){
  document.getElementById("upForm").submit();
}
  </script>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
    
</body>

</html>