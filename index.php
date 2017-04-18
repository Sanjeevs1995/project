<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['consumernumber'])){
        $consumer_num = $_POST['consumernumber'];
        $section_num = $_POST['sectionnumber'];
		$consumer_num = stripslashes($consumer_num);
		$consumer_num = mysql_real_escape_string($consumer_num);
		$section_num = stripslashes($section_num);
		$section_num = mysql_real_escape_string($section_num);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `consumer` WHERE consumer_num='$consumer_num' and section_num='$section_num'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
			$_SESSION['consumer_num'] = $consumer_num;
			$_SESSION['login_time'] = time();
			header("Location: con_home.php"); // Redirect user to index.php
            }else{
echo '<script language="javascript">';
echo 'alert("Wrong Consumer Number or Section Number")';
echo '</script>';
				}
    }else{}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Consumer Login</title>
  <link rel="stylesheet" href="consumerloginstyle.css">
</head>
<body>
  <form class="sign-up" method="post" action="">
    <h1 class="sign-up-title">Consumer Login</h1>
    <input type="text" class="sign-up-input" placeholder="Consumer Number" name="consumernumber" autofocus required autocomplete="off">
    <select type="password" class="sign-up-input" required="yes" name="sectionnumber">
    <option value="">Electoral Section</option>
    <option value="1208">Thrissur</option>
    <option value="1209">Irinjalakuda</option>
    <option value="1210">Chalakudy</option>
    <option value="1211">Kodakara</option>
    <option value="1212">Pudukkad</option></select>
    <input type="submit" value="Login" class="sign-up-button">
    <br><br>
    <p style="text-align: center"><a href="admin/" style="color: hotpink;text-decoration: none;">Admin Login</a></p>
  </form>
<div><img src="banner.jpg" width="650px" height="150px" style="display:block;
    margin:auto;"></div>
</body>
</html>
