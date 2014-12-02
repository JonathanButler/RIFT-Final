<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php
//Check to see the URL variable is set and that it exists in the database
if(isset($_GET['pid'])) {
	$pid = $_GET['pid'];
	//Use this variable to check to see if this ID exists, if yes, get product details.
	//If no, exit
	$sql = mysql_query("SELECT * FROM Products WHERE pid='$pid' LIMIT 1");
	$productCount = mysql_num_rows($sql); //count the output
	if($productCount > 0){
		while($row=mysql_fetch_array($sql)){
 			$id = $pid["pid"];
 			$name = $row["name"];
 			$gender = $row["gender"];
 			$price = $row["price"];
 			$type = $row["type"];
 			$color = $row["color"];
 			$size = $row["size"];
 			$inventory = $row["inventory_amount"];
		}
	}else{
		echo "That item does not exist.";
		exit();
	}
}else{
	echo "No product in the system with that ID.";
	exit();
}
mysql_close();
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $name; ?></title>
<?php include_once("riftindexhead.php");?>
<br/>
<br/>
<div style="margin-left:24px;"><table width="100%"border="0"cellspacing="0"cellpadding="15">
<tr>
	<td width="20%"valign="top"><img src="images/pic.jpg"width="250" height="228">
	<td width="80%" valign="top"><?php echo $name; ?>
	<p><?php echo "$".$price ?><br/>
	<br/>
	Type: <?php echo $type; ?><br/>
	Color: <?php echo $color; ?><br/>
	Size: <?php echo $size; ?><br/>
	In stock: <?php echo $inventory; ?><br/>
	</p>
	<br/>
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>" />
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
      </form><br/>
	</p></td>
	</tr>
	</table>
	<br/>
</div>
	<?php include_once("riftfooter.php");?>
	</body>
</html>