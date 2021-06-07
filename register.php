<?php
  $error='';
  require 'connection.php';
$conn = Connect();
   if($_SERVER["REQUEST_METHOD"]=="POST"){
       $fullname = $conn->real_escape_string($_POST['name']);
       $email = $conn->real_escape_string($_POST['email']);
       $contact = $conn->real_escape_string($_POST['number']);
       $address = $conn->real_escape_string($_POST['address']);
       $password = $conn->real_escape_string($_POST['pass']);
       $gender=$conn->real_escape_string($_POST['gender']);


       $sqlUser="Select * from register where email='$email'";
          $result1 = mysqli_query($conn, $sqlUser);
          if (mysqli_num_rows($result1) > 0)
          {
             $error='Username already Exist';
            
          }
          else{
              $query = "INSERT into register(name,phone,email,address,gender,password) VALUES('" . $fullname . "','" . $contact . "','" . $email . "','" . $address ."','" . $gender ."','" . $password ."')";
               $register = $conn->query($query);
                  if (!$register){
                    	die("Couldnt enter data: ".$conn->error);
                  }else{
                      header("location: index.php"); 
                  }
          }
          $conn->close();
   }
?>

<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" href="css/register.css"> 
</head>
<body>  


 <div class="register_card">
 <form method="post" action="">  
  Name: <input type="text" name="name">
  
  <br><br>
  E-mail: <input type="text" name="email">
  
  <br><br>
  Password: <input type="text" name="pass">
 
  <br><br>
  Number: <input type="text" name="number" >
 
  <br><br>
  Address: <textarea name="address" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender"  value="other">Other  
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
 </div>


</body>
</html>