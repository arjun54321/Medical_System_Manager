<!DOCTYPE html>
<html>
<head>
  <title>send query</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Send Query</h2>
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

    <form method="post" name="query">
        <div class="input-group">
      <label>Name</label>
      <input type="text" name="name">
    </div>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
        <div class="input-group">
      <label>Email</label>
      <input type="text" name="email" >
    </div>
    <div class="input-group" >
          <select name="gender" style="margin-top: 20px; width: 265px; height: 50px; font-size: 100%;">
              <option disabled selected>Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>

        <div class="input-group">
      <label>Date of Appointment</label>
      <input type="text" name="specialist" >
    </div>

    <center>
    <div class="input-group" >
          <select name="doctor" style=" margin-top: 20px; width: 265px; height: 50px; font-size: 100%;">
              <option disabled selected>Select Specialist</option>
              <option value="family">Family medicine physician</option>
              <option value="psychiatrist">Psychiatrist</option>
              <option value="dentist">dentist</option>
              <option value="neurologist">Neurologist</option>
              <option value="surgeon">Surgeon</option>
              <option value="cardiologist">Cardiologist</option>
          </select>
        </div></center>
          <textarea name="presp" placeholder="Share your problem..." style="width: 300px ; height: 200px ; margin-top: 20px ;font-size: 100%;"></textarea>
             <input type="submit" style="margin-top: 20px" name="submit" value="submit" class="btn">

    </form>   
    <?php
      // include('connection.php');
      $db = mysqli_connect('localhost', 'root', '', 'medical');
              error_reporting(0);
    if(isset($_POST['submit']))
      {
        $nm=$_POST['name'];
        $un=$_POST['username'];
        $em=$_POST['email'];
        $gn=$_POST['gender'];
        $sp=$_POST['specialist'];
        $doc=$_POST['doctor'];
        $pre=$_POST['presp'];
        if($nm!=""&&$un!=""&&$em!=""&&$gn!=""&&$sp!=""&&$doc!=""&&$pre!="")
        {
        $sql="INSERT INTO APPOINTMENT (`name`,`username`, `email`,`gender`,`date`, `specialist`,`query`) VALUES('$nm','$un','$em','$gn','$sp','$doc','$pre');"; 
        $data = mysqli_query($db, $sql );
        }
      }
    ?>
   <button type="button" onclick="location.href='index2.php'" class="btn" style="margin-top: 20px;" >Back</button></a>
       
</div>
</body>
</html>
   