<?php
//setting header to json
include('auth.php');
header('Content-type:application/json;');

//get connection
$mysqli=mysqli_connect("127.0.0.1:3388","root","","thulu");

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//database
if (!defined('DB_HOST')) define(DB_HOST,'127.0.0.1:3388');
if (!defined('DB_USERNAME')) define(DB_USERNAME,'root');
if (!defined('DB_PASWORD')) define(DB_PASSWORD,'');
if (!defined('DB_NAME')) define(DB_NAME,'thulu');


//query to get data from the table
$consumer_num=$_SESSION['consumer_num'];
$query = sprintf("SELECT category,units FROM my_chart_data where consumer_num=$consumer_num ");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>