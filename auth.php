
<?php
session_start();
if(!isset($_SESSION["consumer_num"]) || time() - $_SESSION['login_time'] > 180000){
header("Location: index.php");
exit(); }
?>