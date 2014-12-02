<?php //This file is used for deleting items in the shoppin cart.
  session_start();
  ob_start();
  $pid = $_POST("pid");
  $arr = $_SESSION["mycart"];
  foreach($arr as $key => $proId){
  	if($key == $pid){
  		unset($arr[$key]);
  	}
  }
  $_SEESION["mycart"] = $arr;
  ob_clean();
  header("/Applications/MAMP/htdocs/database project/RIFT/web/php/shoppingCart.php");

  ?>