<?php
session_start();
session_destroy();
header('location:../UserPanel/loginform/log_in.php')
?>
