<?php
  include('includes/head.php');
  if (!empty($_SESSION["cart"]))
  {
      $total = 0;
      $subtotal = 0;
      $tax = 0;
      foreach ($_SESSION["cart"] as $keys => $values)
      {
        $hikeid = $values['hike_id'];
        $hike_info = DB::query('SELECT * FROM hikes WHERE id=:id',array(':id'=>$hikeid))[0];
        $ratingValue = CalculateRating($hikeid);
        $total_ratings = DB::query('SELECT COUNT(id) AS cnt FROM reviews WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid))[0]['cnt'];
        $hikeImage = DB::query('SELECT image FROM hike_images WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid))[0]['image'];
          
          $subtotal += $values["total_price"];
          
      } 
    $tax = $subtotal * 0.14;
    $total = $tax + $subtotal;
  }

  if (isset($_POST['checkout']))
  {
      $date = date('Y-m-d H:i:s');

      DB::query('INSERT INTO orders VALUES(\'\',:user_id,:ordered_date)',
      array(':user_id'=>$userid,':ordered_date'=>$date));

      if (!empty($_SESSION["cart"]))
      {
          $total = 0;
          $subtotal = 0;
          $tax = 0;
          foreach ($_SESSION["cart"] as $keys => $values)
          {
            $hikeid = $values['hike_id'];
            $hike_info = DB::query('SELECT * FROM hikes WHERE id=:id',array(':id'=>$hikeid))[0];
            
            $subtotal += $values["total_price"];
            $tax = $subtotal * 0.14;
            $total = $tax + $subtotal;
            $order_id = DB::query('SELECT id FROM orders ORDER BY id DESC LIMIT 1')[0]['id'];

            DB::query('INSERT INTO order_items VALUES(\'\',:hike_id,:price,:start_date,:end_date,:persons,:order_id)',
            array(':hike_id'=>$hikeid,':price'=>$total,':start_date'=>$values['start_date'],':end_date'=>$values['end_date'],':persons'=>$values['persons'],':order_id'=>$order_id));
            unset($_SESSION["cart"][$keys]);
            $cartid = DB::query('SELECT id FROM cart WHERE user_id=:user_id AND hike_id=:hike_id',array(':user_id'=>$userid,':hike_id'=>$hikeid))[0]['id'];
            DB::query('DELETE FROM cart WHERE id=:id AND user_id=:user_id AND hike_id=:hike_id',array(':id'=>$cartid,':hike_id'=>$hikeid,':user_id'=>$userid));
          }
      }

      echo '<script>alert("Order Placed !")</script>';  
      echo '<script>window.location="index.php"</script>';
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
    <title>Hikingify | Checkout</title>
  </head>
  <body id="checkout">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner"> 
      <div class="overlay"></div>
      <div class="content">
        <h1>It's time to checkout</h1> 
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Questions START  -->
    <div class="def-container">
      <div class="payment-container flex">
          <div class="payment-methods fl-2">
            <h1 class="ta-c">Choose The Way You Want To Pay With</h1>
            <hr>
            <div class="pay-cod" id="pay-cod" onclick="selectCod()">
                <div class="flex">
                    <h2 class="fl-1">
                        Pay On Arrival
                    </h2>
                    <i class="fas fa-money-bill-alt fl-1 ta-r"></i>
                </div>
            </div>
            <div class="pay-online" id="pay-online" onclick="selectOn()">
                <div class="flex">
                    <h2 class=" fl-1">Pay With Credit Card</h2>
                    <i class="fas fa-credit-card fl-1 ta-r icz"></i>
                </div>
                <div class="card-entry" id="card-entry">
                    <label for="name">Credit Card Number
                        <i id="i1" class="fas fa-credit-card icon"></i>
                        <input class="input" type="number" name="cardnumber" id="cardnumber" placeholder=" Enter Your Card Number .." maxlength="16" size="16" oninput="checkCard()" required/>
                    </label>
                    <label for="name">Name On Card
                        <i class="fas fa-signature icon"></i>
                        <input class="input" type="text" name="cardname" id="cardname" placeholder=" Enter Your Name On Card .." required/>
                    </label>
                    <div class="flex">
                        <div class="fl-1 mr-20">
                            <label for="name">Expiry Month
                                <i class="fas fa-calendar-week icon"></i>
                                <input class="input" type="month" name="expmonth" id="expmonth" placeholder=" Enter Your Card Number .." required/>
                            </label>
                        </div>
                        <div class="fl-1">
                            <label for="name">Expiry Year
                                <i class="fas fa-calendar-week icon"></i>
                                <input class="input" type="month" name="expyear" id="expyear" placeholder=" Enter Your Card Number .." required/>
                            </label>
                        </div>
                    </div>
                    <label for="name" class="mb-30">CVV
                        <i class="fas fa-lock icon"></i>
                        <input class="input" type="text" name="cvv" id="cvv" maxlength="3" min="0" max="3" placeholder=" Enter Your CVV .." required/>
                    </label>
                </div>
            </div>
            <form action="checkout.php" method="POST">
              <button class="mb-a xbutton mb-10" type="submit" name="checkout">
                  Finish Payment
              </button>
            </form>
            
          </div>
          <div class="payment-desc fl-1">
            <h1 class="ta-c">Payment Details</h1>
            <hr>
            <div class="payment-details">
                <div class="flex mb-10"> <b class="fl-2">Subtotal</b>
                  <p class="fl-1 ta-r"><?php echo number_format($subtotal,2); ?> £</p>
                </div>
                <div class="flex mb-10"> <b class="fl-1">Tax</b>
                  <p class="fl-1 ta-r"><?php echo number_format($tax,2); ?> £</p>
                </div>
                <hr>
                <div class="flex mb-10"> <b class="fl-1">Total Price</b>
                  <p class="fl-1 ta-r"><?php echo number_format($total,2); ?> £</p>
                </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Questions END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->

    <script>
        function checkCard() 
        {
            var card = document.getElementById('cardnumber').value;
            var icon = document.getElementById('i1');
            if(card.charAt(0) == '4')
            {
                icon.classList.remove('fas');
                icon.classList.remove('fa-credit-card');
                icon.classList.remove('fab');
                icon.classList.remove('fa-cc-mastercard');
                icon.classList.add('fab');
                icon.classList.add('fa-cc-visa');
            } else if (card.charAt(0) == '5') {
                icon.classList.remove('fas');
                icon.classList.remove('fa-credit-card');
                icon.classList.remove('fab');
                icon.classList.remove('fa-cc-visa');
                icon.classList.add('fab');
                icon.classList.add('fa-cc-mastercard');
            } else {
                icon.classList.add('fas');
                icon.classList.add('fa-credit-card');
            }
        }
        function selectCod()
        {
            var cont = document.getElementById('pay-cod');
            var cont2 = document.getElementById('pay-online');
            var entry = document.getElementById('card-entry');
            cont.classList.add('payment-active');
            cont2.classList.remove('payment-active');
            entry.style.display = "none";
        }
        function selectOn()
        {
            var cont = document.getElementById('pay-online');
            var cont2 = document.getElementById('pay-cod');
            var entry = document.getElementById('card-entry');
            cont.classList.add('payment-active');
            cont2.classList.remove('payment-active');
            entry.style.display = "block";
        }
    </script>
  </body>
</html>
