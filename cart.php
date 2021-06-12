<html>
    <head>
    <link rel="stylesheet" href="css/cart.css"> 
  </head>
<?php   
     
      require 'connection.php';
      $conn = Connect();
      include('login_user.php'); 
    if(!isset($_SESSION['login_user'])){
      header("location: login.php"); 
    }
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

      ?>
      <div class="container" style="padding-bottom:5rem;">
            <table id="t01" class="table-style">
                  <tr>
                      <th>Name</th>
                      <th>price</th> 
                      <th>Order Date</th>
                  </tr>

  
  
      

      <?php
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
                echo "<tr><td>" .$rowuserItems['name']."</td>
                 <td>".$rowuserItems['price']."</td>
                 <td>".$roworders['date']."</td>
                 </tr>";
            $total=$total+$rowuserItems['price'];
              }
            }
           
        }
        ?>
             <tr >
                 
                 <td colspan="3"><span style="float:right;margin-right: 2rem"><b>Total Price:&nbsp;&nbsp;</b><?php echo $total;?></span></td>
                
             </tr>
             <tr >
                 
                 <td colspan="3"><button style="float:right;margin-right: 2rem" class="proceed_btn"><a href="customcheckout.php" style="text-decoration:none;color:white">Proceed To checkout</a></button></td>
                
             </tr>
              </table>
      </div>
          <?php
          
      } else{
      ?>
      <div class="face" style="width: 100%;text-align: center;font-size: 2rem;height: 100%;color: darkolivegreen">
         <p style="font-size: 3rem;text-align: center;margin-top: 20rem;">There are no orders</p>
      </div>    
  <?php }?>
  </html>