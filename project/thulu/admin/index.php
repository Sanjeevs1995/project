<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE admin='$username' and password='".md5($password)."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['login_time'] = time();
			header("Location: adm_home.php"); // Redirect user to index.php
            }else{
            	echo '<script language="javascript">';
echo 'alert("Wrong Credentials")';
echo '</script>';
				}
    }else{}
?>





<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  
  
  
      <link rel="stylesheet" href="adminloginstyle.css">

  
</head>

<body>
  <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Admin Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
				<form action="" method="post">
				<input type="text" class="login-field" name="username" placeholder="username" id="login-name" autofocus autocomplete="off" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" name="password" placeholder="password" id="login-pass" autofocus autocomplete="off" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
<input class="btn btn-primary btn-large btn-block" name="submit" type="submit" value="Login" />
				<a class="login-link" href="/thulu/" style="color: hotpink;text-decoration: none;">Consumer Login</a>
			</div>
		</div>
	</div>
</body>
  
  
</body>
</html>
