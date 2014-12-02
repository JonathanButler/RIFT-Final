<?php //This file is  used for adding items to shopping cart.
session_start();
//ob_start();
$id = $_GET("id") ? $_GET['id'] : "";
$name = $_GET("name") ? $_GET['name'] : "";
$quantity = $_GET("quantity") ? $_GET['quantity'] : "";
//session_register("mycart");
if(!isset($_SESSION['cart_items'])){
	$_SESSION['cart_items'] = array();
}
if(array_key_exists($id, $_SESSION['cart_items'])){
	header('Location: products.php?action=exists&id'.$id.'&name='.$name);
}
else{
	$_SESSION['cart_items'][$id] = $name;
	heder('Location: products.php?action=added&id'.$id.'&name='.$name);
}
// $arr = $_SESSION["mycart"];
// echo "success";

// if(is_array(($arr))){
//   if(array_key_exists($name, $arr)){
//     $uu = $arr[$name];
//     $uu["quantity"] = $uu["quantity"]+1;
//     $arr[$name] = $uu;
//   }
//   else{
//     $arr[$name] = array("name"=>$name, "quantity"=>1);
//   }
// }
// else{
//   $arr[$name] = array("name"=>$name, "num"=>1);
// }
// $_SESSION["mycart"] = $arr;
// ob_clean();
// echo "success";
//header("/Applications/MAMP/htdocs/database project/RIFT/web/php/shoppingCart.php");

?>

