<?php //This file is used for checking the top product categories.
  require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_databse) or die("Unable to select database: " . mysql_error());

 if (isset($_POST['proName']))
 	$proName = fix_string($_POST['proName']);

 //$proQuery = "SELECT MAX SUM(quantity), SUM(price) from Invoice, Product where name = $proName";
 $result = mysql_query($proQuery);
if(!$result) die ("Database access failed: " . mysql_error());

echo "<html><head><title>Search for Aggregate Sales and Profit of a Product</title></head></html>";
if($result == null){
	echo "<html><body>Sorry, product cannot be found</body</html>";
else{
	echo "<table><tr><th>Name</th><th>Total Quantity</th><th>Total Profit</th>"
	for ($j = 0; $j < $row; ++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";

  	for ($k = 0; $k < 4; ++$k){
  		echo "<td>$row[$k]</td>";

  	echo "</tr>"
  	}

  	echo "</table>";
}
}

?>