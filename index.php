<?php
  session_start(); 
  require 'connection.php';
  $conn = Connect();
?>


<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Shopzee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/header.css"> 
   <link rel="stylesheet" href="css/index.css"> 
   
  </head>
 <body>
     <?php include 'header.php';?>
    <?php
       $sql = "SELECT * FROM items";
       $result = mysqli_query($conn, $sql);
    $c=0;
    if (mysqli_num_rows($result) > 0)
    {
      $count=0;
    $c++;
      while($row = mysqli_fetch_assoc($result)){
        if ($count == 0)
         echo "<div class='row rowMargin' style='margin-top:2rem;margin-bottom: 5rem;'>";
         $i_id=$row["i_id"];
    ?>
  <div class="col-md-3">

    <form method="post" action="order.php?id=<?php echo $row['i_id'];?>">
        <div class="mypanel card" style="text-transform: capitalize;border-radius: 5px" align="center">
          <img src="<?php echo $row["img"]; ?>" style="height:250px;width:100%" class="img-responsive">
          <div class="card-text-orders">
            <h4 class="text-dark textellipsis"><?php echo $row["name"]; ?></h4>
            <h5 class="text-danger textellipsis">&#8377; <?php echo $row["price"]; ?></h5>
            <!-- <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5> -->
          </div>
          <button type="submit" name="add" style="margin-top:5px;"
            
            class="btn btn-success" value="Order">Add To Cart</button>
   
        </div>
    </form>
  </div>
      
      <?php
         $count++;
           if($count==4)
           {
             echo "</div>";
             $count=0; 
            }else if($c==mysqli_num_rows($result)){
              echo "</div>";

            }
       }
     }
   ?>
   </div>
<div>
<?php include 'footer.php';?>
    </div>
 </body>
 
</html>
