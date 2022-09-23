<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for Blood Bank account</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_signupControl.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Select Role:</label>

                        <select class="form-control" name="role" id="role"required>
                            <option value="user">User</option>
                            <option value="admin">Administrator</option>
                            <option value="emp">Employee</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="signupEmail">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                            aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="signupEmail">Primary Mobile Number</label>
                        <input type="tel" class="form-control" id="pri_num" name="pri_num" aria-describedby="emailHelp" required>

                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Secondary Mobile Number</label>
                        <input type="tel" class="form-control" id="sec_num" name="sec_num" aria-describedby="emailHelp"required>

                    </div>
                    <div class="form-group">
                        <label for="gender">Select Your Gender:</label>

                        <select class="form-control" name="gender" id="gender"required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>

                    </div>

                    <div>
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob"required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="textarea" class="form-control" id="address" name="address"required>
                    </div>

                    <div class="form-group">
                        <label for="pincode">Pincode:</label>
                        <input type="number" class="form-control" id="pincode" name="pincode"required>
                    </div>

                    <div class="form-group">
                        <label for="bgroup">Select Your Blood Group:</label>

                        <select class="form-control" name="bgroup" id="bgroup"required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="weight">Weight in kg:</label>
                        <input type="number" class="form-control" id="weight" name="weight"required>
                    </div>

                    <div class="form-group">
                        <label for="hemoglobin">Hemoglobin:</label>
                        <input type="number" class="form-control" id="hemoglobin" name="hemoglobin" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>

            </div>
            <div class="modal-footer">

            </div>
            </form>
        </div>
    </div>
</div>
</div>