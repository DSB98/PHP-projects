<div class="formstyle">
    <div class="studentform">
        <form action="partials/_addQuestionControl.php" method="POST">
            <h2>Add Question Details</h2>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Question Details</h6>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="subject">Select Subject</label>
                        <select id="subject" name="subject" class="form-control">
                            <?php
                            if ($_SESSION['role'] == 'admin') {
                                $sqlSelect = "SELECT * FROM `subject`;";
                            } else {
                                $id = $_SESSION['user_id'];
                                $sqlSelect = "SELECT * FROM `subject` where teacher_id=$id;";
                            }
                            $result = mysqli_query($conn, $sqlSelect);
                            echo ' <option value="">Select Subject</option>';
                            while ($row2 = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row2['subject_id']; ?>"><?php echo $row2['subject_name']; ?></option>';
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" id="question" name="question" required placeholder="Enter Question" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="answer1">Option 1</label>
                        <input type="text" class="form-control" id="answer1" name="answer1" required placeholder="Enter Option 1" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="answer2">Option 2</label>
                        <input type="text" class="form-control" id="answer2" name="answer2" required placeholder="Enter Option 2" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="answer3">Option 3</label>
                        <input type="text" class="form-control" id="answer3" name="answer3" required placeholder="Enter Option 3" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="answer4">Option 4</label>
                        <input type="text" class="form-control" id="answer4" name="answer4" required placeholder="Enter Option 4" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="answer">Correct Answer</label>
                        <select class="form-control" name="answer" id="answer" class="form-control" required>
                            <option value="">Select Option</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="dificulty">Dificulty Level</label>
                        <select class="form-control" name="dificulty" id="dificulty" class="form-control" required>
                            <option value="">Select Option</option>
                            <option value="1">Easy</option>
                            <option value="2">Moderate</option>
                            <option value="3">Hard</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary ">Add Question</button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <button type="reset" id="submit" name="submit" class="btn btn-primary">Reset</button>

                    </div>
                </div>

            </div>
    </div>

    </form>
</div>



<div class="courseList">
    <h2>Question List</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr. No</th>
                <th scope="col">Question</th>
                <th scope="col">Option 1</th>
                <th scope="col">Option 2</th>
                <th scope="col">Option 3</th>
                <th scope="col">Option 4</th>
                <th scope="col">Correct Answer</th>
                <th scope="col">Difficulty Level</th>
                <th scope="col">Subject</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id=$_SESSION['user_id'];
            if($_SESSION['role']=='admin'){
                $subSql="select subject_id from subject";
            }
            else{
            $subSql="select subject_id from subject where teacher_id=$id;";
            }
            $subResult=mysqli_query($conn, $subSql);
            while($subrow=mysqli_fetch_assoc($subResult)){

           
            $subID=$subrow['subject_id'];
            $sql = "select * from questions where subject_id =$subID order by difficulty;";
            $result = mysqli_query($conn, $sql);
            $count = 0;
            $sr = 1;
            while ($row = mysqli_fetch_array($result)) {
                $courseSql = "select subject_name from `subject` where subject_id=" . $row['subject_id'] . ";";
                $resultCourse = mysqli_query($conn, $courseSql);
                $courseRow = mysqli_fetch_array($resultCourse);
                echo '
        <tr>
              <td>' . $sr . '</td>   
              <td style="font-weight:600;">' . $row['question'] . '</td>
              <td>' . $row['answer1'] . '</td>
              <td>' . $row['answer2'] . '</td>
              <td>' . $row['answer3'] . '</td>
              <td>' . $row['answer4'] . '</td>
              <td style="color:green; font-weight:600;">' . $row['correctAnswer'] . '</td>
              <td style="color:red; font-weight:600;">' . $row['difficulty'] . '</td>
              <td style="color:blue; font-weight:600;">' . $courseRow['subject_name'] . '</td>
             
              
        </tr>';
                $sr = $sr + 1;
            }
            echo'
            <tr style="background-color:lightgray;">
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>';
        }
            ?>
        </tbody>
    </table>
</div>