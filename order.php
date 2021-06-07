<?php
     require 'connection.php';
     $conn = Connect();
   include('login_user.php'); 
    if(!isset($_SESSION['login_user'])){
      header("location: login.php"); 
    }
    $email=$_SESSION['login_user'];
    if(isset($_SESSION['login_user'])){
        $sql = "SELECT email,r_id FROM register WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        
        
            $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
            //   $get= $_GET['id'];
              $Iid = $_GET['id'];
            // var_dump($_GET['id']);
             $Iid= $Iid +0;
             //var_dump($Iid);
              $query = "INSERT into cart(r_id,i_id) VALUES('" .$row['r_id'] ."','" . $Iid ."')";
              $register = $conn->query($query);
                 if (!$register){
                       die("Couldnt enter data: ".$conn->error);
                 }else{
                     header("location: index.php"); 
                 }
            }
           // header("location: register.php"); 
        
    }
?>
<html>
    <body>
        <p>hello</p>
       
    </body>
</html>