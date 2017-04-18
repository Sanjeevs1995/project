
<?php
include('db.php');
include('auth.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Electricity Bill</title>
	
	<link rel='stylesheet' type='text/css' href='/thulu/bill/css/style.css' />
	<link rel='stylesheet' type='text/css' href='/thulu/bill/css/print.css' media="print" />
	<script type='text/javascript' src='/thulu/bill/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='/thulu/bill/js/example.js'></script>

</head>

<body>

<br><br><p style="text-align:center;"><a href="/thulu/con_home.php"><button>Home</button></a>
<button  id="printpagebutton"onclick="printpage()">Print this page</button>
<a href="/thulu/payment.php"><button>Pay Now</button></a>
<a href="/thulu/logout.php"><button>Logout</button></a>

<script>
function printpage() {
var printButton = document.getElementById("printpagebutton");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';}
</script>
</p>

	<div id="page-wrap">

		<textarea id="header" readonly>Electricity Bill</textarea>
		
		<div id="identity">
		


<?php
$consumer_num=$_SESSION['consumer_num'];
    $result = mysql_query("SELECT address FROM `consumer` where consumer_num='$consumer_num' ORDER BY id DESC");
    $row = mysql_fetch_array($result);
    $result1 = mysql_query("SELECT * FROM `bills` where consumer_num='$consumer_num' ORDER BY id DESC limit 1");
    $row1 = mysql_fetch_array($result1);
    $result2 = mysql_query("SELECT * FROM `meter_readings` where consumer_num='$consumer_num' ORDER BY id DESC limit 1,2");
    $row2 = mysql_fetch_array($result2);
    $result3 = mysql_query("SELECT * FROM `meter_readings` where consumer_num='$consumer_num' ORDER BY id DESC limit 1");
    $row3 = mysql_fetch_array($result3);?>
    
            <textarea id="address" readonly>Consumer Details:
consumer #<?php echo $consumer_num;?>

Address:
<?php echo $row['address'];?>
	
</textarea>

            <div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 80px)
              </div>
              <img id="image" src="/thulu/bill/images/logo1.png" alt="logo" width="300px" height="100px" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title" readonly>Kerala State Elec. Board
A Kerala State Initiative</textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Bill #</td>
                    <td><?php echo $row1['bill#'];?></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td>December 15, 2009</td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">NIL</div></td>
                </tr>
                <tr>
                    <td class="meta-head">Last meter reading</td>
                    <td><div class="due"><?php echo $row2['units'];?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">Current Meter Reading</td>
                    <td><div class="due"><?php echo $row3['units'];?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name">Usages</div></td>
		      <td class="description">Unit consumptions for last two months</td>
		      <td>Rs.4.00</td>
		      <td><?php $units= $row3['units']-$row2['units'];echo $units?></td>
		      <td><span class="price"><?php echo $units*4 ; ?></span></td>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name">Service Tax</div></td>

		      <td class="description">Service tax as applicable</td>
		      <td>14.5%</td>
		      <td>1</td>
		      <td><span class="price">
<?php $tax=  $units*4;
$tax1=$tax*.145;
echo $tax1;
 ?></span></td>
		  </tr>

		  <tr class="item-row">
		      <td class="item-name">Meter rent</div></td>

		      <td class="description">Monthly meter rent of rs.75.00 is collected per month</td>
		      <td>75</td>
		      <td>2</td>
		      <td><span class="price">150</span></td>
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank">REMARKS : <?php
if ($units>=500) {
	echo "More consumptions.Please reduce your consumption to conserve energy";
	echo "You have consumed ";echo $units;echo " units";
} else {
	echo "Congrats.You have maintained fair usage. You have consumed only ";echo $units;echo " units";
}



		      ?> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php $subtotal=  $units*4 + $tax1 + 150;echo $subtotal; ?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Discounts</td>
		      <td class="total-value"><div id="total">Rs.35</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total</td>
		      <td class="total-value balance"><div class="due"><?php echo $subtotal - 35;?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea readonly>Bills have to paid within one month of issuing. Online payments are accepted.Fair usage is upto 500 units consumption.</textarea>
		  <div><img src="/thulu/banner.jpg" width="650px" height="150px" style="display:block;
    margin:auto;"></div>
		</div>
	
	</div>
	
</body>

</html>