<html>
<head><title>Search for Product</title></head>
<?php 
 if (isset($_POST["CheckB"])){
  $pro = $_POST["proName"];

require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("SELECT tid, max(total_quantity) FROM transaction GROUP BY tid");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<table><tr><th>PID</th><th>Total Quantity</th>";
  for($j=0;$j<$rows;++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";
  	echo"<td>$row[0]</td>";
  	echo"<td>$row[1]</td>";
  	echo"</tr>";
  }
  echo "</table>";
 
}
  
?> 
</html>