<!DOCTYPE html>
<html>
<head>
  <title>Patient query</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>View Patient Query</h2>
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
            $name=$row['name'];
            $email=$row['email'];
            $gender=$row['gender'];
            $date=$row['date'];
            $query=$row['query'];
            $pre=$row['prescription'];
        }
        ?>
    </div>
        <div>
        <form method="post" name="query">
        <table width='100%' border='0' cellpadding='0' cellspacing='1' class="data-table" align="center">
            <tr>
            <th scope="row">Name : </th>
            <td><?php echo $name; ?></td>
            </tr>
            <tr>
            <th scope="row">Username : </th>
            <td><?php echo $username; ?></td>
            </tr>
            <tr>
            <th>Email : </th>
            <td><?php echo $email; ?></td>
            </tr>
            <tr>
            <th>Gender : </th>
            <td><?php echo $gender; ?></td>
            </tr>
            <tr>
            <th>Date of appointment : </th>
            <td><?php echo $date; ?></td>
            </tr>
            <tr>
            <th>Query : </th>
            <td><?php echo $query; ?></td>
            </tr>
            <tr>
            <th>Prescription : </th>
            <td><textarea name="presp" style="width: 300px ; height: 200px ; margin-top: 20px ;font-size: 100%;"><?php echo $pre ;?></textarea></td>
            </tr>
        </table>
        <br>
         <input type="submit" name="submit" value="submit" class="btn">
         
         <?php
         if(isset($_POST['submit']))
            {
                $pre=$_POST['presp'];
                $db = mysqli_connect('localhost', 'root', '');
                mysqli_select_db($db,'medical');
                
                    $sql="UPDATE `appointment` SET `prescription` = '$pre' WHERE `appointment`.`username` = '$username';";
                    $data = mysqli_query($db, $sql );
                
            }
            ?>
                <a href="index1.php"  style="background: #4067AB; color: white; border-style: none;border-radius: 20% ; padding: 7px; text-decoration:none">Back</a>
             </form>
             
</div>
</body>
</html>