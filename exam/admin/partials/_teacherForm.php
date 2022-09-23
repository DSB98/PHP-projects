<div class="formstyle">
    <div class="studentform">
        <form action="partials/_addTeacherControl.php" method="POST">
            <h2>Add Teacher Details</h2>
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
                        <label for="mob">Mobile Number</label>
                        <input type="text" class="form-control" id="mob" name="mob" required placeholder="Enter Your Mobile Number">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Enter parent's mobile number">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="course">Department</label>
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
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role" class="form-control" required>
                            <option value="">Select Option</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            
                        </select>
                    </div>
                </div>
                

            </div>
            

            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary ">Add Teacher</button>
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