<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true &&$_SESSION['user_role']=='admin' ){ 
echo'
<input type="checkbox" id="menu">
<nav>
    <label>Blood Bank</label>

    <ul>
        <li><a href="../partials/_logout.php">Logout</a></li>
    </ul>

    <label for="menu" class="menu-bar">
        <i class="fa fa-bars"></i>
    </label>
</nav>



<div class="side-menu">
    <center>
        <img src="deepak.jpg">
        <br><br>
        <h2>Deepak</h2>
    </center>

    <br>
    <a href="../admin"><i class="fa fa-home"><span>Home </span></i></a>
    <div><a data-toggle="modal" data-target="#signupModal"><i class="fa fa-user"><span>Add User</span></i></a></div>
    <a href="#"><i class="fa fa-users"><span>View Users</span></i></a>
    <a href="#"><i class="fa fa-plus-square-o"><span>Edit</span></i></a>
    <a href="add_blood.php"><i class="fa fa-comment"><span>Add Blood</span></i></a>
    <a href="#"><i class="fa fa-heartbeat"><span>Sells</span></i></a>
    <a href="#"><i class="fa fa-user"><span>Add Category</span></i></a>
    <a href="#"><i class="fa fa-book"><span>New Artical </span></i></a>
    <a href="#"><i class="fa fa-comment"><span>Comments</span></i></a>
    <a href="../partials/_logout.php"><i class="Logout fa fa-sign-out"><span>Logout</span></i></a>
    </div>
<br><br>

';
include 'partials/_signupModal.php';
}
else{
    header("location: /blood_bank/index.php");
    exit();
    }

    if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You are registerd successfully, now you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
      if(isset($_GET['signup'])&& $_GET['signup']=="false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>failed!</strong> Email address is already in use.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      ?>
<div class="main">
  <?php
      if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>failed!</strong> Password do not match.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
      if(isset($_GET['loginEmailError'])&& $_GET['loginEmailError']=="false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>failed!</strong>Email is not registered.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
      if(isset($_GET['loginPassError'])&& $_GET['loginPassError']=="false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>failed!</strong> Incorrect password, please try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
      if(isset($_GET['loggedin'])&& $_GET['loggedin']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You are logged in successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
      if(isset($_GET['loggedout'])&& $_GET['loggedout']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You are logged out successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
?>
</div>