<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 
}

echo'<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="#">Blood Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
   <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
   </form>';
   if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    echo '<p class="text-light my-0 mx-2">Welcome '.$_SESSION['username'].'</p>
    <a role="button" href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
    </form>';
  }
  else{
   echo '<button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
  <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
}
  echo '</div>

</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

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