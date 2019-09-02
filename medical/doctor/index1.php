<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../index.html");
  }
  
  //ALTER TABLE yourtable ADD q6 VARCHAR( 255 ) after q5
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>    
<div class="header">
	<h2>Doctor's home</h2>
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
        $username=$_SESSION['username']; ?>
    	<p>Welcome <strong><?php echo "$username"; ?></strong></p>
    
        <p style='margin-top: 20px ' align="right"> <a href="/medical/doctor/index1.php?logout='1'" style="color: red;">logout</a> </p>

    <?php endif ?>
    <?php
        
        $date = date('d/m/Y');
        $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
        $sql = "SELECT specialist FROM doctor_database WHERE (username = '$username')";
        $retval = mysqli_query($db , $sql );
        if(! $retval )
        {
            die('Could not get data: ' . mysqli_error());
         }
         
                        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            $specialist=$row['specialist'];
        echo "specialist : {$row['specialist']}  <br> " ;
        // //SELECT id FROM cc ORDER BY id DESC LIMIT 1
        // $sql1 = "SELECT id FROM student_database ORDER BY id DESC LIMIT 1";
        // $retval1 = mysqli_query($db , $sql1 );
        // $getid = mysqli_fetch_assoc($retval1);
        // //$getid=$result['id'];
   }
    ?>
      <br/>
      <center>
    <a href="viewpatient1.php?specialist=<?php echo $specialist;?>"><button  style='margin-top: 30px ' class='btn2' name='patient'">View patients</button></a>
  </center>
<form method='post'  class='input-group' action='index1.php'>      
</div>		
</body>
</html>