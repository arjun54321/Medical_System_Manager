<!DOCTYPE html>
<html>
<head>
  <title>Admin login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>View Doctor</h2>
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
    <table width='100%' border='0' cellpadding='0' class="data-table" cellspacing='1' >
        <tr>
         <th   class='data-table'> ID</th>
         <th   class='data-table'>Name </th>
         <th   class='data-table'>Username </th>
         <th  class='data-table'>Email</th>
          <th  class='data-table'>Specialist</th>
           
        </tr>
    <?php 
     $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
      $sql = "SELECT * FROM doctor_database ";
        $retval = mysqli_query($db , $sql );
        if(! $retval )
        {
            die('Could not get data: ' . mysqli_error());
         }
         echo"<form method='post'  class='input-group' action='index1.php'>";
    
                 $c=1;       
              
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            echo"<tr>";
            echo"<td  height='50' name='id' class='data-table' value=''>{$row['id']}</td>" ;         
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['name']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['username']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['email']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['specialist']}</td>" ;
            
            echo"</tr>";
            
            }
            echo"</table>";
      ?>
      <br>
      <br>
      <center>
      <a href="index3.php"  style="background: #4067AB; color: white; border-style: none;border-radius: 20% ; padding: 7px; text-decoration:none; margin-left: 1px">Back</a>
    </center>   
</div>
</body>
</html>
   