<?php
session_start();
echo "Logging you out, pleas wait...!";
session_destroy();
header("location:/blood_bank/index.php?loggedout=true");
?>