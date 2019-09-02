<?php include('servers.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Patient Signup!</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
  <div class="header">
  	<h2>Patient Register</h2>
  </div>
	
  <form method="post" action="registers.php">
  	<?php include('errors.php'); ?>
        <div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
    <div class="input-group">
      <label>Contact number</label>
      <input type="text" name="contact" value="<?php echo $contact; ?>">
    </div>
        <div class="input-group">
  	  <label>address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>
  	<div class="input-group"> 
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <input type="submit" class="btn" name="reg_user"></input>
  	</div>
  	<p>
  		Already a member? <a href="logins.php">Sign in</a>
  	</p>
  </form>
</body>
</html>