<html>
<head><title>Products</title></head>

<?php
session_start();

$page_title = "Products";
$action = isset($_GET['action']) ? $_GET['action'] : "";
$pid = isset($_GET['pid']) ? $_GET['pid'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

if($action == "added"){
	echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was added to your cart!";
    echo "</div>";
}
if($action=='exists'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> already exists in your cart!";
    echo "</div>";
}

require_once 'logindb.php';
      $db_server = mysql_connect($db_hostname, $db_username, $db_password);
       If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
       mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

       $result = mysql_query("SELECT pid, name, price FROM Products ORDER BY name");
       if(!$result) die ("Database access failed: " . mysql_error());

        $rows = mysql_num_rows($result);
        if($rows>0){
        	echo "<table><tr><th>PID</th><th>Name</th><th>Price</th>";
            for($j=0;$j<$rows;++$j){
  	        $row = mysql_fetch_row($result);
  	        echo "<tr>";
  	        echo"<td>$row[0]</td>";
  	        echo"<td>$row[1]</td>";
  	        echo"<td>$row[2]</td>";
  	
  	        echo"</tr>";
        }
           echo "</table>";
        }