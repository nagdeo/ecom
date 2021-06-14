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
<script>
 
    function manage(txt){
      var email=document.getElementById("email_reg")
    var pass=document.getElementById("pass_reg")
    var name=document.getElementById("name_reg")
    var address=document.getElementById("add_reg")
   // var gender=document.getElementById("gender_reg")
    var mobile=document.getElementById("mobile_reg")
    if(email.value!=""  && pass.value!=""  && name.value!=""  && address.value!=""   && mobile.value!=""
      && (document.getElementById("male").checked || document.getElementById("female").checked
          || document.getElementById("other").checked )){
        document.getElementById("submit_login").disabled=false;
         
        document.getElementById("submit_login").setAttribute('class','submit_btn');
    }
    else{
        document.getElementById("submit_login").disabled=true;
       
        document.getElementById("submit_login").setAttribute('class','disable');
    }
  
       
 }
  function  manageRadio(txt){
    var email=document.getElementById("email_reg")
    var pass=document.getElementById("pass_reg")
    var name=document.getElementById("name_reg")
    var address=document.getElementById("add_reg")
    var mobile=document.getElementById("mobile_reg")
    if (!document.getElementById("male").checked && !document.getElementById("female").checked
          && !document.getElementById("other").checked) {
          document.getElementById("submit_login").disabled=true;
       
          document.getElementById("submit_login").setAttribute('class','disable');
        }else if(email.value!=""  && pass.value!=""  && name.value!=""  && address.value!=""   && mobile.value!=""){
          document.getElementById("submit_login").disabled=false;
         
         document.getElementById("submit_login").setAttribute('class','submit_btn');
        }
  }
</script>
</head>
<body>  
<?php include 'header.php';?>

 <div class="register_card" style="margin-bottom: 5rem;">
 <div style="color:red;font-size:1.3rem;text-align:center"><?php  echo $error?></div>
 <form method="post" action="">  
 <input  id="name_reg" type="text" onkeyup="manage(this)" class="w-100" name="name" placeholder="Name">
  
  <br><br>
  <input id="email_reg" type="email" onkeyup="manage(this)" class="w-100" name="email" placeholder="Email">
  
  <br><br>
   <input  id="pass_reg" type="password" onkeyup="manage(this)" name="pass" class="w-100" placeholder="Password">
 
  <br><br>
  <input onKeyPress="if(this.value.length==10) return false;"  id="mobile_reg" type="number" onkeyup="manage(this)" name="number" class="w-100" placeholder="Mobile No">
 
  <br><br>
   <textarea  id="add_reg" name="address" onkeyup="manage(this)" class="w-100" rows="5" cols="40" placeholder="Address"></textarea>
  <br><br>
  <div class="w-100">
  Gender:
  <input type="radio" id="female" onclick="manageRadio(this)" name="gender" value="female" style="margin-right:10px">Female
  <span style="margin-right:10px"></span>
  <input type="radio" id="male" onclick="manageRadio(this)" name="gender" value="male" style="margin-right:10px">Male
  <span style="margin-right:10px"></span>
  <input type="radio" id="other" onclick="manageRadio(this)" name="gender"  value="other" style="margin-right:10px">Other  
  </div>
  <br><br>
  <input type="submit" class="disable" id="submit_login" name="submit" value="Submit">  
</form>


 </div>
 
  

 <?php include 'footer.php';?>
</body>
</html>