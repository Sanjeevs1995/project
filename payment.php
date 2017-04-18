
<?php 

include('auth.php');

  $merchant_key  = "gtKFFx";
  $salt          = "eCwWELxi";
  $payu_base_url = "https://test.payu.in"; // For Test environment
  $action        = '';
  $currentDir    = 'http://192.168.0.103:888/thulu/';
  $posted = array();
  if(!empty($_POST)) {
    foreach($_POST as $key => $value) {    
      $posted[$key] = $value; 
    }
  }

  $formError = 0;
  if(empty($posted['txnid'])) {
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  } else {
    $txnid = $posted['txnid'];
  }

  $hash         = '';
  $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

  if(empty($posted['hash']) && sizeof($posted) > 0) {
    if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
    ){
      $formError = 1;

    } else {
      $hashVarsSeq = explode('|', $hashSequence);
      $hash_string = '';  
    foreach($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
      }
      $hash_string .= $salt;
      $hash = strtolower(hash('sha512', $hash_string));
      $action = $payu_base_url . '/_payment';
    }
  } elseif(!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $payu_base_url . '/_payment';
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Consumer Home</title>
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
input[type=email], select {
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
<body onload="submitPayuForm()">

<div><img src="emng.jpg" width="200px" height="150px" style="display: inline-block;
    margin:auto;"><img src="banner.jpg" width="650px" height="150px" style="display: inline-block;
    margin:auto;"><img src="online bill.jpg" width="350px" height="150px" style="display: inline-block;
    margin:auto;"></div>
<div id="tabs">
  <ul>
    <li><a href="con_home.php"><span>Home</span></a></li>
    <li><a href="#"><span>Contact</span></a></li>
    <li><a href="#"><span>Feedback</span></a></li>
    <li><a href="#"><span>Complaints</span></a></li>
    <li><a href="statistics.php"><span>Statisctics</span></a></li>
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

  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
   <h2>Online Payment Portal</h2>
    <br/>
    <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Please fill CAREFULLY</b></td>
        </tr>
        <tr>


<?php
include('db.php');
$posted['firstname']=$_SESSION['consumer_num'];
$consumer_num=$_SESSION['consumer_num'];
$result2 = mysql_query("SELECT * FROM `meter_readings` where consumer_num='$consumer_num' ORDER BY id DESC limit 1,2");
    $row2 = mysql_fetch_array($result2);
    $result3 = mysql_query("SELECT * FROM `meter_readings` where consumer_num='$consumer_num' ORDER BY id DESC limit 1");
    $row3 = mysql_fetch_array($result3);?>
<?php  $units=$row3['units'] - $row2['units']; 
$tax1=$units* 4 *.145;
$total= $units*4 + $tax1 + 150;
$posted['amount']= $total - 35 ;
?>


          <td>Amount</td>
          <td><input name="amount" type="hidden" value="<?=$posted['amount'] ?>" /><?php echo $posted['amount']; ?></td>
          <td>Consumer Number<span class="mand">*</span>: </td>
          <td><input type="hidden" name="firstname" id="firstname" value="<?=$posted['firstname']?>" /><?php echo $posted['firstname'];?></td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td><input type="email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone <span class="mand">*</span>: </td>
          <td><input type="text" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td colspan="3"><input name="productinfo" value="Redirecting to pay your Electricity Bill. Discount of Rs.35 applied" type="hidden"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></input></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Pay Now" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
</div>




</body>
</html>
