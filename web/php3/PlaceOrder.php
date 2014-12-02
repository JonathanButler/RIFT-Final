<?php //This file is used for displaying items in the shopping cart
session_start();
$arr = $_SESSION["mycart"];

require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_databse) or die("Unable to select database: " . mysql_error());

  foreach ($arr as $a) {
    $pidb = $a["pid"];
    $proQuery = "UPDATE product SET quantity = quantity - 1 WHERE pid = $pidb";
    $result = mysql_query($proQuery);
    if(!$result) die ("Database access failed: " . mysql_error());
  
?>
<a href = "homepage.php">Continue to do shopping</a>
  }
