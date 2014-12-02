<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php
if (isset($_GET['pid'])) {
$targetID=$_GET['pid'];
$sql = mysql_query("SELECT * FROM Products WHERE pid='$targetID' LIMIT 1");
$productCount = mysql_num_rows($sql); //count the output
if($productCount > 0){
 while($row=mysql_fetch_array($sql)){
 	$id = $row["pid"];
 	$name = $row["name"];
 	$gender = $row["gender"];
 	$price = $row["price"];
 	$type = $row["type"];
 	$inventory = $row["inventory_amount"];
	}
}
else{
echo "Sorry, it doesn't exist";
exit();
}
}
?>
<?php
if (isset($_POST['name'])) {

	$pid = mysql_real_escape_string($_POST['thisID']);
	$name = mysql_real_escape_string($_POST['name']);
	$price = mysql_real_escape_string($_POST['price']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$type = mysql_real_escape_string($_POST['type']);
	$inventory_amount = mysql_real_escape_string($_POST['inventory_amount']);
//update the record
	$sql = mysql_query("UPDATE Products SET name='$name', price='$price', gender='$gender', type='$type', inventory_amount='$inventory_amount' WHERE pid='$pid'");
	
	if($_FILES['fileField']['tmp_name']!=""){
	$newname = "$pid.jpg";
	move_uploaded_file($_FILES['fileField']['tmp_name'],"images/$newname");
	}
	header("location: manageinventory.php");
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP LOG IN</title>
<?php include_once("riftheader.php");?>

        <a name = "inventoryForm" id="inventoryForm"></a>
        <br/>
        <form action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
        <table width="90%" border="0" cellspacing="0" cellpadding="6">
        	<tr>
        		<td width="10%">Product Name</td>
        		<td width="60%"><label>
        		<input name="name" type="text" id="name" size="50"value="<?php echo $name; ?>"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product ID</td>
        		<td><label>
        		<input name="pid" type="text" id="pid" size="10"value="<?php echo $id; ?>"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product Price</td>
        		<td><label>
        		$
        		<input name="price"type="text"id="price"size="12"value="<?php echo $price; ?>"/>
        		</label></td>
        	</tr>	
        	<tr>
        		<td>Gender</td>
        		<td><label>
        		<select name="gender" id="gender">
        		<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
        		<option value="m">Male</option>
        		<option value="f">Female</option>
        		</select>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Type</td>
        		<td><label>
        		<select name="type" id="type">
        		<option value="<?php echo $type; ?>"><?php echo $type; ?></option>
						<option value="belt">Belt</option>
        		<option value="blazer">Blazer</option>
        		<option value="camisole">Camisole</option>
        		<option value="casual shirt">Casual Shirt</option>
        		<option value="cotton coat">Cotton Coat</option>
        		<option value="denim coat">Denim Coat</option>
        		<option value="dress">Dress</option>
        		<option value="dress pants">Dress pants</option>
        		<option value="dress shirt">Dress Shirt</option>
        		<option value="jeans">Jeans</option>
        		<option value="leggings">Leggings</option>
        		<option value="long sleeve tee">Long Sleeve Tee</option>
        		<option value="scarf">Scarf</option>
        		<option value="short sleeve tee">Short Sleeve Tee</option>
        		<option value="skirt">Skirt</option>
        		<option value="socks">Socks</option>
        		<option value="sweater">Sweater</option>
        		<option value="tank top">Tank Top</option>
        		<option value="wool coat">Wool Coat</option>
        		</select>
        		</label
        	</tr>
        	<tr>
        		<td>Inventory Amount</td>
        		<td><label>
        		<input name="inventory_amount"type="text"id="inventory_amount"size="5"value="<?php echo $inventory; ?>"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product Image</td>
        		<td><label>
        		<input type="file" name="fileField"id="fileField"/>
						 </label></td>
        	</tr>
        	<tr>
        		<td></td>
        		<td><label>
        		<input name="thisID" type="hidden" value="<?php echo $targetID ?>"/>
        		<input type="submit" name="button"id="button"value="Make Changes"/>
        		</label></td>
        	</tr>
        </table>
        </form>
				<p><br></p>

				<div class="clear"></div>

			</div>

<?php include_once("riftfooter.php");?>
</body>
</html>