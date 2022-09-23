<!-- Modal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

   
</head>
<body>
    

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for YM Helpline Account</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_signupControl.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span style="color:red;">*</span>Name</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="signupEmail"><span style="color:red;">*</span>Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                            aria-describedby="emailHelp" onchange="checkEmail();" required>
                        <small id="emailHelp" class="form-text text-muted">Your email id will be your username.</small>
                        <p id="error"></p>
                    </div>

                    <div class="form-group">
                        <label for="signupEmail"><span style="color:red;">*</span>Primary Mobile Number</label>
                        <input type="number" class="form-control" id="pri_num" name="pri_num" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" onchange="mobLength();" required>
                        <small id="pri_num_err" style="color:red"></small>                  


                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Secondary Mobile Number</label>
                        <input type="number" class="form-control" id="sec_num" name="sec_num" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" onchange="mobLength2();">
                        <small id="sec_num_err" style="color:red"></small>                  


                    </div>
                    <div class="form-group">
                        <label for="gender"><span style="color:red;">*</span>Select Your Gender:</label>

                        <select class="form-control" name="gender" id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>

                    </div>

                    <div>
                        <label for="dob"><span style="color:red;">*</span>Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="form-group">
                        <label for="address"><span style="color:red;">*</span>Address / City</label>
                        <input type="textarea" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label for="pincode"><span style="color:red;">*</span>Pincode:</label>
                        <input type="number" class="form-control" id="pincode" name="pincode" required>
                    </div>

                    <div class="form-group">
                        <label for="bgroup"><span style="color:red;">*</span>Select Your Blood Group:</label>

                        <select class="form-control" name="bgroup" id="bgroup" required>
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
                        <label for="weight"><span style="color:red;">*</span>Weight in kg:</label>
                        <input type="number" class="form-control" id="weight" name="weight" required>
                    </div>

                    <div class="form-group">
                        <label for="hemoglobin">Hemoglobin:</label>
                        <input type="number" class="form-control" id="hemoglobin" name="hemoglobin">
                    </div>

                    <!-- blood -->
                    <div>
                        <label for="blood" style="color:red">Want to be a blood donor? Check this:</label>
                        <input type="checkbox" id="blood" name="blood" value="no" onchange="checkBlood();">

                    </div>
                    <div class="bloodCheck" id="bloodCheck" style="display:none;">
                        <div class="form-group">
                            <label for="date">Date when you donated blood last time:</label>
                            <input type="date" class="form-control" id="bloodDate" name="bloodDate">
                        </div>
                    </div>


                    <!-- Plasma -->
                    <div>
                        <label for="check" style="color:red">Want to be a plasma donor? Check this:</label>
                        <input type="checkbox" id="check" name="check" value="no" onchange="checkPlasma();">
                    </div>
                    <div class="plasma" id="plasma" style="display:none;">
                        <div class="form-group">
                            <label for="date"><span style="color:red;">*</span>Date when you got recover from covid:</label>
                            <input type="date" class="form-control" id="plasmaCheck" name="plasmaCheck">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1"><span style="color:red;">*</span>Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" minlength="8" required>
                        <i class="far fa-eye" id="togglePassword"></i>
                    </div>
                    <div class="form-group-sm">
                        <label for="exampleInputPassword1"><span style="color:red;">*</span>Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" minlength="8" onchange="checkPassword();" required>
                        <i class="far fa-eye" id="togglePassword2"></i>
                        <small id="demo" style="color:red" ></small>                  
                    
                    <div>
                        <p><input type="checkbox" id="agreed" name="agreed" value="no" onchange="checkAgreed();">
                            By signing up you are agreed to our <a href="privacypolicy.php">Terms & Conditions</a> and <a
                                href="privacypolicy.php">Privacy Policy</a></p>

                    </div>

                    <button type="submit" class="btn btn-primary" id="signupbtn" name="signupbtn"
                        disabled>Signup</button>

            </div>
            <div class="modal-footer">

            </div>
            </form>
        </div>
    </div>
</div>
</div>


<script>






const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#signupPassword');
// const passwordc = document.querySelector('#signupcPassword');


togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

 const togglePassword2 = document.querySelector('#togglePassword2');
 const passwordc = document.querySelector('#signupcPassword');
 togglePassword2.addEventListener('click', function (e) {
      //toggle the type attribute
      
     const type = passwordc.getAttribute('type') === 'password' ? 'text' : 'password';
     passwordc.setAttribute('type', type);
    
      //toggle the eye slash icon
     this.classList.toggle('fa-eye-slash');
 });
function checkPassword() {
    var x = document.getElementById("signupPassword").value;
    var y = document.getElementById("signupcPassword").value;

    if (x != y) {
        
        document.getElementById("demo").innerHTML = "Password does not match!";
    }
    else{
        document.getElementById("demo").innerHTML = "";
    }
}

function checkPlasma() {
    var x = document.getElementById("plasma");
    var y = document.getElementById("check");
    document.getElementById("plasmaCheck").required = true;
    if (y.value == "no") {
        y.value = "yes";

    } else {
        y.value = "no";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function checkBlood() {
    var x = document.getElementById("bloodCheck");
    var y = document.getElementById("blood");
    if (y.value == "no") {
        y.value = "yes";

    } else {
        y.value = "no";
    }
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function checkAgreed() {
    var x = document.getElementById("agreed");
    var y = document.getElementById("signupbtn");
    if (y.disabled) {
        y.disabled = false;
    } else {
        y.disabled = true;
    }


    if (x.value == "no") {
        x.value = "yes";
    } else {
        x.value = "no";
    }
}
function mobLength(){
    var x = document.getElementById("pri_num").value;
    var y = x.toString().length;
    if(y!=10){
            document.getElementById("pri_num_err").innerHTML = "Please enetr valid mobile number";
     }
     else{
            document.getElementById("pri_num_err").innerHTML = "";

     }
}
function mobLength2(){
    var x = document.getElementById("sec_num").value;
    var y = x.toString().length;
    if(y!=10){
            document.getElementById("sec_num_err").innerHTML = "Please enetr valid mobile number";
     }
     else{
            document.getElementById("sec_num_err").innerHTML = "";

     }
}
</script>
</body>
</html>