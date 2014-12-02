<?php //This file is  used for adding items to shopping cart.
session_start();
ob_start();
$pid = $_GET("pid");
$name = $_GET("pname");
//session_register("mycart");
$arr = $_SESSION["mycart"];

if(is_array(($arr))){
  if(array_key_exists($pid, $arr)){
    $uu = $arr[$pid];
    $uu["num"] = $uu["num"]+1;
    $arr[$pid] = $uu;
  }
  else{
    $arr[$pid] = array("pid"=>$pid, "name"=>$name, "num"=>1);
  }
}
else{
  $arr[$pid] = array("pid"=>$pid, "name"=>$name, "num"=>1);
}
$_SESSION["mycart"] = $arr;
ob_clean();
header("/Applications/MAMP/htdocs/database project/RIFT/web/php/shoppingCart.php");

?>