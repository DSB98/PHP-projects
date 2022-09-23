<div style="margin-top:80px;">
<?php
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
 <?php
if(isset($_GET['requirementAddedSuccessfully'])&& $_GET['requirementAddedSuccessfully']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['alert'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['requirementAddedSuccessfully'])&& $_GET['requirementAddedSuccessfully']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> '.$_GET['error'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if(isset($_GET['checkdetailsiscalled'])&& $_GET['checkdetailsiscalled']=="true"&&$_GET['record']=="found"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> The reacord is already present!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
</div>