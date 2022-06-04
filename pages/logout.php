<?php
session_start();
// session_destroy();
unset($_SESSION['validado']);
header("Location:../index.php");
?>
