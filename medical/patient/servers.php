<?php
session_start();
error_reporting(0);
// initializing variables
$username = "";
$email    = "";
//$id    = "";
$name   = "";
$contact = "";
$address   = "";
//$doctor = "";
//$section   = "";
$errors = array(); 
 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'medical');

// REGISTER USER
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form


  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $address=  mysqli_real_escape_string($db, $_POST['address']);
  //$doctor = mysqli_real_escape_string($db, $_POST['doctor']);
  //echo"<script> alert($name); </script>";
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  //if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  //if (empty($doctor)) { array_push($errors, "Doctor is required"); }
  //if (empty($section)) { array_push($errors, "section is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM patient_database WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
     
    // if ($user['id'] === $id) {
    //   array_push($errors, "Roll number number already exists");
    // }
  }

  // Finally, register user if there are no errors in the form
   if (count($errors) == 0) {
   	$password = md5($password_1);//encrypt the password before saving in the database
     $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $name = openssl_encrypt($name, $encrypt_method, $key, 0, $iv);
    $name = base64_encode($name);
    $email = openssl_encrypt($email, $encrypt_method, $key, 0, $iv);
    $email = base64_encode($email);
    $contact = openssl_encrypt($contact, $encrypt_method, $key, 0, $iv);
    $contact = base64_encode($contact);
    $address = openssl_encrypt($address, $encrypt_method, $key, 0, $iv);
    $address = base64_encode($address);

        
        
  	$query = "INSERT INTO patient_database (name, username, email, contact, address, password) 
  			  VALUES('$name', '$username', '$email', '$contact', '$address', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index2.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM patient_database WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index2.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>