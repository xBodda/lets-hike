  <?php include('includes/head.php'); 
  
  $user_id;
  if(!isset($_GET['id'])){

    if (!Login::isLoggedIn()) {
      header('Location:./');
      exit;
    }
    $user_id = Login::isLoggedIn();
  }else{
    $user_id = $_GET['id'];
    
  }
  
  $user = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$user_id));
  if(!$user){
    die('User not found');
  }
  $user=$user[0];
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
    <title>Hikingify | Book Hike</title>
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
          <p><i class="fas fa-hiking"></i> Hiker since 2012</p>
          <p><i class="fas fa-phone"></i> +2010123456789</p>
          <p><i class="fas fa-at"></i> Username@gmail.com</p>
          <p><i class="fas fa-birthday-cake"></i> 12 January, 1989</p>
        </div>
        <div class="user-buttons">
          <a href="edit-profile.php"> <div class="xbutton center ">Edit Profile</div> </a>
        </div>
      </div>
      <div class="user-info">
        <div class="heading">
          <?php  echo $user['fullname']  ?>
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
            <a href="hike.php?id=1">
              <div class="item">
                <div class="image"> <img src="uploads/1.png"> </div>
                <div class="title">Salkantay Traditional</div>
                <div class="rev fl-1 flex rating" data-rating="4">
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star nostar"></div>
                </div>
              </div>
            </a>
            <a href="hike.php?id=2">
              <div class="item">
                <div class="image"> <img src="uploads/2.png"> </div>
                <div class="title">Everest Base Camp Trek</div>
                <div class="rev fl-1 flex rating" data-rating="4">
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star nostar"></div>
                </div>
              </div>
            </a>
            <a href="hike.php?id=8">
              <div class="item">
                <div class="image"> <img src="uploads/1537844230The-Ultimate-Salkantay-Trek-Trekexperience-1.png"> </div>
                <div class="title">Ultimate Salkantay Trek</div>
                <div class="rev fl-1 flex rating" data-rating="0">
                  <div class="star nostar"></div>
                  <div class="star nostar"></div>
                  <div class="star nostar"></div>
                  <div class="star nostar"></div>
                  <div class="star nostar"></div>
                </div>
              </div>
            </a>
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
  </body>

  </html