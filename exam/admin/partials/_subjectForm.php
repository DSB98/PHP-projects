<div class="formstyle">
    <div class="studentform">
        <form action="partials/_addSubjectControl.php" method="POST">
            <h2>Add Subject Details</h2>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 text-primary">Course Details</h6>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required placeholder="Enetr Subject Name">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control" name="course" id="course">
                            <option value="">Select Option</option>
                            <?php
                            $sql = "SELECT * FROM `course`;";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {

                                $id = $row['course_id'];
                                $course = $row['course_name'];
                                echo '
                                                        <option value="' . $id . '">' . $course . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="semestet">Semester</label>
                        <select class="form-control" name="semester" id="semester" class="form-control">
                            <option value="">Select Option</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="teacher">Teacher</label>
                        <select class="form-control" name="teacher" id="teacher" class="form-control">
                            <option value="">Select Option</option>
                            <?php
                            $sql = "SELECT * FROM `teacher`;";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {

                                $id = $row['id'];
                                $name = $row['name'];
                                echo '
                                                        <option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary ">Add Subject</button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <button type="reset" id="submit" name="submit" class="btn btn-primary">Reset</button>

                    </div>
                </div>

            </div>
    </div>
</div>
</form>
</div>

<div class="courseList">
    <h2>Subject List</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr. No</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Course</th>
                <th scope="col">Semester</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from subject order by course_id, semester;";
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
              <td>' . $row['subject_name'] . '</td>
              <td>' . $courseRow['course_name'] . '</td>
              <td>' . $row['semester'] . '</td>
              
        </tr>';
                $sr = $sr + 1;
            }
            ?>
        </tbody>
    </table>
</div>