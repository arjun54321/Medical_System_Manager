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
$doctor = "";
//$section   = "";
$errors = array(); 
 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'medical');

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
  	$query = "SELECT * FROM admin_database WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index3.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>