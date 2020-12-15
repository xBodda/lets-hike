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
    <title>Hikingify | Home</title>
  </head>
  <body>
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner">
      <div class="overlay"></div>
      <div class="content">
        <h1>Don't Limit Your Adventure</h1>
        <h2>Face a wonderful  mountain journey now!</h2>
        <div class="search-box">
          <div class="item">
            <h1>Destination</h1>
            <p>Egypt</p>
          </div>
          <div class="item">
            <h1>Start Date</h1>
            <p>11/12/2020</p>
          </div>
          <div class="item">
            <h1>End Date</h1>
            <p>31/12/2020</p>
          </div>
          <div class="item">
            <div class="xbutton center">Search</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Banner END -->
    <!-- Hikes Slider START  -->

    <div class="heading-line">
      Top 10 Recmmendations
    </div>
    <div class="hikes-slide">
      <div class="slider" id="hikes-slider">
        <?php for($i = 0; $i<10;$i++){
          ?>
          <div class="item">
            <div class="title">MT Charleston Peak, USA</div>
            <div class="image">
              <img src="layout/png/<?php echo $i%4 +1; ?>.png">
            </div>
          </div>
          <?php
        } ?>
      </div>
      <!-- Hike Slider Function TO DO HERE -->
    </div>
    <!-- Hike Slider Description -->
    <div class="hike-s-description">
      <div class="background-text" id="h-bg-text">
        MT Charleston Peak, USA
      </div>
      <div class="flex-container">
        <div class="left">
          <div class="selected-hike-image">
            <div class="title">MT Charleston Peak, USA</div>
            <img src="layout/png/1.png">
          </div>
        </div>
        <div class="right">
          <h1 id="h-text">MT Charleston Peak, USA</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </div>
    </div>
    <!-- Hikes Slider END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
