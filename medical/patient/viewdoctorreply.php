<!DOCTYPE html>
<html>
<head>
  <title>Doctor reply</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <div class="header">
    <h2>View Doctor Reply</h2>
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
    <?php endif ;
    $username=$_GET['username'];
        $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
        $sql = "SELECT * FROM appointment WHERE (username = '$username')";
        $retval = mysqli_query($db , $sql );
        if(! $retval )
        {
            die('Could not get data: ' . mysqli_error());
         }
         error_reporting(0);
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            $pre=$row['prescription'];
        }
        echo $pre;

    ?>
    <br>
     <a href="index2.php"><button class="btn" style="margin-top: 20px;" >Back</button></a>

</div>
</body>
</html>