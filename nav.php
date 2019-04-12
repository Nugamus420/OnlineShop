<?php
  include('connect.php');
?>

<html>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Shop Home <span class="sr-only">(current)</span></a></li>
        <li><a href="cart.php">Cart</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart.php" > 
          <?php 
              $items = $_SESSION['cart'];
              $cartitems = @explode(",", $items);

              if (!empty($items))
              {
                  echo sizeof($cartitems);
              }
              else
              {
                  echo 0;
              }
          ?> 
          Items in Cart </a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="registration.html"> User control </a>
        </li>
      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="orderhistory.php"> Buy history </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</html>