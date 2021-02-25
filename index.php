<?php
  include_once('includes/head.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- Product Sans Font -->
  <link rel="stylesheet" href="layout/css/productsans.css">
  <!-- Main CSS File -->
  <link rel="stylesheet" href="layout/css/master.css">
  <!-- Link To Icons File -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Emla Carousel Library -->
  <script src="https://unpkg.com/embla-carousel@latest/embla-carousel.umd.js">
  </script>
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
      <h2>Face a wonderful mountain journey now!</h2>
      <form method="GET" class="search-box" action="search.php">
        <div class="item">
          <h1>Destination</h1>
          <select name="country">
            <?php
              $countries = DB::query('SELECT * FROM country');
              if($_SESSION['keywordSearch'])
                  {
                    $searchedCountry = DB::query('SELECT name FROM country WHERE id=:id',array(':id'=>$_SESSION['keywordSearch']))[0]['name'];
                    echo '<option value="'.$_SESSION['keywordSearch'].'" selected>'.$searchedCountry.'</option>';
                  }
              foreach($countries as $country){

                  
                ?>
                
                  <option <?php echo ($country['iso']=="EG")?:""; ?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                <?php
              }
            ?>
          </select>
        </div>
        <div class="item">
          <h1>Start Date</h1>
          <input type="date" id="ssssDate" required name="start-date">
        </div>
        <div class="item">
          <h1>End Date</h1>
          <input type="date" id="eeeeDate" required name="end-date">
        </div>
        <div class="item">
          <button type="submit" class="xbutton center">Search</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Top Banner END -->
  <!-- Hikes Slider START  -->

  <div class="heading-line">
    Top 10 Recmmendations
  </div>
  <style>
    .embla {
      overflow: hidden;
    }

    .embla__container {
      display: flex;
    }

    .embla__slide {
      position: relative;
      min-width: 100%;
      height: 300px;
    }
  </style>

  <div class="hikes-slide" id="embla">
    <div class="slider" id="hikes-slider">
      <?php 
      $allhikes = DB::query('SELECT * FROM hikes');
      foreach ($allhikes as $hike) {
        $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id',array(':hike_id'=>$hike['id']));
        if($hikeImage){
          $hikeImage = $hikeImage[0]['image'];
        }else{
          $hikeImage = "default.png";
        }
      ?>
        <div class="item">
          <div class="item slide">
            <div class="title"><?php echo $hike['name']; ?></div>
            <div class="image">
              <img src="uploads/<?php echo $hikeImage; ?>">
            </div>
          </div>
        </div>
      <?php
      } ?>
    </div>
  </div>
  <!-- Hike Slider Description -->
  <?php
    $premiumHike = DB::query('SELECT * FROM hikes')[0];
    $premiumImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id',array(':hike_id'=>$premiumHike['id']))[0]['image'];
  ?>
  <div class="hike-s-description">
    <div class="background-text" id="h-bg-text">
      <?php echo $premiumHike['name']; ?>
    </div>
    <div class="flex-container">
      <div class="left">
        <div class="selected-hike-image">
          <div class="title"><?php echo $premiumHike['name']; ?></div>
          <img src="uploads/<?php echo $premiumImage; ?>">
        </div>
      </div>
      <div class="right">
        <h1 id="h-text"><?php echo $premiumHike['name']; ?></h1>
        <p>
          <?php echo $premiumHike['overview']; ?>
        </p>
      </div>
    </div>
  </div>
  <!-- Hikes Slider END  -->

  <!-- Hikes preview START -->
  <div class="hikes-preview">
    <div class="flex-container wrap j-sa">
      <?php 
      $allhikes = DB::query('SELECT * FROM hikes');
      foreach ($allhikes as $hike) {
        $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id', array(':hike_id' => $hike['id']));
        if ($hikeImage) {
          $hikeImage = $hikeImage[0]['image'];
        } else {
          $hikeImage = "default.png";
        }
        $ratingValue = CalculateRating($hike['id']);
      ?>
        <a href="hike.php?id=<?php echo $hike['id']; ?>">
          <div class="item">
            <div class="image"> <img src="uploads/<?php echo $hikeImage; ?>"> </div>
            <div class="title"><?php echo $hike['name']; ?></div>
            <div class="rev fl-1 flex rating" data-rating="<?php echo round($ratingValue); ?>">
              </div>
          </div>
        </a>
      <?php
      } ?>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
    </div>
  </div>
  <!-- Hikes preview END -->
  <!-- Team START -->
  <div class="heading-line">
    Our Experts
  </div>
  <div class="our-experts flex-container wrap j-sa">
    <div class="item">
      <div class="image"> <img src="layout/jpg/o-1.jpg"> </div>
      <div class="name">
        Mohammad Ashraf
      </div>
      <div class="title">
        Chief Technology Officer
      </div>
    </div>
    <div class="item">
      <div class="image"> <img src="layout/jpg/o-2.jpg"> </div>
      <div class="name">
        Abdelrahman Sayed
      </div>
      <div class="title">
        chief system engineer
      </div>
    </div>
    <div class="item">
      <div class="image"> <img src="layout/jpg/o-3.jpg"> </div>
      <div class="name">
        Ahmed Ashraf
      </div>
      <div class="title">
        Chief Content Officer
      </div>
    </div>
  </div>
  <a href="contact.php">
    <div class="xbutton center mt-40x contact-us-button">
      <b>Contact Us</b>
    </div>
  </a>
  
  <!-- Team END -->
  <!-- Footer START -->
  <?php include('includes/footer.php'); ?>
  <!-- Footer END -->
  <script>
    // TODO: Move to all.js file
    var emblaNode = document.getElementById("embla");
    var embla = EmblaCarousel(emblaNode, {
      loop: true,
      align: 'start',
    });
  </script>
  <script>
    deletePastDates('ssssDate');
    deletePastDates('eeeeDate');
  </script>
</body>

</html>
