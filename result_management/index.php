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
  include "partials/_dbconnect.php";
  include "partials/_menubar.php";
  include "partials/_alerts.php";
  ?>

  <div class="formstyl">
    <form class="result-form" action="testresult.php" method="post">
      <h2>Result</h2>
      <div class="form-group">
        <label for="">Select Exam</label>
        <select class="form-control" id="exam" name="exam">
          <?php
          $sqlSelect = "SELECT * FROM `exam` where result_status='declared';";
          $result = mysqli_query($conn, $sqlSelect);
          echo ' <option value="">Select Exam</option>';
          while ($row2 = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row2['exam_id']; ?>"><?php echo $row2['exam_name']; ?></option>';
          <?php }
          ?>
        </select>
      </div>

      <div class="form-group">
        <Label for="course">Enter Roll No.</Label>
        <input type="text" class="form-control" name="roll_no" id="roll_no" placeholder="Enter your roll number">
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-secondary btn-block mb-4">Show Result</button>


    </form>
  </div>
  <div style="float:bottom;">
    <?php

    include "partials/_footer.php";
    ?>
  </div>
</body>

</html>