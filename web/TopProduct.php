<html>
<head><title>Top Product</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("SELECT pid, sum(quantity) FROM Invoice GROUP BY pid HAVING sum(quantity) >= ALL(SELECT sum(quantity) FROM Invoice GROUP BY pid)");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Top Product<hr><br/><table>
  <td width='10%'>Product ID</td>
	<td width='15%'>Quantity Sold</td>";
  for($j=0;$j<$rows;++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";
  	echo"<td>$row[0]</td>";
  	echo"<td>$row[1]</td>";
  	echo"</tr>";
  }
  echo "</table>";
 

  
?> 
<br>
<?php include_once("riftfooter.php");?>
</html>