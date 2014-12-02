<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php
//This section grabs all the products from the database
$product_list = "";
$sql = mysql_query("SELECT * FROM Products ORDER BY gender, type");
$productCount = mysql_num_rows($sql); //count the output
if($productCount > 0){
 while($row=mysql_fetch_array($sql)){
 	$id = $row["pid"];
 	$name = $row["name"];
 	$gender = $row["gender"];
 	$price = $row["price"];
 	$type = $row["type"];
 	$inventory = $row["inventory_amount"];

 	$product_list .="<tr><td>$id</td><td>$name</td><td>$gender</td><td>$price</td><td>$type</td><td>$inventory</td><td><a href='inventory_edit.php?pid=$id'>edit</a>/<a href='manageinventory.php?deleteid=$id'>delete</a></tr>";
 }
}
else{
	$product_list = "You have no products in the store";
}
?>
<?php
if (isset($_GET['deleteid'])) {
 echo 'Do you really want to delete the product with the ID of '.$_GET['deleteid'].'? <a href="manageinventory.php?yesdelete='.$_GET['deleteid'].'">Yes</a> |<a href="manageinventory.php">No</a>';
exit(); 
}
if (isset($_GET['yesdelete'])) {
 //remove item from system
 $id_to_delete=$_GET['yesdelete'];
 $sql=mysql_query("DELETE FROM Products WHERE pid='$id_to_delete' LIMIT 1") or die (mysql_error()); 
//remove the image
 $pictodelete=("images/$id_to_delete.jpg");
 if(file_exists($pictodelete)) {
 	unlink($pictodelete);	
 	}
	header("location: manageinventory.php");
	exit();
}
?>
<?php

if (isset($_POST['name'])) {
	
	$pid = mysql_real_escape_string($_POST['pid']);
	$name = mysql_real_escape_string($_POST['name']);
	$price = mysql_real_escape_string($_POST['price']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$type = mysql_real_escape_string($_POST['type']);
	$inventory_amount = mysql_real_escape_string($_POST['inventory_amount']);
	
	//Check for a product that is identical
	$sql = mysql_query("SELECT pid FROM Products WHERE name='$name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); //count output
	if($productMatch > 0){
		echo 'Sorry, you tried to place a duplicate product name into the system, <a href="manageinventory.php"> click here</a>';
		exit();
	}
		//Check for a duplicate product ID
	$sql = mysql_query("SELECT pid FROM Products WHERE pid='$pid' LIMIT 1");
	$productMatch = mysql_num_rows($sql); //count output
	if($productMatch > 0){
		echo 'Sorry, you tried to place a duplicate product ID into the system, <a href="manageinventory.php">click here</a>';
		exit();
	}	

	
	//add product into the database
	$sql = mysql_query("INSERT INTO Products (pid, name, price, gender, type, inventory_amount)
	VALUES('$pid','$name','$price','$gender','$type','$inventory_amount')") or die(mysql_error());
	$fid = mysql_real_escape_string($_POST['pid']);
	//place image in the folder
	$newname = "$fid.jpg";
	move_uploaded_file($_FILES['fileField']['tmp_name'],"images/$newname");
	header("location: manageinventory.php");
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP</title>
<?php include_once("riftheader.php");?>

				<div align="left" style="margin-left:50px"><a href="manageinventory.php#inventoryForm"><br/>+ Add New Inventory</a></div>
				<br/>
				<h3>Inventory List</h3>
				<hr>
				<br/>
				<table>
				<td width="10%">Product ID</td>
				<td width="15%">Product Name</td>
				<td width="7%">Gender</td>
				<td width="10%">Price</td>
				<td width="15%">Type</td>
				<td width="5%">Inventory</td>
				<td width="10%">Manage</td>
				<?php echo $product_list; ?>
          <div class="wrap">
        </table>
        <br/>
        <br/>
        <hr>	
        <a name = "inventoryForm" id="inventoryForm"></a>
        <h2>Add Inventory</h2>
        <br/>
        <form action="manageinventory.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
        <table width="90%" border="0" cellspacing="0" cellpadding="6">
        	<tr>
        		<td width="10%">Product Name</td>
        		<td width="60%"><label>
        		<input name="name" type="text" id="name" size="50"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product ID</td>
        		<td><label>
        		<input name="pid" type="text" id="pid" size="10"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product Price</td>
        		<td><label>
        		$
        		<input name="price"type="text"id="price"size="12"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Gender</td>
        		<td><label>
        		<select name="gender" id="gender">
        		<option value=""></option>
        		<option value="m">Male</option>
        		<option value="f">Female</option>
        		</select>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Type</td>
        		<td><label>
        		<select name="type" id="type">
        		<option value=""></option>
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
        		<input name="inventory_amount"type="text"id="inventory_amount"size="5"/>
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
        		<input type="submit" name="button"id="button"value="Add This Item Now"/>
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