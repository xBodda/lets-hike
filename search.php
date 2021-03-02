<?php
include('includes/head.php');
?>
<?php
$msg = false;
$price_min = 0;
$price_max = 99999;
if (isset($_GET['country']) && isset($_GET['start-date']) && isset($_GET['end-date'])) 
{
  $location = $_GET['country'];
  $date_in = $_GET['start-date'];
  $date_out = $_GET['end-date'];

  $_SESSION['keywordSearch'] = $location;

  if (isset($_GET['price-min']) && isset($_GET['price-max'])) 
  {
    $price_min = $_GET['price-min'];
    $price_max = $_GET['price-max'];
  }

} else {
  $msg = "An error has occured, Please try again";
  $_GET['err_msg'] = $msg;
  include("index.php");
  exit;
}
$date_in = date("Y-m-d", strtotime($date_in));
$date_out = date("Y-m-d", strtotime($date_out));


//Select hikes where arrival time - end_time is available
//Order by the best average rating

// $hikes = DB::query('SELECT h.*, i.image, 
//                     AVG(r.stars) as total_rating,
//                     COUNT(CASE CONVERT(r.stars,int) WHEN 1 THEN 1 ELSE NULL END) as total_rating_1,
//                     COUNT(CASE CONVERT(r.stars,int) WHEN 2 THEN 1 ELSE NULL END) as total_rating_2,
//                     COUNT(CASE CONVERT(r.stars,int) WHEN 3 THEN 1 ELSE NULL END) as total_rating_3,
//                     COUNT(CASE CONVERT(r.stars,int) WHEN 4 THEN 1 ELSE NULL END) as total_rating_4,
//                     COUNT(CASE CONVERT(r.stars,int) WHEN 5 THEN 1 ELSE NULL END) as total_rating_5
//                     FROM hikes h LEFT JOIN hike_images i on h.id=i.hike_id LEFT JOIN reviews r on h.id=r.hike_id WHERE h.location=:location
//         AND (SELECT COUNT(id) FROM order_items WHERE start_date <= :leave_time AND end_date >=
//         :arrival_time AND hike_id=h.id)=0 GROUP BY i.hike_id ORDER BY total_rating DESC', array(":location" => $location, ":arrival_time" => $date_in, ":leave_time" => $date_out));

$hikes = DB::query(
  'SELECT h.*, i.image, 
                    AVG(r.stars) as total_rating,
                    COUNT(CASE CONVERT(r.stars,int) WHEN 1 THEN 1 ELSE NULL END) as total_rating_1,
                    COUNT(CASE CONVERT(r.stars,int) WHEN 2 THEN 1 ELSE NULL END) as total_rating_2,
                    COUNT(CASE CONVERT(r.stars,int) WHEN 3 THEN 1 ELSE NULL END) as total_rating_3,
                    COUNT(CASE CONVERT(r.stars,int) WHEN 4 THEN 1 ELSE NULL END) as total_rating_4,
                    COUNT(CASE CONVERT(r.stars,int) WHEN 5 THEN 1 ELSE NULL END) as total_rating_5
                    FROM hikes h LEFT JOIN hike_images i on h.id=i.hike_id LEFT JOIN reviews r on h.id=r.hike_id WHERE h.location=:location
                    GROUP BY i.hike_id ORDER BY total_rating DESC',
  array(
    ":location" => $location
  )
);

// For Testing
// $hikes = DB::query('SELECT h.*, i.image FROM hikes h LEFT JOIN hike_images i on h.id=i.hike_id GROUP BY i.hike_id');

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
      <h6 style="color:#777;font-weight:normal;"><?php echo COUNT($hikes); ?> results available</h6>
    </div>
    <div class="flex-container j-center wrap">
      <?php foreach ($hikes as $hike) {
      ?>
        <a href="hike.php?id=<?php echo $hike['id'] ?>">
          <div class="item">
            <div class="image">
              <img src="uploads/<?php echo $hike['image'] ?? "default.png"; ?>">
            </div>

            <div class="content">
              <div class="rating" data-rating_1="<?php echo $hike['total_rating_1'] ?? 0; ?>" data-rating_2="<?php echo $hike['total_rating_2'] ?? 0; ?>" data-rating_3="<?php echo $hike['total_rating_3'] ?? 0; ?>" data-rating_4="<?php echo $hike['total_rating_4'] ?? 0; ?>" data-rating_5="<?php echo $hike['total_rating_5'] ?? 0; ?>" data-rating="<?php echo $hike['total_rating'] ?? 0; ?>">
              </div>
              <h1><?php echo $hike['name']; ?></h1>
              <div class="price">
                Starting at: <?php echo round($hike['price']*$getCurrencyValue) . " " . $_SESSION['currency']; ?> 
              </div>
            </div>
          </div>
        </a>
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