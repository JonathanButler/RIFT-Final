<html>
<head><title>Top 25 Products</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("SELECT P.name, I.pid, sum(I.quantity) FROM Invoice I, Products P WHERE I.pid=P.pid GROUP BY pid ORDER BY sum(I.quantity) desc limit 25");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Top 25 Products<hr><br/><table>
	<td width='10%'>Product Name</td> 
 	<td width='10%'>Product ID</td>
	<td width='15%'>Quantity Ordered</td>";
  for($j=0;$j<$rows;++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";
  	echo"<td>$row[0]</td>";
  	echo"<td>$row[1]</td>";
  	echo"<td>$row[2]</td>";
  	echo"</tr>";
  }
  echo "</table>";
 

  
?> 
<br>
<?php include_once("riftfooter.php");?>
</html>