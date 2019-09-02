<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Patient request</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>View Patient Request</h2>
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
</div>
  <div>  
    <table align="center" width='100%' border='0' cellpadding='0' cellspacing='1' class="data-table">
        <tr>
         <th   class='data-table'> ID</th>
         <th   class='data-table'>Name </th>
         <th   class='data-table'>Username </th>
         <th  class='data-table'>Email</th>
          <th  class='data-table'>Gender</th>
          <th  class='data-table'>Date of appointment</th>
          <th  class='data-table'>Specialist</th>
          <th  class='data-table'>Query</th>
        </tr>
    <?php 
    
      //echo"<p style='color:red;'>qedqwdwf</p>";
      $specialist=$_GET['specialist'];
      $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
      $sql = "SELECT * FROM appointment ";
     // echo $sql;
        $retval = mysqli_query($db , $sql );
        if(! $retval )
        {
            die('Could not get data: ' . mysqli_error());
         }
         echo"<form method='post'  class='input-group' action='index1.php'>";
    
                 $c=1;       
              
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            //$specialist=$row['specialist'];
            echo"<tr>";
            echo"<td  height='50' name='id' class='data-table' value=''>{$row['id']}</td>" ;         
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['name']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['username']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['email']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['gender']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['date']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['specialist']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['query']}</td>" ;
            echo"</tr>";
            
            }
            echo"</table>";
      

      ?>
<center>
    
   <button type="button" onclick="location.href='index3.php'" class="btn" style="margin-top: 40px;" >Back</button>
      </center>
      </div> 
   

</body>
</html>
   