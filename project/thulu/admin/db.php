<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com
*/
?>

<?php
$connection = mysql_connect('127.0.0.1:3388', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('thulu');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
?>