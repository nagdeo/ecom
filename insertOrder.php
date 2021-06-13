<?php
    include('login_user.php'); 
    require 'connection.php';
    $conn = Connect();
    if(!isset($_SESSION['login_user'])){
        header("location: login.php"); 
      }
       include 'header.php';
    $order_id=0;
     $username=$_SESSION['login_user'];
     $sqluser = "SELECT * FROM register WHERE email = '$username' ";
     $resultUser = mysqli_query($conn, $sqluser);
     $c_id=0;

      if (mysqli_num_rows($resultUser) > 0)
      {
 
        while($rowuser = mysqli_fetch_assoc($resultUser)){
    
         
         $c_id =  $rowuser["r_id"];
        }
      }
     
      $sqlOrders = "SELECT * FROM cart WHERE r_id = '$c_id' ";
      $resultOrders = mysqli_query($conn, $sqlOrders);
 
      if (mysqli_num_rows($resultOrders) > 0)
      {
        $total=0;

        while($roworders = mysqli_fetch_assoc($resultOrders)){?>
           
                  <?php 
            $i_id =  $roworders["i_id"];
           // echo $i_id;
            $getItems = "SELECT * FROM items WHERE i_id = '$i_id' ";
            $resultOrdersItems = mysqli_query($conn, $getItems);
            if (mysqli_num_rows($resultOrdersItems) > 0)
            {
               
            while($rowuserItems = mysqli_fetch_assoc($resultOrdersItems)){
                
                $order_date = date('Y-m-d');


              $query = "INSERT INTO orders (item, price, date,  i_id, r_id) 
              VALUES ('" . $rowuserItems['name'] . "','" . $rowuserItems['price'] . "','" . $order_date . "','" . $i_id . "','" . $c_id . "')";
             

              $success = $conn->query($query);   
              if(!$success)
              {
                ?>
                <div style="text-align: center;">
                  <div class="]">
                    <h1>Something went wrong!</h1>
                    <p>Try again <a href="index.php">Order Now</a>.</p>
                  </div>
                </div>
        
                <?php
              }else{
                  $sqlOrderId = "SELECT * FROM orders Order by o_id DESC LIMIT 1";
                  $resultOrderId = mysqli_query($conn, $sqlOrderId);
                   if (mysqli_num_rows($resultOrderId) > 0)
                   {
                      while($rowOrderId = mysqli_fetch_assoc($resultOrderId)){
                             $order_id= $rowOrderId['o_id'];
                      } 
                   }
                   
                  ?>
             
              <?php
                  
              }
        
             }
            }
       
         }
        }
        if($order_id>0){
            echo $c_id;
            $query = "Delete from cart where r_id=".$c_id ;
            $success = $conn->query($query);   
            if(!$success)
            {
                echo "success";
            }
            ?>
             
            <div style="margin: auto;width:50%;text-align: center;margin-top:2rem ">
            <h3>Order Successfully Placed!!! &#128522;</h3>
            <h2>Your Order Id is <?php echo $order_id?></h2>
            <h5>Please keep cash available with you.... </h5>
            <h5>You will receive your order within 2 Business Days! &#128522;</h5>
            <h4>Do you want to order something else...<a href="index.php">Order Now</a>.</h4>
        </div>
       <?php }
        else{?>
        <div style="text-align:center;margin-top:5rem;font-size:2rem;color:red">No Items in Cart</fiv>
      <?php }
      ?>
