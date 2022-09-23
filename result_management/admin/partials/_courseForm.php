<div class="formstyle">
    <div class="studentform">
        <form action="partials/_addCourseControl.php" method="POST">
            <h2>Add Course Details</h2>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Course Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="course">Course Name</label>
                        <input type="text" class="form-control" id="course" name="course" required placeholder="Enter Course Name">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="pattern">Pattern</label>
                        <select class="form-control" name="pattern" id="pattern" required>

                            <option value="">Select Pattern</option>
                            <option value="percentage">Percentage</option>
                            <option value="credit">Credit</option>

                        </select>
                    </div>
                </div>


            </div>

            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" name="submit" class="btn btn-secondary ">Add Course</button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <button type="reset" id="submit" name="submit" class="btn btn-secondary">Reset</button>

                    </div>
                </div>

            </div>
    </div>
</div>
</form>
</div>

<div class="courseList">
    <h2>Course List</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Pattern</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from course;";
            $result = mysqli_query($conn, $sql);
            $count = 0;
            while ($row = mysqli_fetch_array($result)) {
                echo '
        <tr>
              <td>' . $row['course_id'] . '</td>   
              <td>' . $row['course_name'] . '</td>
              <td>' . $row['pattern'] . '</td>
            
        </tr>';
            }
            ?>
        </tbody>
    </table>
</div>