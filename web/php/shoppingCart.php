<?php //This file is used for displaying items in the shopping cart
session_start();
$arr = $_SESSION["mycar"];
?>

<table width = "600" height = "37" border = "1">
	<tr>
	<tdwidth = "96">Product ID</td>
	<tdwidth = "158">Product Name</td>
	<tdwidth = "154">Quantity</td>
	<tdwidth = "177">Delete</td>
	</tr>

<?php
  foreach ($arr as $a) {
?>
  
  <tr>
  	<td width = "96"><?php echo $a["pid"]?></td>
  	<td width = "158"><?php echo $a["name"]?></td>
  	<td width = "154"><?php echo $a["quantity"]?></td>
  	<td width = "177"><a href = "delete.php?id=<?php echo $a[pid]?>">Delete</a></td>
  </tr>

</table>
<a href = "homepage.php">Continue to do shopping</a>
  }
