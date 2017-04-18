
<?php 
include('auth.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Statistics</title>
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
<li><a href="payment.php">Payment</a></li>
<li><a href="bill.php">View Bill</a></li>
<li><a href="#">Downloads</a></li>
<li><a href="tariff.php">Tarrif Calculator</a></li>
</ul>
</div>
<div style="padding-left:200px">


<h1>Section Wise Usage Statistics</h1>


<p>Enter the consumer number to get usage stats</p>
<form action="" method="POST">
<input type='text' name="consumer_num">
<input type="submit" name="submit" value="Get Usage">
</form>
<br><br>

<?php
if(isset($_POST['submit'])){
$consumer_num=$_POST['consumer_num'];
}
 ?>

<!-- javascript -->
    <script type="text/javascript" src="graph/jquery.min.js"></script>
    <script type="text/javascript" src="graph/Chart.min.js"></script>

    <script type="text/javascript">$(document).ready(function(){
  $.ajax({
    url : 'http://192.168.0.103:888/thulu/admin/custgraph.php?consumer_num=' + <?php echo $consumer_num;
 ?> ,
    type : "GET",
    success : function(data){
      console.log(data);
  

      var category = [];
      var units = [];
      

      for(var i in data) {
        category.push(data[i].category);
        units.push(data[i].units);
        
      }

      var chartdata = {
        labels: category,
        datasets: [
          {
            label: "units",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: units
          }
          
        ]
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});</script>
 <style>
      .chart-container {
        width: 640px;
        height: auto;
      }
    </style>



<?php
include('db.php');
    $result = mysql_query("SELECT consumer_num FROM `consumer` WHERE consumer_num='$consumer_num'");
    $row = mysql_fetch_array($result);
    if (empty($row)) { 
    echo 'No results found'; 
} else {
}
?>


<p> <b>Usage statistics for Consumer Number#:&nbsp&nbsp <?php echo $consumer_num; ?></b> &nbspTo get customer details<a href="consearch.php"> Click Here</p>


    <div class="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
    </div>
    


</body>
</html>
