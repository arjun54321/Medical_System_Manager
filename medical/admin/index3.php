<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: logina.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
 	<link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
<div class="header">
	<h2>Admin Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
          
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : 
        $username=$_SESSION['username'];?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        
    	
    <?php endif ?>
        <?php
        $db = mysqli_connect('localhost', 'root', '');

        ?>
        	<center>
             <a href="register.php"><button class="btn2" style="margin-top: 20px;" >Add Doctor</button></a>
            <br> <a href="viewdoctor.php"><button class="btn2" style="margin-top: 20px;" >View Doctor</button></a>
            <br> <a href="viewpatient.php"><button class="btn2" style="margin-top: 20px;" >View Patient</button></a>
      		  <br><a href="patientrequest.php"><button class="btn2" style="margin-top: 20px;" >View Patient Request</button></a>

      		</center>

      <p style='margin-top: 20px '> <a href="/medical/admin/index3.php?logout='1'" style="color: red;">logout</a> </p>
	</div>
</body>
</html>