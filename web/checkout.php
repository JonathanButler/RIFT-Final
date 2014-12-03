<?php 
session_start(); // Start session first thing in script
?>
<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php 

$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
$email = $_POST['email'];
$eid = $_POST['eid'];
$todaydate = date("Y/m/d");

//getting the tid
$result = mysql_query("SELECT max(tid) FROM Transaction");
$tidrow = mysql_fetch_array($result);
$tid = $tidrow[0]+1;

//getting the i_id
$inv = mysql_query("SELECT max(I_id) FROM Invoice");
$maxinv = mysql_fetch_array($inv);
$i_id = $maxinv[0]+1;
$warning = false;
$totalitems = '';

if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
	// Start the For Each loop
	$i = 0; 
	$baditem;
	$badnum;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$sql = mysql_query("SELECT * FROM Products WHERE pid='$item_id' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$product_name = $row["name"];
			$price = $row["price"];
			$details = $row["type"];
			$inventory = $row["inventory_amount"];
		}
		
		$quantity = $each_item['quantity'];
		
		$sql = mysql_query("SELECT pid, inventory_amount FROM Products WHERE pid='$item_id' ") or die(mysql_error());
		if ($quantity > $inventory){
			$warning = True;
			$baditem = $product_name;
			$badnum = $inventory;}

    } 
	if($warning == false){
    foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$sql = mysql_query("SELECT * FROM Products WHERE pid='$item_id' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$product_name = $row["name"];
			$price = $row["price"];
			$details = $row["type"];
			$inventory = $row["inventory_amount"];
		}
		$pricetotal = $price * $each_item['quantity'];
		$cartTotal = $pricetotal + $cartTotal;
		setlocale(LC_MONETARY, "en_US");
        $pricetotal = money_format("%10.2n", $pricetotal);
		// Dynamic Checkout Btn Assembly
		$x = $i + 1;
		$quantity = $each_item['quantity'];
		
		$sql = mysql_query("INSERT INTO Invoice (I_id, quantity, price, tid, pid) VALUES('$i_id','$quantity','$pricetotal','$email','$item_id')") or die(mysql_error());
		$inventory = $inventory - $quantity;
		$sql = mysql_query("UPDATE Products SET inventory_amount='$inventory' WHERE pid='$item_id'");
		$totalitems = $totalitems+$quantity; 
		
		$i_id = i_id+1;
		$i++; 
    } 
		$sql = mysql_query("INSERT INTO Transaction (tid, date, total_price, total_quantity, email, eid) VALUES('$tid','$todaydate','$cartTotal','$quantity','$email','$eid')") or die(mysql_error());
	}
	elseif($warning == true){
		echo 'Sorry, but we do not have enough items to complete your entire order - <a href="cart.php"> adjust your cart</a> and order less of the item ';
		echo $baditem;
		echo '. We only have ';
		echo $badnum;
		exit();
	}
}
unset($_SESSION["cart_array"]);
mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Cart</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div>
  <?php include_once("riftindexhead.php");?>
  <div id="pageContent">
    <div style="margin:24px; text-align:left;">
<br/>
    Success!  Order processed.  Your order number is: <?php echo $tid;?>.  Total: $ <?php echo $cartTotal; ?>
    <br/>
    <br/>
    <br/>
    </div>
  <?php include_once("riftfooter.php");?>

</body>
</html>