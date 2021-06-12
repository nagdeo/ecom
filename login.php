<?php
include('login_user.php'); 

if(isset($_SESSION['login_user'])){
header("location: index.php"); 
}
?>

<!DOCTYPE HTML>  
<html>
<head>

<link rel="stylesheet" href="css/register.css"> 
<script>
    function manage(txt){
    var email=document.getElementById("email_login")
    var pass=document.getElementById("pass_login")
    if(email.value!=""  && pass.value!="" ){
        document.getElementById("submit_login").disabled=false;
         
        document.getElementById("submit_login").setAttribute('class','submit_btn');
    }
    else{
        document.getElementById("submit_login").disabled=true;
       
        document.getElementById("submit_login").setAttribute('class','disable');
    }
 }
</script>
</head>
<body>  


 <div class="register_card">
 <form method="post" action="" >  
  
   <div class="w-100">
   <input type="text" onkeyup="manage(this)"  class=" w-100 inputs" name="email" id="email_login" placeholder="Email Id">
  
  <br><br>
   <input type="text" onkeyup="manage(this)"  class="w-100 inputs" name="pass" id="pass_login" placeholder="Password">
  <br><br>
    <input type="submit"  class="disable" name="submit"
     disabled id="submit_login"
    value="Submit"> 
   </div>
</form>
 </div>


</body>
</html>