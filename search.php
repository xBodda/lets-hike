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
  <title>Hikingify | Review Hike</title>
</head>

<body id="review">
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->

  <!-- Top Banner START -->
  <div class="top-banner">
    <div class="overlay"></div>
    <div class="content">
      <h1>Search</h1>
    </div>
  </div>
  <!-- Top Banner END -->

  <!-- Search Body START -->
  <div class="search-body">
    <?php
    // TODO: Search Filters
    ?>
    <div class="heading-line">
      Results for "Search Input"
      <h6 style="color:#777;font-weight:normal;">3,412 results available</h6>
    </div>
    <div class="flex-container j-center wrap">
      <?php for ($i = 0; $i < 10; $i++) {
      ?>
        <div class="item">
          <div class="image">
            <img src="layout/png/<?php echo rand(1, 4); ?>.png">
          </div>
          <div class="content">
            <h1>MT Charleston Peak, USA</h1>
            <div class="rating">
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
            </div>
            <div class="price">
              Starting at: $50
            </div>
          </div>
        </div>
      <?php
      } ?>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
    </div>
  </div>
  <!-- Search Body END -->

  <!-- Footer START -->
  <?php include('includes/footer.php'); ?>
  <!-- Footer END -->
</body>

</html>