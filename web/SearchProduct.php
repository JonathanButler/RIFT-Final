<html>
<head><title>Search for Product</title></head>
<?php include_once("riftindexhead.php");?>
<?php 
 if (isset($_POST["proName"])){
  $pro = $_POST["proName"];

require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("SELECT * FROM Products WHERE name LIKE '%$pro%'");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  if($rows > 0){
 
  echo "<br/>Search Results:<hr><br/><table>
  <td width='10%'>Product ID</td>
	<td width='15%'>Name</td>
	<td width='7%'>Gender</td>
	<td width='5%'>Price</td>
	<td width='10%'>Type</td>
	<td width='7%'>Inventory</td>
	<td width='8%'>Color</td>
	<td width='5%'>Size</td>
	<td width='5%'>Details</td>
	<td width='10%'>Buy</td>";
  for($j=0;$j<$rows;++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";
  	echo"<td>$row[0]</td>";
  	echo"<td>$row[1]</td>";
  	echo"<td>$row[2]</td>";
  	echo"<td>$row[3]</td>";
  	echo"<td>$row[4]</td>";
  	echo"<td>$row[5]</td>";
  	echo"<td>$row[6]</td>";
  	echo"<td>$row[7]</td>";
  	echo"<td><a href='productviewing.php?pid=$row[0]'>View</a></td>";
  	echo"<td><form id='form1' name='form1' method='post' action='cart.php'>
        <input type='hidden' name='pid' id='pid' value='$row[0]' />
        <input type='submit' name='button' id='button' value='Add to Shopping Cart' /></td>";
  	echo "</tr>";
  }
  echo "</table><br/>";

}
else{
    echo "No products found.";
}
}
  
?> 
<?php include_once("riftfooter.php");?>
</html>