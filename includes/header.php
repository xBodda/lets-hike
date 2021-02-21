<div id="header">
  <div class="logo">
    <a href="index.php"> <img src="layout/svg/logo.svg" alt="Hikingify Logo"> </a> 
  </div>
  <div class="navigation">
      <div> <a href="index.php">Home</a> </div>
      <div> <a href="#">Destination</a> </div>
      <div> <a href="#">Blog</a> </div>
      <div> <a href="#">Currency EGP £</a> </div>
      <div id="lang"> Lang </div>
      <?php
        if( Login::isLoggedIn() )
        {
          print '<div class="userData"> <div> <a href="profile.php">'.$fullname.'</a> </div>';
          print ' <div class="userImg">
                    <img src="'.$image.'" alt="userimage">
                  </div> </div>';
        }
        else
        {
          print '<div> <a href="signin.php">Log In</a> </div>';
        }
      
      ?>
      
  </div>
</div>
