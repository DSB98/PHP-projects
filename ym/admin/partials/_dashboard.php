<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true &&$_SESSION['user_role']=='admin' ){ 
echo'
<input type="checkbox" id="menu">
<nav>
    <label style="color:orange;">YM Helpline</label>
    

    <ul>
        <li><a href="../partials/_logout.php">Logout</a></li>
    </ul>

    <label for="menu" class="menu-bar">
        <i class="fa fa-bars"></i>
    </label>
</nav>



<div class="side-menu">
    <center>
        <img src="admin.png">
        <br><br>
        <h4>'.$_SESSION['username'].'</h4>
    </center>

    <br>
    <a href="../admin"><i class="fa fa-home"><span>Home </span></i></a>
    <div><a data-toggle="modal" data-target="#signupModal"><i class="fa fa-user"><span>Add User</span></i></a></div>
    <a href="viewDonors.php"><i class="fa fa-users"><span>Plasma Donors</span></i></a>
    
    
   

    <a href="../partials/_logout.php"><i class="Logout fa fa-sign-out-alt"><span>Logout</span></i></a>
    </div>
<br><br>

';
include 'partials/_signupModal.php';
}
else{
    header("location:/index.php");
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