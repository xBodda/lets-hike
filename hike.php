<?php
  include('includes/head.php');
  session_start();
  if( isset($_GET['id']) )
  {
    $hikeid = $_GET['id'];
    $hike_info = DB::query('SELECT h.*,c.name as country FROM hikes h, country c WHERE h.location=c.id AND h.id=:id',array(':id'=>$hikeid))[0];
    $ratingValue = CalculateRating($hikeid);
    $total_ratings = DB::query('SELECT COUNT(id) AS cnt FROM reviews WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid))[0]['cnt'];
    $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid))[0]['image'];
  }
  else
  {
    die("Not Found");
  }

  if( isset($_POST['add']) )
  {

    if (!Login::isLoggedIn())
    {
        echo '<script>alert("You have to login to book")</script>';
        echo '<script>window.location="signin.php"</script>';
    }
    else
    {

        $date = date('Y-m-d H:i:s');
        $total_price = $_POST['total_price'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $persons = $_POST['persons'];

        if(isset($_SESSION["cart"]))
        {
            $hikeID = array_column($_SESSION["cart"], "hike_id");
            if(!in_array($_GET["id"], $hikeID))
            {
                $counter = count($_SESSION["cart"]);
                $hike_array = array(
                  'hike_id'=>$_GET["id"],
                  'total_price'=>$total_price,
                  'start_date'=>$start_date,
                  'end_date'=>$end_date,
                  'persons'=>$persons
                );
                $_SESSION["cart"][$counter] = $hike_array;

                DB::query('INSERT INTO cart VALUES(\'\',:user_id,:hike_id,:date_added,:total_price,:start_date,:end_date,:persons)',
                array(':user_id'=>$userid,
                    ':hike_id'=>$hikeid,
                    ':date_added'=>$date,
                    ':total_price'=>$total_price,
                    ':start_date'=>$start_date,
                    ':end_date'=>$end_date,
                    ':persons'=>$persons));

                echo '<script>alert("Added To Added Cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
            else
            {
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';
            }   
        }
        else
        {
            $hike_array = array(  
              'hike_id'=>$_GET["id"],
              'total_price'=>$total_price,
              'start_date'=>$start_date,
              'end_date'=>$end_date,
              'persons'=>$persons,   
            );  
            $_SESSION["cart"][0] = $hike_array;

            DB::query('INSERT INTO cart VALUES(\'\',:user_id,:hike_id,:date_added,:total_price,:start_date,:end_date,:persons)',
            array(':user_id'=>$userid,
                ':hike_id'=>$hikeid,
                ':date_added'=>$date,
                ':total_price'=>$total_price,
                ':start_date'=>$start_date,
                ':end_date'=>$end_date,
                ':persons'=>$persons));

            echo '<script>alert("Added To Added Cart")</script>';
            echo '<script>window.location="cart.php"</script>';
        }
    }
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
  <title>Hikingify | Book Hike</title>
</head>

<body id="review"
>
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->

  <!-- Top Banner START -->
  <div class="top-banner">
    <div class="overlay"></div>
    <div class="content">
      <h1>Booking Hike</h1>
    </div>
  </div>
  <!-- Top Banner END -->

  <!-- Hike Body START -->
  <div class="hike-s-description hike-body">
    <div class="flex-container">
      <div class="left">
        <div class="selected-hike-image">
          <div class="title"><?php echo $hike_info['name'].', '.$hike_info['country']; ?></div>
          <img src="control/uploads/<?php echo $hikeImage; ?>">
        </div>
      </div>
      <div class="right">
        <div class="flex-container mb-20 j-sb">
          <div class="xbutton" id="overviewBtn" onclick="showNote('overviewBtn','overview')">Overview</div>
          <div class="xbutton secondary" id="routeBtn" onclick="showNote('routeBtn','route')">Route</div>
          <div class="xbutton secondary" id="safetyBtn" onclick="showNote('safetyBtn','safety')">Safety</div>
          <div class="xbutton secondary" id="howtobookBtn" onclick="showNote('howtobookBtn','howtobook')">How to book</div>
          <div class="xbutton secondary" id="reviewsBtn" onclick="showNote('reviewsBtn','reviews')">Reviews ( <?php echo $total_ratings; ?> )</div>
        </div>
        <div class="hike-details" id="overview">
          <div class="hike-heading">
            <h1 id="h-text"><?php echo $hike_info['name'].', '.$hike_info['country']; ?> </h1>
            <div class="sep"></div>
            <div class="rating" data-rating="<?php echo $ratingValue; ?>">

            </div>
            <div class="sep"></div>
            <div class="rating-counter"><?php echo $total_ratings; ?> Ratings</div>
          </div>
          <p>
            <?php echo $hike_info['overview']; ?>
          </p>
        </div>
        <div class="hike-details" id="route">
          <div class="hike-heading">
            <h1 id="h-text"><?php echo $hike_info['name'].', '.$hike_info['country']; ?> </h1>
            <div class="sep"></div>
            <div class="rating" data-rating="<?php echo $ratingValue; ?>">

            </div>
            <div class="sep"></div>
            <div class="rating-counter"><?php echo $total_ratings; ?> Ratings</div>
          </div>
          <p>
            <?php echo $hike_info['route']; ?>
          </p>
        </div>
        <div class="hike-details" id="safety">
          <div class="hike-heading">
            <h1 id="h-text"><?php echo $hike_info['name'].', '.$hike_info['country']; ?> </h1>
            <div class="sep"></div>
            <div class="rating" data-rating="<?php echo $ratingValue; ?>">

            </div>
            <div class="sep"></div>
            <div class="rating-counter"><?php echo $total_ratings; ?> Ratings</div>
          </div>
          <p>
            <?php echo $hike_info['safety']; ?>
          </p>
        </div>
        <div class="hike-details" id="howtobook">
          <div class="hike-heading">
            <h1 id="h-text"><?php echo $hike_info['name'].', '.$hike_info['country']; ?> </h1>
            <div class="sep"></div>
            <div class="rating" data-rating="<?php echo $ratingValue; ?>">

            </div>
            <div class="sep"></div>
            <div class="rating-counter"><?php echo $total_ratings; ?> Ratings</div>
          </div>
          <p>
            <?php echo $hike_info['howtobook']; ?>
          </p>
        </div>
        <div class="hike-details" id="reviews">
          <?php
            $allReviews = DB::query('SELECT * FROM reviews WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid));
            foreach($allReviews as $oneReview)
            {
              $userName = DB::query('SELECT fullname FROM users WHERE id=:id',array(':id'=>$oneReview['user_id']))[0]['fullname'];
              $timeInAgo = timeago($oneReview['_date']);
            
          
          ?>
          <div class="single-review">
            <div class="hike-heading">
              <h1 id="h-text"><b><?php echo $userName; ?></b></h1>
              <div class="sep"></div>
              <div class="rating" data-rating="<?php echo $oneReview['stars']; ?>">

              </div>
              <div class="sep"></div>
              <div class="rating-counter"> <i><?php echo $timeInAgo; ?></i> </div>
            </div>
            <p><?php echo $oneReview['comment']; ?></p>
          </div>
          <hr>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- Booking Box START -->
    <form class="flex-container book-container j-sb" method="POST" action="hike.php?id=<?php echo $hikeid; ?>">
      <div class="price"><?php echo $hike_info['price']; ?></div>
      <div class="flex-container j-c">
        <input type="date" name="start_date" id="ssssDate" oninput="startDate(this.value,'sDate');fillPrice(<?php echo $hike_info['price'] ?>);" required>
        <input type="date" name="end_date" id="eeeeDate" oninput="startDate(this.value,'eDate');fillPrice(<?php echo $hike_info['price'] ?>);" required>
        <input type="hidden" name="total_price" id="totalPrice" value="">
        <select name="persons" oninput="startDate(this.value,'sPersons');fillPrice(<?php echo $hike_info['price'] ?>);" required>
          <option value="" selected disabled>Select Persons</option>
          <?php
            for($i = 1;$i <= 12;$i++)
            {
              print "<option value='$i'>".$i." Persons</option>";
            }
          ?>
        </select>
        
      </div>
      <div class="details">
        <table>
          <tr>
            <td>Start date</td>
            <td id="sDate"></td>
          </tr>
          <tr>
            <td>End date</td>
            <td id="eDate"></td>
          </tr>
          <tr>
            <td>Persons</td>
            <td id="sPersons"></td>
          </tr>
          <tr>
            <td>Booking Cost</td>
            <td id="sPrice">0 EGP</td>
          </tr>
        </table>
      </div>
      <button type="submit" name="add" class="xbutton">Add To Cart</button>
    </form>
    <!-- Booking Box END -->

    <!-- Gallery START -->
    <div class="heading-line mb-30">
      Gallery
    </div>
    <div class="hike-gallery flex-container">
      <div id="selected-image" class="image f-1">
        <img src="control/uploads/<?php echo $hikeImage; ?>">
      </div>
      <div class="gallery-images f-1">
        <?php
        $allimages = DB::query('SELECT * FROM hike_images WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid));
        foreach ($allimages as $img) {
        ?>
          <div class="item">
            <img src="control/uploads/<?php echo $img['image'] ?>">
          </div>
        <?php
        }
        ?>
      </div>
      <!-- // TODO: Gallery Image Selection -->
    </div>
    <!-- Gallery END -->
    <!-- Map Overview START -->
    <div class="heading-line mb-30">
      Map Overview
    </div>
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3449.3445460951766!2d31.48966771553003!3d30.17015031957734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14581bab30f3291d%3A0x1b138aefe2d8bedb!2sMisr%20International%20University!5e0!3m2!1sen!2seg!4v1608703385546!5m2!1sen!2seg" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map Overview END -->
    <!-- Places you might like START -->
    <?php include('includes/places-might-like.php'); ?>
    <!-- Places you might like END -->
  </div>
  <!-- Hikes Body END  -->
  <!-- Footer START -->
  <?php include('includes/footer.php'); ?>
  <script>
    deletePastDates('ssssDate');
    deletePastDates('eeeeDate');
  </script>
  <!-- Footer END -->
</body>

