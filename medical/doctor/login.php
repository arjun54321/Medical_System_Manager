<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Doctor login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  	<h2>Doctor Login</h2>
  </div>
	 
  <form method="post" action="login.php">
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
  	
        <div class="input-group">
  		<button type="button" class="btn" onclick="window.location.href='../patient/logins.php'" >Login as Patients</button>
      <button type="button" class="btn" onclick="window.location.href='../index.html'" >home</button>
  	</div>
        
  </form>
</body>
</html>