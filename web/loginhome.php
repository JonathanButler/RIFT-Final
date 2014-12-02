<html>
<head><title>Log In</title></head>
<?php
  session_start(); 
  $error = $email = $password = "";

  if (isset($_POST['email'])){
  	$email = $_POST['email'];
  }
  if (isset($_POST['password'])){
  	$password = $_POST['password'];
  }
  	if ($email == "" || $password == ""){
  		$error = "Not all fields were entered.<br>";
      echo "$error";
  	}
  	else{
      require_once 'logindb.php';
      $db_server = mysql_connect($db_hostname, $db_username, $db_password);
       If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
       mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

     $result = mysql_query("SELECT email, password FROM Customer WHERE email = '$email' AND password = '$password' AND type = 'home'");
     if(!$result) die ("Database access failed: " . mysql_error());
    //echo "success";
  	$rows = mysql_num_rows($result);
    if ($rows == 0){
      $error = "<span class='error'>Email or Password invalid</span><br><br>";
      echo "$error";
    }
    else{
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "You are logged in.";
      echo "Please <a href='index.html'> click here to begin shopping!";
   //    //die("You are logged in. Please <a href='index.html'> click here to begin shopping!<br><br>");
       }
     }
  	

  ?>
  </html>