<?php  //This file is used for showing the order information after users placing orders.
  echo "<html><head><title>Order Being Processed</title></head><body>Thank you! Your Order Is Being Processed.</body><html>"

  require_once 'login.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!db_server) die("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database) or die ("Unable to select database: " . mysql_error() );
  
?>