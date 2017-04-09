<?php
session_start();
unset($_SESSION['mail']);
header('location:login.php?msg=logout+successful');
?>
