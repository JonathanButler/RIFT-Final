<?php //This file is used for searching products.
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_databse) or die("Unable to select database: " . mysql_error());

if (isset($_POST['proName']))
  	$proName = fix_string($_POST['proName']);

$proQuery = "SELECT * FROM product WHERE name = %proName%";
$result = mysql_query($proQuery);
if(!$result) die ("Database access failed: " . mysql_error());

echo "<html><head><title>Search for Product</title></head></html>";
if($result == null){
	echo "<html><body>Sorry, product cannot be found</body</html>";
else{
	echo "<table><tr><th>ID</th><th>Name</th><th>Gender</th><th>Color</th><th>Type</th><th>Inventory</th>"
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

// echo<<<_END
// <form method="post" action="/Applications/MAMP/htdocs/database project/RIFT/web/php/SearchProduct.php">  
//                 <div class="search">  
//                 <input type="text" name="proName" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
//                 <input type="submit" value="Subscribe" id="submit" name="submit">
//                 <div id="response"> </div>
//               </div><div class="clear"></div> </form>
// _END;
?>