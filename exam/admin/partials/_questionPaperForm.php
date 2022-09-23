<div class="formstyle">
    <div class="studentform">
        <form action="partials/_printQuestionPaper.php" method="POST">
            <h2>Add Question Paper Details</h2>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Question Paper Details</h6>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="exam">Select Exam</label>
                        <select id="exam" name="exam" class="form-control">
                            <?php
                            $sqlSelect = "SELECT * FROM `exam` where course_id=1 and result_status='pending';";
                            $result = mysqli_query($conn, $sqlSelect);
                            echo ' <option value="">Select Exam</option>';
                            while ($row2 = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row2['exam_id']; ?>"><?php echo $row2['exam_name']; ?></option>';
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="subject">Select Subject</label>
                        <select id="subject" name="subject" class="form-control">
                            <?php
                            $id=$_SESSION['user_id'];
                            if($_SESSION['role']=='admin'){
                                $sqlSelect = "SELECT * FROM `subject`";
                            }
                            else{
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

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                        <label for="easyQuestion">No of Easy Questions</label>
                        <input type="number" class="form-control" id="easyQuestion" name="easyQuestion" required placeholder="Enter No of Easy Question" required>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                        <label for="moderateQuestion">No of Moderate Questions</label>
                        <input type="number" class="form-control" id="moderateQuestion" name="moderateQuestion" required placeholder="Enter No of Moderate Question" required>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                        <label for="hardQuestion">No of Hard Questions</label>
                        <input type="number" class="form-control" id="hardQuestion" name="hardQuestion" required placeholder="Enter No of Hard Question" required>
                    </div>
                </div>

                
            </div>
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary ">Generate</button>
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





</div>