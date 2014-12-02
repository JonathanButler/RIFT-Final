<?php
  session_start();
  echo "<div class='main><h3>Please enter your detail to log in</h3>";
  $error = $email = $password = "";

  if (isset($_POST['user'])){
  	$email = santizeString($_POST['email']);
  	$password = santizeString($_POST['password']);
  	if ($email == "" || $password == ""){
  		$error = "Not all fields were entered.<br>";
  	}
  	else{
  		$
  	}
  }