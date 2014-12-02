<?php //This file is used for checking the users' information.
  require_once 'login.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_databse) or die ("Unable to select database: " . mysql_error());

  $searchQuery = "SELECT * FROM userInfo";
  $reult = mysql_query($searchQuery);

  if(!$result) die ("Database access failed: " . mysql_errno());

  //show the selected records
  $row = mysql_num_rows($row);
  echo "<table><tr> <th>Name</th> <th>Email</th></tr>"

  for ($j = 0; $j < $row; ++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";

  	for ($k = 0; $k < 4; ++$k){
  		echo "<td>$row[$k]</td>";

  	echo "</tr>"
  	}

  	echo "</table>";
  } 
?>