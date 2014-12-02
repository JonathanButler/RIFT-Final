<html>
<head><title>Total Sales by Day</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("select date, sum(total_price) as total_profit from Transaction group by date");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Total Profits by Date<hr><br/><table>
  <td width='10%'>Date</td>
	<td width='15%'>Total</td>";
  
  for($j=0;$j<$rows;++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";
  	echo"<td>$row[0]</td>";
  	echo"<td>$row[1]</td>";
  	echo"</tr>";
  }
  echo "</table>";
 

  
?>
<?php include_once("riftfooter.php");?>
</html>