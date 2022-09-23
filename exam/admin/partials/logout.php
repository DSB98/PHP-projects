<?php
session_start();
echo "Logging you out, pleas wait...!";
session_destroy();
header("location:http://localhost/exam/login.php?loggedout=true");
?>