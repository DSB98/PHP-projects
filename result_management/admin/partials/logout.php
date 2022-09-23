<?php
session_start();
echo "Logging you out, pleas wait...!";
session_destroy();
header("location:http://localhost/result_management/login.php?loggedout=true");
?>