<html>
<head><title>Sign Up</title></head>
<?php //This file is used for signing up. 
  $fail = $password = $gender = $marital = $email = $bday = $city = $zip = $state = $street = $type = $name = "";
  $type = "home";
  
  if (isset($_POST['name'])) //name of business customer
     $name = $_POST['name'];

  if (isset($_POST['password'])) //customer password
   	$password = $_POST['password'];

   if (isset($_POST['email'])) //customer email
  	$email = $_POST['email'];

  if (isset($_POST['gender'])) //customer email
    $gender = $_POST['gender'];
 
  if (isset($_POST['marital']))  //marital status for home customer
    $marital = $_POST['marital'];

  if (isset($_POST['bday']))  //birthday fro home customer
    $bday = $_POST['bday'];

   if (isset($_POST['city'])) 
     $city = $_POST['city'];

  if (isset($_POST['zip']))
    $zip = $_POST['zip'];

  if (isset($_POST['state']))
    $state = $_POST['state'];

  if (isset($_POST['street']))
    $street = $_POST['street'];
 
  

    

   $fail .= validate_name($name);
   $fail .= validate_password($password);
   $fail .= validate_email($email);
   $fail .= validate_gender($gender);
   $fail .= validate_marital($marital);
   $fail .= validate_bday($bday);
   $fail .= validate_city($city);
   $fail .= validate_zip($zip);
   $fail .= validate_state($state);
   $fail .= validate_street($street);
  
  

  if($fail == ""){
  echo "Successful Registration<br>";
  echo "You've registered for our system successfully! Now you can enjoy shopping here!";

  //Enter the posted fields into a database
  require_once 'logindb.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!db_server) die("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database) or die ("Unable to select database: " . mysql_error() );

  
    $insertQuery3 = "INSERT INTO Customer(email, street, city, state, zip, type, password) VALUES ($email, $street, $city, $state, $zip, $type, $password)";
    $result3 = mysql_query($insertQuery3);
    $insertQuery4 ="INSERT INTO Home(email, name, gender, bday, marital) VALUES ($email, $name, $gender, $bday, $marital)";
    $result4 = mysql_query($insertQuery4);
    if(!result3 or !result4) die ("Database access failed:" . mysql_error());
  //echo "$insertQuery3";

 }
  else{
    echo "Please fill in the required areas.";
   }

  function validate_name($field){
    if($field == ""){
      return "No name was entered";
    }
    else{
      return "";
    }
    }
  function validate_password($field){
    if ($field == ""){ 
      return "No password was enterd.<br>";
    }
    else if (strlen($field) < 6){
      return "Passwords must be at least 6 characters.<br>";
    }
    else if (!preg_match("/[a-z]/", $field) ||
               !preg_match("/[A-Z]/", $field)||
               !preg_match("/[0-9]/", $field))
        return "Passwords require 1 each of a-z, A-Z and 0-9.<br>";
    return "";
    
  }
  function validate_email($field){
    if($field == ""){
      return "No email was entered";
    }
    else{
      return "";
    }
  }
  function validate_gender($field){
    if($field == ""){
      return "No gender was entered";
    }
    else{
      return "";
    }
  }
  function validate_marital($field){
    if($field == ""){
      return "No marital status was entered";
    }
    else{
      return "";
    }
  }
  function validate_bday($field){
    if($field == ""){
      return "No birthday was entered";
    }
    else{
      return "";
    }
  }
  function validate_city($field){
    if($field == ""){
      return "No city was entered";
    }
    else{
      return "";
    }
  }
  function validate_state($field){
    if($field == ""){
      return "No state was entered";
    }
    else{
      return "";
    }
  }
  function validate_zip($field){
    if($field == ""){
      return "No zip code was entered";
    }
    else{
      return "";
    }
  }
  function validate_street($field){
    if($field == ""){
      return "No street was entered";
    }
    else{
      return "";
    }
  }
  
  
?>

</html>