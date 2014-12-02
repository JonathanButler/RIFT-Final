<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php
if(isset($_POST['eid'])) {
	$eid = $_POST['eid'];
	$transaction_list = "";
	$sql = mysql_query("SELECT * FROM Transaction WHERE eid='$eid' ORDER BY date");
	$productCount = mysql_num_rows($sql); //count the output
	if($productCount > 0){
 	while($row=mysql_fetch_array($sql)){
 		$tid = $row["tid"];
 		$date = $row["date"];
 		$total_price = $row["total_price"];
 		$total_quantity = $row["total_quantity"];
 		$email = $row["email"];
 		$eid = $row["eid"];

 		$transaction_list .="<tr><td>$tid</td><td>$date</td><td>$total_price</td><td>$total_quantity</td><td>$email</td><td>$eid</td></tr>";
		}
	}
}

if(isset($_POST['email'])) {
	$email = $_POST['email'];
	$transaction_list = "";
	$sql = mysql_query("SELECT * FROM Transaction WHERE email='$email' ORDER BY date");
	$productCount = mysql_num_rows($sql); //count the output
	if($productCount > 0){
 	while($row=mysql_fetch_array($sql)){
 		$tid = $row["tid"];
 		$date = $row["date"];
 		$total_price = $row["total_price"];
 		$total_quantity = $row["total_quantity"];
 		$email = $row["email"];
 		$eid = $row["eid"];

 		$transaction_list .="<tr><td>$tid</td><td>$date</td><td>$total_price</td><td>$total_quantity</td><td>$email</td><td>$eid</td></tr>";
		}
	}
}

//get the names of salespeople and get customer emails
//This section grabs all the products from the database
$salespeoplelist = "";
$sql = mysql_query("SELECT eid, name FROM Salesperson order by name");
$salespeople = mysql_num_rows($sql); //count the output
if($salespeople > 0){
 while($row=mysql_fetch_array($sql)){
 	$eid = $row["eid"];
 	$name = $row["name"];
 	$salespeoplelist .="<option value='$eid'>$eid - $name</option>";
 }
}
else{
	$salespeoplelist = "You have no salespeople";
}

$customerlist = "";
$sql = mysql_query("SELECT email FROM Customer");
$customers = mysql_num_rows($sql); //count the output
if($customers > 0){
 while($row=mysql_fetch_array($sql)){
 	$email = $row["email"];
 	$customerlist .="<option value='$email'>$email</option>";
 }
}
else{
	$customerlist = "You have no customers";
}
  
mysql_close(); 		
?>
<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP</title>
<?php include_once("riftheader.php");?>
	
				<br/>
				<h3>RIFT Orders:</h3>
	<br/>
				View by 
				<table>
				<tr>
				
		<form action="orders.php" method="POST">
    <select name="eid" id="eid" onchange="this.form.submit()">
    <option value="">Salesperson</option>
    <?php echo $salespeoplelist; ?>
    </select>
    </form>
   	<form action="orders.php" method="POST">
    <select name="email" id="email" onchange="this.form.submit()">
    <option value="">Customer</option>
    <?php echo $customerlist; ?>
    </select>
    </form>			
		</table>		
				<hr>
				<br/>
				<table>
				<td width="5%">Transaction ID</td>
				<td width="5%">Date</td>
				<td width="7%">Total Price</td>
				<td width="10%">Number of Items</td>
				<td width="10%">Customer Email</td>
				<td width="8%">Employee ID</td>
				<?php echo $transaction_list; ?>
          <div class="wrap">
        </table>
        <br/>
        <br/>
        <hr>	
       
			</div>

<?php include_once("riftfooter.php");?>
</body>
</html>