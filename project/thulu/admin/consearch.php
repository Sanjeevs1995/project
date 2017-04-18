
<?php 

include('auth.php');
include('db.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : Consumer Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
  body {
  font: bold 11px/1.5em Verdana;
  }

h1 {
  font-family:Verdana, Arial, Helvetica, sans-serif;
  font-size:16px;
  font-weight:bold;
  margin:0;
  padding:0;
  }

hr {
  border:none;
  border-top:1px solid #CCCCCC;
  height:1px;
  margin-bottom:25px;
  }
  
#tabs {
  float:left;
  width:100%;
  background:#efefef;
  font-size:100%;
  line-height:25px;
  border-bottom:1px solid #666;
  }

#tabs ul {
  margin:0;
  padding:10px 10px 0 50px;
  list-style:none;
  }

#tabs li {
  display:inline;
  margin:0;
  padding:0;
  }

#tabs a {
  float:left;
  background:url("tableft.gif") no-repeat left top;
  margin:0;
  padding:0 0 0 4px;
  text-decoration:none;
  }

#tabs a span {
  float:left;
  display:block;
  background:url("tabright.gif") no-repeat right top;
  padding:5px 15px 4px 6px;
  color:#FFF;
  }

/* Commented Backslash Hack hides rule from IE5-Mac \*/
#tabs a span {float:none;}

/* End IE5-Mac hack */
#tabs a:hover span {
  color:#FFF;
  }

#tabs a:hover {
  background-position:0% -42px;
  }

#tabs a:hover span {
  background-position:100% -42px;
  }
  .floated_img
{
    float: left;
    background-color: white;
    display: inline-block;
border-radius: 4%;
}
.floated_img img:hover {
    opacity: .8;
    border-radius: 4%;
}

/* CSSTerm.com Simple CSS menu */

.menu_simple ul {
    margin: 0; 
    padding: 0;
    width:185px;
    list-style-type: none;
}

.menu_simple ul li a {
    text-decoration: none;
    color: white; 
    padding: 10.5px 11px;
    background-color: #005555;
    display:block;
}
 
.menu_simple ul li a:visited {
    color: white;
}
 
.menu_simple ul li a:hover, .menu_simple ul li .current {
    color: white;
    background-color: #5FD367;
}
 input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
</head>
<body>

<div><img src="emng.jpg" width="200px" height="150px" style="display: inline-block;
    margin:auto;"><img src="banner.jpg" width="650px" height="150px" style="display: inline-block;
    margin:auto;"><img src="online bill.jpg" width="350px" height="150px" style="display: inline-block;
    margin:auto;"></div>
<div id="tabs">
  <ul>
    <li><a href="adm_home.php"><span>Home</span></a></li>
    <li><a href="consearch.php"><span>Search Consumer</span></a></li>
    <li><a href="section.php"><span>Section Users</span></a></li>
    <li><a href="statistics.php"><span>Statisctics</span></a></li>
    li><a href="custph.php"><span>Payment Details</span></a></li>
    <li><a href="logout.php"><span>Logout</span></a></li>
    </ul>
</div>

<br><br><br><br>
<div class="menu_simple" style="float:left">
<ul>
<li><p style="text-align:center">QUICK LINKS</p></li>
<li><a href=="">Payment</a></li>
<li><a href="">Eservices</a></li>
<li><a href="">Downloads</a></li>
<li><a href="">Tarrif Calculator</a></li>
</ul>
</div>

<div style="padding-left:200px">
  


<h1>Consumer Search Portal</h1>

<p>Enter the consumer number to get details</p>
<form action="" method="POST">
<input type='text' name="consumer_num">
<input type="submit" name="submit" value="Get Consumer Details">
</form>
<br><br>

<?php
if(isset($_POST['submit'])){
$query=$_POST['consumer_num'];
}?>




<?php
    $result = mysql_query("SELECT * FROM `consumer` where consumer_num=$query");
    $row = mysql_fetch_array($result);
    if (empty($row)) { 
    echo 'No results found'; 
} else {
}
?>



<div style="width: 1000px; height: 500px;padding-left:200px">
<br>
<br>

                  <table style="border-radius:5%">
                    <tbody>
<th>
              <h3 ><b>Consumer Details<b></h3>
            </th>
                      <tr>
                        <td>Consumer #</td>
                        <td><?php echo $row['consumer_num'];?></td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td><?php echo $row['name'];?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $row['dob'];?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender'];?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $row['address'];?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $row['email'];?></td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?php echo $row['phone'];?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>





</body>
</html>
