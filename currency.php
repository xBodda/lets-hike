<?php
include('includes/head.php');
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
  <title> Hikingify | Review Hike </title>
</head>

<body id="review">
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->

  <!-- Top Banner START -->
  <div class="top-banner">
    <div class="overlay"></div>
    <div class="content">
      <h1>Edit Currency</h1>
    </div>
  </div>
  <!-- Top Banner END -->
  <!-- Cart Body START -->
  <div class="terms-body">
    <div class="flex-container">
      <!-- Card 1 END-->
    </div>
    <!-- Cart Details START -->
    <div class="center">
      <div class=" terms-container ">
        <h1 style="text-align: center;margin-bottom: 30px">Choose your default currency</h1>
        <table class="cTable">
          <tr>
            <td <?php echo (($_SESSION['currency'] == 'EGP') ? 'style="color:#01b301cc;font-weight:bold;"' : ""); ?>><a href="change-currency.php?currency=EGP">Egyptian Pound (EGP)</a></td>
            <!-- <td><button class="curButton">European Euro (EUR)</button></td> -->
            <td <?php echo (($_SESSION['currency'] == 'EUR') ? 'style="color:#01b301cc;font-weight:bold;"' : ""); ?>><a href="change-currency.php?currency=EUR">European Euro (EUR)</a></td>
            <td <?php echo (($_SESSION['currency'] == 'INR')?'style="color:#01b301cc;font-weight:bold;"':"");?>><a href="change-currency.php?currency=INR">Indian Rupee (INR)</a></td>
          </tr>
          <tr>
            <td <?php echo (($_SESSION['currency']== 'USD')?'style="color:#01b301cc;font-weight:bold;"':"");?>><a href="change-currency.php?currency=USD">US Dollar (USD)</a></td>
            <td <?php echo (($_SESSION['currency']== 'CAD')?'style="color:#01b301cc;font-weight:bold;"':"");?>><a href="change-currency.php?currency=CAD">Canadian Dollar (CAD)</a></td>
            <td <?php echo (($_SESSION['currency']== 'GBP')?'style="color:#01b301cc;font-weight:bold;"':"");?>><a href="change-currency.php?currency=GBP">British Pound (GBP)</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer START -->
  <?php include('includes/footer.php'); ?>
  <!-- Footer END -->
</body>

</html>