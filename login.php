<?php
include('login_user.php'); 

if(isset($_SESSION['login_user'])){
header("location: index.php"); 
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
  
  E-mail: <input type="text" name="email">
  
  <br><br>
  Password: <input type="text" name="pass">
 
  <input type="submit" name="submit" value="Submit">  
</form>
 </div>


</body>
</html>