<html>
<head><title>Top Product Categories</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("select P.type, max(Temp.total_quantity) as max_total_quantity from 
(select T.tid, I.pid, sum(T.total_quantity) as total_quantity from Transaction T, Invoice I where T.tid=I.tid group by T.tid) as Temp, Products P 
group by P.type");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Total Product Categories<hr><br/><table>
  <td width='10%'>Type</td>
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