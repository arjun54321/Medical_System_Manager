<!DOCTYPE html>
<html>
<head>
  <title>encrypted data</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
            $encrypt_method = "AES-256-CBC";
            $secret_key = 'This is my secret key';
            $secret_iv = 'This is my secret iv';
            // hash
            $key = hash('sha256', $secret_key);
            $id=$row['id'];
            $name=$row['name'];
            $username=$row['username'];
            $email=$row['email'];
            $contact=$row['contact'];
            $address=$row['address'];
            
             $iv = substr(hash('sha256', $secret_iv), 0, 16);
             $name = openssl_decrypt(base64_decode($name), $encrypt_method, $key, 0, $iv);
             $email = openssl_decrypt(base64_decode($email), $encrypt_method, $key, 0, $iv);
             $contact = openssl_decrypt(base64_decode($contact), $encrypt_method, $key, 0, $iv);
             $address = openssl_decrypt(base64_decode($address), $encrypt_method, $key, 0, $iv);
            echo"<tr>";
            echo"<td  height='50' name='id' class='data-table' value=''>{$id}</td>" ;         
            echo "<td  height='50' name='name' class='data-table' value=''>{$name}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$username}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$email}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$contact}</td>" ;
            echo "<td  height='50' name='name' class='data-table' value=''>{$address}</td>" ;
            
            echo"</tr>";
            
            }
            echo"</table>";
      ?>

    <br>
    <br>
<script type="text/javascript">
  alert("This is very sensitive data. Close the page after use!!")
</script>
  <center>
<a href="index3.php"  style="background: #4067AB; color: white; border-style: none;border-radius: 20% ; padding: 7px; text-decoration:none; margin-left: 1px">Back</a>
    </center>
          
   
</div>
</body>
</html>
   