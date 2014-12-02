<?php
  session_start();
  echo "<div class='main><h3>Please enter your detail to log in</h3>";
  $error = $email = $password = "";

  if (isset($_POST['user'])){
  	$email = $_POST['email'];
  	$password = $_POST['password'];
  	if ($email == "" || $password == ""){
  		$error = "Not all fields were entered.<br>";
  	}
  	else{
      require_once 'logindb.php';
      $db_server = mysql_connect($db_hostname, $db_username, $db_password);
      If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
      mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

    $result = mysql_query("SELECT email, password FROM customer, home WHERE email = '$email' AND password = '$password");
    if(!$result) die ("Database access failed: " . mysql_error());
  	$rows = mysql_num_rows($result);
    if ($rows == 0){
      $error = "<span class='error'>Email or Password invalid</span><br><br>;
    }
    else{
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      die("You are logged in.");
    }
  	}
  }

  ?>