  <?php include('includes/head.php');

  $user_id;
  if (!isset($_GET['id'])) {

    if (!Login::isLoggedIn()) {
      header('Location:./');
      exit;
    }
    $user_id = Login::isLoggedIn();
  } else {
    $user_id = $_GET['id'];
  }

  $user = DB::query('SELECT * FROM users WHERE id=:id', array(':id' => $user_id));
  if (!$user) {
    die('User not found');
  }
  $user = $user[0];

  if(isset($_GET['signout']))
  {
    if (isset($_COOKIE['USR']))
    {
      DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['USR'])));
      echo '<script>alert("Signed Out !")</script>';
      echo '<script>window.location="index.php"</script>';
    }
    setcookie('USR', '1', time()-3600);
    setcookie('USR_', '1', time()-3600);
  }
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <!-- Product Sans Font -->
    <link rel="stylesheet" href="layout/css/productsans.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="layout/css/master.css">
    <!-- Favicon  -->
    <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
    <!-- Link To Icons File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Hikingify | My Profile</title>
  </head>

  <body id="profile">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner small">
      <div class="overlay"></div>
      <div class="content">
        <h1>User Profile</h1>
      </div>
    </div>
    <!-- Top Banner END -->

    <div class="profile-body">
      <div class="user-details-container">
        <div class="user-image">
          <img src="userImgs/<?php echo $user['image'] ?>" alt="">
        </div>
        <div class="user-details">
          <p><i class="fas fa-phone"></i> <?php echo $user['phonenumber'] ?></p>
          <p><i class="fas fa-at"></i> <?php echo $user['email'] ?></p>
        </div>
        <div class="user-buttons">
          <?php if($user['id'] == $userid){ ?>
          <a href="edit-profile.php"><div class="xbutton secondary center mt-20x">Edit Profile</div></a>
          <a href="profile.php?signout"><div class="xbutton center mt-20x">Signout</div></a>
          <?php } ?>
        </div>
      </div>
      <div class="user-info">
        <div class="heading">
          <?php echo $user['fullname']  ?>
        </div>
        <div class="about">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus doloribus mollitia! Perferendis, debitis rerum illum nostrum praesentium reprehenderit. Quo eligendi tempora recusandae sunt qui amet delectus illo officiis ipsam.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt minus doloribus mollitia! Perferendis, debitis rerum illum nostrum praesentium reprehenderit. Quo eligendi tempora recusandae sunt qui amet delectus illo officiis ipsam.
        </div>
        <div class="heading">
          My Hikes Groups
        </div>
        <!-- Hikes Groups START -->
        <div class="hikes-preview">
          <div class="flex-container wrap j-sa">
            <?php
              $myOrders = DB::query('SELECT * FROM orders WHERE user_id=:user_id',array(':user_id'=>$userid));
              if(!$myOrders)
              {
                print '<p>Nothing To Be Shown</p>';
              }
              foreach($myOrders as $myOrder)
              {
                $myHikes = DB::query('SELECT * FROM order_items WHERE order_id=:id',array(':id'=>$myOrder['id']));
                foreach($myHikes as $myHike)
                {
                  $hikeDetails = DB::query('SELECT * FROM hikes WHERE id=:id',array(':id'=>$myHike['hike_id']))[0];
                  $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id',array(':hike_id'=>$hikeDetails['id']))[0]['image'];
                  $ratingValue = CalculateRating($hikeDetails['id']);
            ?>
            <a href="hike.php?id=<?php echo $hikeDetails['id']; ?>">
              <div class="item">
                <div class="image"> <img src="uploads/<?php echo $hikeImage; ?>"> </div>
                <div class="title"><?php echo $hikeDetails['name'] ?></div>
                <div class="rev fl-1 flex rating" data-rating="<?php echo $ratingValue; ?>">
                </div>
                <?php
                if($myHike['is_rated'] == 0) {
                  echo '<a href="review.php?id='.$myHike['id'].'&order='.$myOrder['id'].'"><div class="xbutton mt-20x">Rate Now</div></a>';
                }
              ?>
              </div>
            </a>
                  <?php
                }
              }
              ?>



            <div class="item extra"></div>
            <div class="item extra"></div>
            <div class="item extra"></div>
            <div class="item extra"></div>
            <div class="item extra"></div>
          </div>
        </div>
        <!-- Hikes Groups END -->
      </div>
    </div>
    <?php include('includes/footer.php'); ?>
  </body>

  </html