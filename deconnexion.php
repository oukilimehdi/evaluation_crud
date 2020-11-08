<?php
session_start();

$_SESSION = $_SESSION[''];
session_destroy();
header("location: pageConnexion.php");

?>

