<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
</style>




<?php


if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") { ?>

    <script>
        alert("Registration Successful...! Login credentials has been sent to user.");
    </script>

<?php
}

if (isset($_GET['signup']) && $_GET['signup'] == "false" && $_GET['error']=="User is already registered") { ?>

    
<script>
        alert("Registration Failed...! This user is already registered.");
    </script>

<?php
}
if (isset($_GET['signup']) && $_GET['signup'] == "false" && isset($_GET['vehicleIsAlreadyregistered'])) { ?>

    <script>
        alert("Registration Failed...! This tracker is already registered.");
    </script>

<?php
}
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && isset($_GET['trackerError'])) { ?>

    <script>
        alert("Registration Failed...! This vehicle is already registered.");
    </script>

<?php
}
 if (isset($_GET['PasswordHasBeenChangedSuccessfully']) && ( $_GET['PasswordHasBeenChangedSuccessfully'] =="true")){ ?>

     <script>
        alert("password changed successfully");
    </script>
    <?php
}
 ?>
  <?php
 
   if (isset($_GET['PasswordHasBeenChanged']) && ( $_GET['PasswordHasBeenChanged'] =="false")){ ?>

<script>
   alert("passwordDoNotMatch");
</script>
<?php 
   }

?> 
<?php
 
 if (isset($_GET['PasswordHasBeenChanged']) && ( $_GET['PasswordHasBeenChanged'] =="false")){ ?>

<script>
 alert("OldPasswordIsWrong");
</script>
<?php 
 }

?> 

    
     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>