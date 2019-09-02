<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: logins.php');
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
	<h2>Home Page</h2>
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
        $username=$_SESSION['username'];

        ?>

    	<p>Welcome <strong><?php echo $username; ?></strong></p>
        
    	
    <?php endif ?>
        <?php
        $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
        $sql = "SELECT name FROM patient_database WHERE (username = '$username')";
        $retval = mysqli_query($db , $sql );
        if(! $retval )
        {
            die('Could not get data: ' . mysqli_error());
         }
         
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            $name=$row['name'];
   }
        ?>
     
      <center>
      <a href="sendquery.php"><button class="btn2" style="margin-top: 20px; width: 220px; text-align: center;" >Send Query</button></a>
      <br> <a href="viewdoctorreply.php?username=<?php echo $username; ?>"><button class="btn2" style="margin-top: 20px;" >View Doctor's Reply</button></a>
      <br> <a href="pdf/generate.php?username=<?php echo $username; ?>"><button class="btn2" style="margin-top: 20px; width: 220px; text-align: center;" >View Report</button></a>
    </center>
     <p style='margin-top: 20px; '> <a href="/medical/patient/index2.php?logout='1'" style="color: red;">logout</a> </p>
	
</body>
</html>