<?php
  include('includes/head.php');

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["cart"] as $keys => $values) {
      if ($values["hike_id"] == $_GET["id"]) {
        unset($_SESSION["cart"][$keys]);
        $cartid = DB::query('SELECT id FROM cart WHERE user_id=:user_id AND hike_id=:hike_id', array(':user_id' => $userid, ':hike_id' => $_GET['id']))[0]['id'];
        DB::query('DELETE FROM cart WHERE id=:id AND user_id=:user_id AND hike_id=:hike_id', array(':id' => $cartid, ':hike_id' => $_GET['id'], ':user_id' => $userid));
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
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
  <title>Hikingify | Cart</title>
</head>

<body id="review">
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->
  <!-- Top Banner START -->
  <div class="top-banner">
    <div class="overlay"></div>
    <div class="content">
      <h1>Your Cart</h1>
    </div>
  </div>
  <!-- Top Banner END -->
  <!-- Cart Body START -->
  <div class="cart-body">
    <div class="flex-container">
      <div class="right">
        <?php
        if (!empty($_SESSION["cart"])) {
          $total_price = 0;
          foreach ($_SESSION["cart"] as $keys => $values) {
            $hikeid = $values['hike_id'];
            $hike_info = DB::query('SELECT * FROM hikes WHERE id=:id', array(':id' => $hikeid))[0];
            $ratingValue = CalculateRating($hikeid);
            $total_ratings = DB::query('SELECT COUNT(id) AS cnt FROM reviews WHERE hike_id=:hike_id', array(':hike_id' => $hikeid))[0]['cnt'];
            $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id', array(':hike_id' => $hikeid))[0]['image'];
        ?>
            <div class=" cart-container ">
              <div class="cartimg"> <img src="uploads/<?php echo $hikeImage; ?>"> </div>
              <table>
                <tr>
                  <td>
                    <div class="title"><?php echo $hike_info['name'] . ', ' . $hike_info['location']; ?></div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="rating" data-rating="<?php echo $ratingValue; ?>">
                  </td>
                  <td>
                </tr>
                <tr>
                  <td>
                    <div class="rating-number ml-10x"><?php echo $total_ratings; ?></div>
                  </td>
                </tr>
              </table>
              <table class="fl-1 ta-r">
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">Start Date</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text2"><?php echo $values['start_date']; ?></p>
                  </td>
                  <td>
                    <a href="cart.php?action=delete&id=<?php echo $values["hike_id"]; ?>"> <i class="fas fa-times remove-cart"></i> </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">End Date</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text2"><?php echo $values['end_date']; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">Persons</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text2"><?php echo $values['persons']; ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="fl-2 ta-r cart-details-text1">Booking Cost</p>
                  </td>
                  <td>
                    <p class="fl-1 ta-r cart-details-text3"><?php echo number_format(($values['total_price'] * $getCurrencyValue), 2); ?> <?php echo $_SESSION['currency']; ?></p>
                  </td>
                </tr>
              </table>

            </div>
          <?php
            $total_price = $values["total_price"];
          }
          ?>
        <?php
        }
        ?>
        <!-- Card 1 END-->
        <!-- Card 2 END-->
      </div>
      <!-- Cart Details START -->
      <div class="left">
        <div class=" cart-container ">
          <h1 class="ta-c">Cart Details</h1>
          <hr>
          <?php
          if (!empty($_SESSION["cart"])) {
            $total = 0;
            $subtotal = 0;
            $tax = 0;
            foreach ($_SESSION["cart"] as $keys => $values) {
              $hikeid = $values['hike_id'];
              $hike_info = DB::query('SELECT * FROM hikes WHERE id=:id', array(':id' => $hikeid))[0];
              $ratingValue = CalculateRating($hikeid);
              $total_ratings = DB::query('SELECT COUNT(id) AS cnt FROM reviews WHERE hike_id=:hike_id', array(':hike_id' => $hikeid))[0]['cnt'];
              $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id', array(':hike_id' => $hikeid))[0]['image'];
          ?>
              <div class="payment-details">
                <div class="flex mb-10"> <b class="fl-1"><?php echo $hike_info['name'] . ', ' . $hike_info['location']; ?></b>
                  <p class="fl-1 ta-r"><?php echo number_format(($values['total_price'] * $getCurrencyValue), 2); ?> <?php echo $_SESSION['currency']; ?></p>
                </div>
              </div>
            <?php

              $subtotal += $values["total_price"];
            }
            ?>
          <?php
            $tax = $subtotal * 0.14;
            $total = $tax + $subtotal;
          }
          ?>

          <hr>
          <div class="payment-details">
            <div class="flex mb-10"> <b class="fl-2">Subtotal</b>
              <p class="fl-1 ta-r"><?php echo number_format($subtotal * $getCurrencyValue, 2); ?> <?php echo $_SESSION['currency']; ?></p>
            </div>
            <div class="flex mb-10"> <b class="fl-1">Tax</b>
              <p class="fl-1 ta-r"><?php echo number_format($tax * $getCurrencyValue, 2); ?> <?php echo $_SESSION['currency']; ?></p>
            </div>
            <hr>
            <div class="flex mb-10"> <b class="fl-1">Total Price</b>
              <p class="fl-1 ta-r"><?php echo number_format($total * $getCurrencyValue, 2); ?> <?php echo $_SESSION['currency']; ?></p>
            </div>
            <br>
            <a href="checkout.php"> <button class="mb-a xbutton mb-20 "> Proceed to checkout </button> </a>
            <a href="index.php">
              <div class="mb-a xbutton grey  "> Continue exploring </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Cart Details END -->
    </div>


  </div>
  </div>
  <!-- Cart Body END -->
  <!-- Places you might like START -->
  <?php include('includes/places-might-like.php'); ?>
  <!-- Places you might like END -->
  <!-- Footer START -->
  <?php include('includes/footer.php'); ?>
  <!-- Footer END -->
</body>

</html>