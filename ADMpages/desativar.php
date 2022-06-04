<?php
include("../connection.php");
$id = $_GET['id'];
$result=mysqli_query($mysqli, "UPDATE login SET ativo='N' WHERE idLogin=$id");
header("Location:indexADM.php");
?>  

