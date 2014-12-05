<html>
<head><title>Sales Performance of Regions</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("Select R.region, sum(T.total_price) from Transaction T, Salesperson S, Store ST, Region R where T.eid=S.eid and ST.sid=S.sid and ST.rid=R.rid Group By R.region order by sum(T.total_price) desc");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Regional Sales Volume<hr><br/><table>
  <td width='10%'>Region Name</td>
	<td width='15%'>Sales Volume</td>";
  
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