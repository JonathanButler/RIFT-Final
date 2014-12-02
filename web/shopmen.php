<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php
if(isset($_POST['type'])) {
	$type = $_POST['type'];
	$product_list = "";
	$sql = mysql_query("SELECT * FROM Products WHERE gender='m' and type='$type' ORDER BY 	color");
	$productCount = mysql_num_rows($sql); //count the output
	if($productCount > 0){
 	while($row=mysql_fetch_array($sql)){
 		$id = $row["pid"];
 		$name = $row["name"];
 		$size = $row["size"];
 		$price = $row["price"];
 		$type = $row["type"];
 		$color = $row["color"];
 		$inventory = $row["inventory_amount"];

 		$product_list .="<tr><td>$id</td><td>$name</td><td>$size</td><td>$price</td><td>$type</td><td>$color</td><td>$inventory</td><td><a href='productviewing.php?pid=$id'>View</a><td>
 		<form id='form1' name='form1' method='post' action='cart.php'>
        <input type='hidden' name='pid' id='pid' value='$id' />
        <input type='submit' name='button' id='button' value='Add to Shopping Cart' />
      </form><td></tr>";
		}
	}
}
elseif (isset($_POST['color'])) {
	$color = $_POST['color'];
	$product_list = "";
	$sql = mysql_query("SELECT * FROM Products WHERE gender='m' and color='$color' ORDER BY 	type");
	$productCount = mysql_num_rows($sql); //count the output
	if($productCount > 0){
 	while($row=mysql_fetch_array($sql)){
 		$id = $row["pid"];
 		$name = $row["name"];
 		$size = $row["size"];
 		$price = $row["price"];
 		$type = $row["type"];
 		$color = $row["color"];
 		$inventory = $row["inventory_amount"];

 		$product_list .="<tr><td>$id</td><td>$name</td><td>$size</td><td>$price</td><td>$type</td><td>$color</td><td>$inventory</td><td><a href='productviewing.php?pid=$id'>View</a><td>
 		<form id='form1' name='form1' method='post' action='cart.php'>
        <input type='hidden' name='pid' id='pid' value='$id' />
        <input type='submit' name='button' id='button' value='Add to Shopping Cart' />
      </form><td></tr>";
	}
	}
}
elseif (isset($_POST['price'])) {
	$price = $_POST['price'];
	$product_list = "";
	$sql = mysql_query("SELECT * FROM Products WHERE gender='m' and price <= $price ORDER BY 	type");
	$productCount = mysql_num_rows($sql); //count the output
	if($productCount > 0){
 	while($row=mysql_fetch_array($sql)){
 		$id = $row["pid"];
 		$name = $row["name"];
 		$size = $row["size"];
 		$price = $row["price"];
 		$type = $row["type"];
 		$color = $row["color"];
 		$inventory = $row["inventory_amount"];

 		$product_list .="<tr><td>$id</td><td>$name</td><td>$size</td><td>$price</td><td>$type</td><td>$color</td><td>$inventory</td><td><a href='productviewing.php?pid=$id'>View</a><td>
 		<form id='form1' name='form1' method='post' action='cart.php'>
        <input type='hidden' name='pid' id='pid' value='$id' />
        <input type='submit' name='button' id='button' value='Add to Shopping Cart' />
      </form><td></tr>";
	}
	}
}
else{
	//This section grabs all the products from the database
	$product_list = "";
$sql = mysql_query("SELECT * FROM Products WHERE gender='f' ORDER BY type");
$productCount = mysql_num_rows($sql); //count the output
if($productCount > 0){
 while($row=mysql_fetch_array($sql)){
 	$id = $row["pid"];
 	$name = $row["name"];
 	$size = $row["size"];
 	$price = $row["price"];
 	$type = $row["type"];
 	$color = $row["color"];
 	$inventory = $row["inventory_amount"];

 	$product_list .="<tr><td>$id</td><td>$name</td><td>$size</td><td>$price</td><td>$type</td><td>$color</td><td>$inventory</td><td><a href='productviewing.php?pid=$id'>View</a><td>
 		<form id='form1' name='form1' method='post' action='cart.php'>
        <input type='hidden' name='pid' id='pid' value='$id' />
        <input type='submit' name='button' id='button' value='Add to Shopping Cart' />
      </form><td></tr>";

 }
}
else{
	$product_list = "You have no products in the store";
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP</title>
<?php include_once("riftindexhead.php");?>
	
				<br/>
				<h3>RIFT Products for Men:</h3>
	<br/>
				Browse:
				<table>
				<tr>
				<form action="shopmen.php" method="POST">
<select name="color" id="color" onchange="this.form.submit()">
    <option value="">Color</option>
    <option value="Blue">Blue</option>
    <option value="Green">Green</option>
    <option value="Red">Red</option>
    <option value="Yellow">Yellow</option>
    <option value="White">White</option>
    <option value="Black">Black</option>
</select>
</form>
<form action="shopmen.php" method="POST">
<select name="price" id="price" onchange="this.form.submit()">
    <option value="">Price</option>
    <option value="50">$50 or less</option>
    <option value="100">$100 or less</option>
    <option value="150">$150 or less</option>
    <option value="200">$200 or less</option>
</select>
</form>
			<form action="shopmen.php" method="POST">
<select name="type" id="type" onchange="this.form.submit()">
    <option value="">Type</option>
    <option value="belt">Belts</option>
    <option value="blazer">Blazers</option>
    <option value="camisole">Casual Shirt</option>
    <option value="cotton coat">Cotton Coats</option>
    <option value="dress">Denim Coats</option>
    <option value="dress pants">Dress Pants</option>
    <option value="dress shirt">Dress Shirt</option>
    <option value="jeans">Jeans</option>
    <option value="long sleeve tee">Long Sleeve Tees</option>
    <option value="scarf">Scarves</option>
    <option value="short sleeve tee">Short Sleeve Tees</option>
    <option value="socks">Socks</option>
    <option value="sweater">Sweaters</option>
    <option value="tank top">Tank Tops</option>
    <option value="wool coat">Wool Coats</option>
</select>
</form>
</tr>
</table>
<br/>
				<hr>
				<br/>
				<table>
				<td width="10%">Product ID</td>
				<td width="15%">Product Name</td>
				<td width="7%">Size</td>
				<td width="5%">Price</td>
				<td width="10%">Type</td>
				<td width="8%">Color</td>
				<td width="5%">Inventory</td>
				<td width="5%">Details</td>
				<td width="10%">Buy</td>
				<?php echo $product_list; ?>
          <div class="wrap">
        </table>
        <br/>
        <br/>
        <hr>	
        <a name = "inventoryForm" id="inventoryForm"></a>
       
			</div>

<?php include_once("riftfooter.php");?>
</body>
</html>