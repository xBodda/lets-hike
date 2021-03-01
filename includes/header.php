<div id="header">
  <div class="logo">
    <a href="index.php"> <img src="layout/svg/logo.svg" alt="Hikingify Logo"> </a> 
  </div>
  <div class="navigation">
      <div> <a href="index.php">Home</a> </div>
      <div> <a href="blog.php">Blog</a> </div>
      <div> <a href="currency.php">Currency <?php echo $_SESSION['currency']; ?></a> </div>
      <div>
        <a href="cart.php">
            <i class="fas fa-shopping-basket"></i>
            <span class="cart-count">(<?php echo $total_cart; ?>)</span>
        </a>
      </div>
      <?php
        if( Login::isLoggedIn() )
        {
          print '<div class="userData"> <div> <a href="profile.php">'.$fullname.'</a> </div>';
          print ' <div class="userImg">
                    <img src="userImgs/'.$image.'" alt="userimage">
                  </div> </div>';
        }
        else
        {
          print '<div> <a href="signin.php">Log In</a> </div>';
        }
      
      ?>
      
  </div>
</div>
