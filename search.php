<?php
  include('includes/head.php');
?>
<?php
      $msg = false;
      $price_min = 0;
      $price_max = 99999;
      $bathrooms = 0;
      $bedrooms = 0;
      $beds = 0;
      $livingrooms = 0;
      if(isset($_GET['country']) && isset($_GET['start-date']) && isset($_GET['end-date']) ){
        $location = $_GET['country'];
        $date_in = $_GET['start-date'];
        $date_out = $_GET['end-date'];
        if(isset($_GET['price-min']) && isset($_GET['price-max'])){
            $price_min = $_GET['price-min'];
            $price_max = $_GET['price-max'];
        }
        if(isset($_GET['bathrooms'])){
          if(!empty($_GET['bathrooms']))
          $bathrooms = $_GET['bathrooms'];
        }
        if(isset($_GET['bedrooms'])){
          if(!empty($_GET['bedrooms']))
          $bedrooms = $_GET['bedrooms'];
        }
        if(isset($_GET['beds'])){
          if(!empty($_GET['beds']))
          $beds = $_GET['beds'];
        }
        if(isset($_GET['livingrooms'])){
          if(!empty($_GET['livingrooms']))
          $livingrooms = $_GET['livingrooms'];
        }
      }else{
        $msg = "An error has occured, Please try again";
        $_GET['err_msg']=$msg;
        include("index.php");
        exit;
      }
      $date_in = date("Y-m-d", strtotime($date_in));
      $date_out = date("Y-m-d", strtotime($date_out));

      $hikes = DB::query('SELECT h.*, i.image FROM hikes h,hike_images i WHERE h.location=:location
        AND (SELECT COUNT(id) FROM order_items WHERE start_date <= :leave_time AND end_date >=
        :arrival_time AND hike_id=h.id)=0 AND i.hike_id=h.id',array(":location"=>$location, ":arrival_time"=>$date_in, ":leave_time"=>$date_out));
        
      // For Testing
      // $hikes = DB::query('SELECT h.*, i.image FROM hikes h,hike_images i WHERE  i.hike_id=h.id');
     
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
  <title>Hikingify | Search</title>
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
    <!-- // TODO: Search Filters -->
    <div class="heading-line">
      Results for "Search Input"
      <h6 style="color:#777;font-weight:normal;"><?php echo COUNT($hikes);?> results available</h6>
    </div>
    <div class="flex-container j-center wrap">
      <?php foreach ($hikes as $hike) {
      ?>
        <a href="#"><div class="item">
          <div class="image">
            <img src="uploads/<?php echo $hike['image']; ?>">
          </div>
          <div class="content">
            <h1><?php echo $hike['name']; ?></h1>
            <div class="rating">
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
            </div>
            <div class="price">
              Starting at: <?php echo $hike['price'];?> EGP
            </div>
          </div>
        </div></a>
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