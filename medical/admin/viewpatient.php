<!DOCTYPE html>
<html>
<head>
  <title>Admin login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script>

function passWord() {
    var testV = 1;
    var pass1 = prompt('Please Enter Your Password',' ');
    while (testV < 3) {
    if (!pass1) 
    history.go(-1);
    if (pass1.toLowerCase() == "letmein") {
    window.open('encryptdata.php');
    break;
    } 
    testV+=1;
    var pass1 = 
    prompt('Access Denied - Password Incorrect, Please Try Again.','Password');
    }
    if (pass1.toLowerCase()!="password" & testV ==3) 
    history.go(-1);
    return " ";
    } 

</script>
 
  <div class="header">
    <h2>View Patient</h2>
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
    <table width='100%' border='0' cellpadding='0' cellspacing='1' class="data-table">
        <tr>
         <th   class='data-table'> ID</th>
         <th   class='data-table'>Name </th>
         <th   class='data-table'>Username </th>
         <th  class='data-table'>Email</th>
          <th  class='data-table'>Contact</th>
          <th  class='data-table'>Address</th>
           
        </tr>
    <?php 
    
      $db = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($db,'medical'); 
      $sql = "SELECT * FROM patient_database ";
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
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['contact']}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$row['address']}</td>" ;
            
            echo"</tr>";
            
            }
            echo"</table>";
      ?>

    <br>
    <br>

  <center>
<a href="index3.php"  style="background: #4067AB; color: white; border-style: none;border-radius: 20% ; padding: 7px; text-decoration:none; margin-left: 1px">Back</a>
<button type="button" onclick="passWord()" class="btn">DECRYPT </button>
    </center>
          
   
</div>
</body>
</html>
   