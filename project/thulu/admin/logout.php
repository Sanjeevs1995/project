<?php
include("auth.php");
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("refresh: 10; url: index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="5;url=index.php">
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<br/>
<br/>
<br/>

<div class="form" align="centre">

<font color="red" align="centre"><h3>!!! You are logged out !!!</h3></font>
<br>
<form action="index.php">
<input type="submit" value="Login Back" /></form>
<br>
<font color="red"><h4>You will be automatically redirected to login page</h4></font>
</font>
</div>
</body>