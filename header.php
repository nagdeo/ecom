<html>
<head>
<title>Shopzee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
 <a class="navbar-brand" href="index.php">Shopzee</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li> 
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>-->
     
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['login_user'])){?>
       <li class="nav-item">
        <span class="nav-link" style="color: burlywood;" >Hello <?php echo  $_SESSION['login_user'] ?></span>
      </li>
    <?php } ?>
    <?php if(!isset($_SESSION['login_user'])){?>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <?php } ?>
      <?php if(!isset($_SESSION['login_user'])){?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orders.php">My Orders</a>
      </li>
      <?php if(isset($_SESSION['login_user'])){?>
      <li class="nav-item">
        <a class="nav-link" href="logout_user.php">Logout</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
</html>