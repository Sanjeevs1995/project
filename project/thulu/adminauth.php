
<?php
session_start();
if(!isset($_SESSION["username"]) || time() - $_SESSION['login_time'] > 18000){
header("Location: index.php");
exit(); }
?>