<div class="formstyle">
    <div class="studentform">
        <form action="partials/_addStudentControl.php" method="POST">
            <h2>Add Student Details</h2>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="username">Full Name</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Enter Your Name" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required placeholder="Enter Date of Birth" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="mob">Mobile Number</label>
                        <input type="text" class="form-control" id="mob" name="mob" required placeholder="Enter Your Mobile Number">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="pmob">Parents Mobile Number</label>
                        <input type="text" class="form-control" id="pmob" name="pmob" required placeholder="Enter parent's mobile number">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender" required>

                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="textarea" class="form-control" id="address" name="address" required placeholder="Enetr Student's Address" required>
                    </div>
                </div>

            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 text-primary">Course Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control" name="course" id="course" required>
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
                        <select class="form-control" name="semester" id="semester" class="form-control" required>
                            <option value="">Select Option</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="rollno">Roll Number</label>
                        <input type="textarea" class="form-control" id="rollno" name="rollno" required placeholder="Enter Student's Roll Number" required>
                    </div>
                </div>
            </div>

            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" name="submit" class="btn btn-secondary ">Add Student</button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <button type="reset" id="submit" name="submit" class="btn btn-secondary">Reset</button>

                    </div>
                </div>

            </div>
    </div>

    </form>
</div>





</div>