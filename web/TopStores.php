<html>
<head><title>Top Product</title></head>
<?php include_once("riftheader.php");?>
<?php 
 require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("select t.sid, max(t.total_quantity) as top_sales from (select temp.nsid as sid, sum(temp.squantity) as total_quantity from 
(select s.sid as nsid, s.eid as neid, sum(t.total_quantity) as squantity from Salesperson s, Transaction t where s.eid = t.eid group by s.eid) as temp, Store
where temp.nsid = Store.sid group by temp.nsid) as t");
  if(!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo "<br/>Stores<hr><br/><table>
  <td width='10%'>Store ID</td>
	<td width='15%'>Number of Sales</td>";
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