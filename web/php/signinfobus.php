
<?php //This file is used for signing up. 
  $password = $category = $gross  = $email = $bday = $city = $zip = $state = $street = $type = $name = " ";

  if (isset($_POST['Password'])) //customer password
  	$password = fix_string($_POST['Password']);
  if (isset($_POST['Email'])) //customer email
  	$email = fix_string($_POST['Email']);
  if (isset($_POST['category'])) //category of the business customer
    $category = fix_string($_POST['category']);
  if (isset($_POST['gross'])) //gross of the business customer
    $gross = fix_string($_POST['gross']);
  if (isset($_POST['city'])) 
    $city = fix_string($_POST['city']);
  if (isset($_POST['zip']))
    $zip = fix_string($_POST['zip']);
  if (isset($_POST['state']))
    $state = fix_string($_POST['state']);
  if (isset($_POST['street']))
    $street = fix_string($_POST['street']);
  if (isset($_POST['type'])) //type or the customer, home or business
    $type = fix_string($_POST['type']);
  if (isset($_POST['name'])) //name of business customer
    $name = fix_string($_POST['name']);

  //$fail = validate_fname($fname);
  //$fail = validate_lname($lname);
  $fail .= validate_password($password);
  $fail .= validate_email($email);
  $fail .= validate_category($category);
  $fail .= validate_gross($gross);
  $fail .= validate_city($city);
  $fail .= validate_zip($zip);
  $fail .= validate_state($state);
  $fail .= validate_street($street);
  $fail .= validate_type($type);
  $fail .= validate_name($name);
  
  //validate information
  if($fail == ""){
  echo "<html><head><title>Successful Registration</title></head></html>";
  echo "<html><body>You've registered for our system successfully! Now you can enjoy shopping here!</body></html>";

  //Enter the posted fields into a database
  require_once 'logindb.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!db_server) die("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database) or die ("Unable to select database: " . mysql_error() );

  
    $insertQuery1 = "INSERT INTO Customer(email, street, city, state, zip, type) VALUES ($email, $street, $city, $state, $zip, $type)";
    $result3 = mysql_query($insertQuery3);
    $insertQuery2 ="INSERT INTO Home(name, password, email, street, city, state, zip, gender, bday, marital) VALUES ($name, $email, $street, $city, $state, $zip, $gender, $bday, $marital)";
    $result4 = mysql_query($insertQuery4);
    if(!result1 or !result2) die ("Database access failed:" . mysql_error());
  

}
  else{
    echo "<html><body>Please fill in the required areas.</body></html>"
  }

  
  function validate_password($field){
    if ($field == "") return "No password was enterd.<br>";
    else if (strlen($field) < 6){
      return "Passwords must be at least 6 characters.<br>"
      else if (!preg_match("/[a-z]/", $field) ||
               !preg_match("/[A-Z]/", $field)||
               !preg_match("/[0-9]/", $field))
        return "Passwords require 1 each of a-z, A-Z and 0-9.<br>";
      return "";
    }

  }
  function validate_email($field){
    return ($field == "") ? "No email was entered.<br>" : "";
  }
  function validate_category($field){
      return ($field == "") ? "No category was entered.<br>" : "";
  }
  function validate_gross($field){
      return ($field == "") ? "No gross was entered.<br>" : "";
    
  } 
  function validate_city($field){
    return ($field == "") ? "No city was entered.<br>" : "";
  }
  function validate_state($field){
    return ($field == "") ? "No state was entered.<br>" : "";
  }
  function validate_zip($field){
    return ($field == "") ? "No zip code was entered.<br>" : "";
  }
  function validate_street($field){
    return ($field == "") ? "No street was entered.<br>" : "";
  }
  function validate_type($field){
    return ($field == "") ? "No type was entered.<br>" : "";
  }
  
  function validate_name($field){
    return ($field == "") ? "No name was entered.<br>" : "";
  }
?>


  