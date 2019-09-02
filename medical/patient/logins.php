<?php include('servers.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Patient login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><div class="header">
  	<h2>Patient Login</h2>
  </div>
	 
  <form method="post" action="logins.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="registers.php">Sign up</a>
  	</p>
        <div class="input-group">
  		<button type="button" class="btn" onclick="window.location.href='../doctor/login.php'" >Login as doctor</button>
  	</div>
        
  </form>
</body>
</html>