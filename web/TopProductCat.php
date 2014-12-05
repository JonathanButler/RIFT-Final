<html>
<head><title>Top Product Categories</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("SELECT P.type, sum(I.quantity) FROM Invoice I, Products P WHERE I.pid=P.pid GROUP BY P.type ORDER BY count(P.type) desc");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Top Product Categories<hr><br/><table>
	<td width='10%'>Type</td>
	<td width='5%'>Quantity Sold</td>";
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