<?php
  include_once('includes/head.php');

  if(!isset($_GET['id']) || !isset($_GET['order']) || !Login::isLoggedIn()){
    http_response_code(404);
    include('404.php');
    exit;
  }
  $order_id = $_GET['id'];

  $order_item = $_GET['order'];

  $hike_details = DB::query('SELECT h.id, h.name,o.persons,o.price,o.start_date,o.end_date,i.image
                             FROM hikes h, order_items o,hike_images i
                             WHERE h.id=o.hike_id AND i.hike_id=h.id AND o.id=:id',array(':id'=>$order_id));
                             
  if(!$hike_details){
    http_response_code(404);
    include('404.php');
    exit;
  }
  $hike = $hike_details[0];

  if(isset($_POST['submit'])){
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d H:i:s');
    $final_rating = array_sum($rating)/count($rating);
    if($final_rating>5) $final_rating = 5;

    DB::query('INSERT INTO reviews VALUES(\'\',:hike_id,:rating,:comment,:stars,:_date,:user_id)',
    array(
      ':hike_id'=>$hike['id'],
      ':rating'=>"",
      ':_date'=>$date,
      ':comment'=>$comment,
      ':stars'=>$final_rating,
      ':user_id'=>Login::isLoggedIn()
    ));

    DB::query('UPDATE order_items SET is_rated=1 WHERE id=:id AND order_id=:order_id',
        array(':id'=>$order_id,
                ':order_id'=>$order_item));

    echo '<script>alert("Thanks For Your Review !")</script>';
    header('Location:./');
    exit;
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
        <h1>How do you rate your hike ?</h1> 
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Questions START  -->
    <form method="POST" >
    <div class="def-container">
      <div class="questions-container flex">
          <div class="questions fl-2">
            <h1>Kindly rate each of the following</h1>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How much are you satisfied with the website ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you see the support team ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the hike equipment ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the transportations ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the place ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate your team guides ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you feel the weather in there ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the service ?</p>
              </div>
              <div class="rev fl-1 flex rating user-rating" data-rating="0">
              </div>
            </div>
            <textarea name="comment" class="review-comment" id="comment" cols="30" rows="7" placeholder="(Optional)"></textarea>
            <button name="submit" class="mb-a xbutton mb-30">
              Submit reviews
            </button>
          </div>
          <div class="hike-image fl-1">
            <img src="uploads/<?php echo $hike['image']; ?>" alt="">
            <div class="hike-rev-props">
              <div class="rev-prop mb-10 flex">
                <i class="fas fa-map-marker-alt"></i><b> <?php echo $hike['name']; ?></b>
              </div>
              <div class="rev-prop mb-10 flex">
                <i class="fas fa-user"></i> <?php echo $hike['persons']; ?> Person<?php echo ($hike['persons']>1)?'s':''; ?>
              </div>
              <style>
              .hike-image .pricee::before{
                content:"<?php echo $_SESSION['currency']; ?>";
              }
            </style>
              <div class="rev-prop mb-10 flex pricee">
                 &nbsp <?php echo round($hike['price'] * $getCurrencyValue); ?>
              </div>
              <div class="rev-prop mb-10 flex">
                <i class="far fa-clock"></i> <?php echo date('Y/m/d h:i A',strtotime($hike['start_date'])); ?>
              </div>
              <div class="rev-prop mb-10 flex">
                <i class="far fa-clock"></i> <?php echo date('Y/m/d h:i A',strtotime($hike['end_date'])); ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </form>
    <!-- Questions END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
