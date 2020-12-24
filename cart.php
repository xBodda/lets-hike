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
      <h1>Your Cart</h1>
    </div>
  </div>
  <!-- Top Banner END -->

  <!-- Cart Body START -->
  <div class="cart-body">
    <div class="flex-container">

      <div class="right">
          <div class=" cart-container ">
            <div class="cartimg">

              <img src="layout/png/1.png">
          </div>
          <table >
            <tr>
              <td><div class="title">Mt Chasrleston Peak, USA</div></td>
            </tr>
            <tr>
              <td><div class="rating "></div></td>
              <td>


            </tr>
            <tr>
              <td><div class="rating-number ml-10x">248</div></td>
            </tr>


          </table>


                <table class= "fl-1 ta-r">
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">Start Date</p></td>
                    <td><p class="fl-1 ta-r cart-details-text2">06-12-2020</p></td>
                  </tr>
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">End Date</p></td>
                    <td><p class="fl-1 ta-r cart-details-text2">08-12-2020</p></td>
                  </tr>
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">Persons</p></td>
                    <td><p class="fl-1 ta-r cart-details-text2">3</p></td>
                  </tr>
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">Booking Cost</p></td>
                    <td><p class="fl-1 ta-r cart-details-text3">2250 £ EGP </p></td>
                  </tr>

                </table>
          </div>
          <!-- Card 1 END-->
          <div class=" cart-container ">
            <div class="cartimg">

              <img src="layout/png/4.png">
          </div>
          <table >
            <tr>
              <td><div class="title">Joshua Tree, USA</div></td>
            </tr>
            <tr>
              <td><div class="rating "></div></td>
              <td>


            </tr>
            <tr>
              <td><div class="rating-number ml-10x">145</div></td>
            </tr>


          </table>


                <table class= "fl-1 ta-r">
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">Start Date</p></td>
                    <td><p class="fl-1 ta-r cart-details-text2">12-12-2020</p></td>
                  </tr>
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">End Date</p></td>
                    <td><p class="fl-1 ta-r cart-details-text2">20-12-2020</p></td>
                  </tr>
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">Persons</p></td>
                    <td><p class="fl-1 ta-r cart-details-text2">2</p></td>
                  </tr>
                  <tr>
                    <td><p class="fl-2 ta-r cart-details-text1">Booking Cost</p></td>
                    <td><p class="fl-1 ta-r cart-details-text3">1548 £ EGP </p></td>
                  </tr>

                </table>
          </div>
          <!-- Card 2 END-->




      </div>

    <!-- Cart Details START -->
    <div class="left">
      <div class=" cart-container ">
      <h1 class="ta-c">Cart Details</h1>
      <hr>
      <div class="payment-details">
        <div class="flex mb-10">
            <b class="fl-1">Mt Charleston Peak, USA</b>
            <p class="fl-1 ta-r">2250 £</p>
        </div>

        <div class="payment-details">
          <div class="flex mb-10">
              <b class="fl-1">Joshua Tree, USA</b>
              <p class="fl-1 ta-r">1548 £</p>
            </div>
          </div>
        <hr>

        <div class="payment-details">
          <div class="flex mb-10">
              <b class="fl-2">Subtotal</b>
              <p class="fl-1 ta-r">2250 £</p>
          </div>
          <div class="flex mb-10">
              <b class="fl-1">Tax</b>
              <p class="fl-1 ta-r">488 £</p>
          </div>
          <hr>

      <div class="total">4286</div> <br>
      <div class="mb-a xbutton mb-20 ">
          Proceed to checkout
        </div>
        <div class="mb-a xbutton grey  ">
            Continue exploring
          </div>
        </div>
      </div>
    </div>
<!-- Cart Details END -->
  </div>
</div></div>

<!-- Cart Body END -->

<!-- Places you might like START -->
<?php include('includes/places-might-like.php'); ?>
<!-- Places you might like END -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->


</body>

</html>
