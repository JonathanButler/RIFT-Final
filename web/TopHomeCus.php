<html>
<head><title>Top Business Customers</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("Select H.name, sum(T.total_price) From Home H, Transaction T, Customer C Where T.email=C.email and C.type='home' and H.email=C.email group by T.email order by sum(T.total_price) desc limit 10");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Top Home Customers<hr><br/><table>
  <td width='10%'>Customer Name</td>
	<td width='15%'>Sales</td>";
  
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