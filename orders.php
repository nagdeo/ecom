<html>
    <head>
    <link rel="stylesheet" href="css/cart.css"> 
  </head>
    <body>
   
    <?php   
     include('login_user.php'); 
     require 'connection.php';
   
     $conn = Connect();
     if(!isset($_SESSION['login_user'])){
        header("location: login.php"); 
      }
     $username=$_SESSION['login_user'];
     include 'header.php';
     $sqluser = "SELECT * FROM register WHERE email = '$username' ";
     $resultUser = mysqli_query($conn, $sqluser);
     $c_id=0;

      if (mysqli_num_rows($resultUser) > 0)
      {
 
        while($rowuser = mysqli_fetch_assoc($resultUser)){
    
         
         $c_id =  $rowuser["r_id"];
        }
      }
     
      $sqlOrders = "SELECT * FROM orders WHERE r_id = '$c_id' ";
      $resultOrders = mysqli_query($conn, $sqlOrders);
 
      if (mysqli_num_rows($resultOrders) > 0)
      {
      ?>
      <div class="container" style="padding-bottom:5rem;">
           <table id="t01" class="table-style">
             <tr>
                 <th>Items</th>
                 <th>price</th> 
                 <th>Date</th>
             </tr>
  
  
      

      <?php
        $total=0;
        while($roworders = mysqli_fetch_assoc($resultOrders)){
           echo "<tr><td style='text-transform:capitalize;'>" .$roworders['item']."</td>
                 <td>".$roworders['price']."</td>
                 <td>".$roworders['date']."</td>
                 </tr>";
            $total=$total+$roworders['price'];
        }
        ?>
             <tr >
                 
                 <td colspan="3"><span style="float:right;margin-right: 2rem"><b>Total Price:&nbsp;&nbsp;</b><?php echo $total;?></span></td>
             </tr>
              </table>
      </div>
          <?php
          
      } else{
      ?>
      <div class="face" style="width: 100%;text-align: center;font-size: 2rem;height: 100%;color: darkolivegreen">
         <p style="font-size: 3rem;text-align: center;margin-top: 15rem;margin-bottom:0px">You haven't order any items yet</p>
         <p style="font-size: 1.5rem;text-align: center;"><a href="index.php">Order Now</a></p>
      </div>    
  <?php }?>
      
    </body>
    </html>