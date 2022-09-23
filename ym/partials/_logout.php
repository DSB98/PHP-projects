<?php
session_start();
echo "Logging you out, pleas wait...!";
session_destroy();
header("location:/index.php?loggedout=true");
?>