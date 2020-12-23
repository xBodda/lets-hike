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
    <title>Hikingify | Contact</title>
  </head>
  <body id="Contact">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner">
      <div class="overlay"></div>
      <div class="content">
        <h1>Contact us</h1>
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Contact START  -->
    <div class="def-container">
    <div class="contact-cont">
      <div class="contact-box">
        <div class="contact-info">
          <h1>Contact Info</h1>
          <h2>Egypt</h2>
          <p>Misr International University, <br>
            Gamaiet Ahmed Orabi, Al Obour<br>
            Cairo Governorate</p>

          <h2>Ahmed1813516@miuegypt.edu.eg</h2>
          <p><span class="number">+20 102 121 3290</span></p>
        </div>
        <div class="contact-form">
                      <h1 class="highlight u-c">Get in touch</h1>
          <p>Feel free to drop us a line below!</p><br>
          <form method="post">
            <input type="text" name="name"   placeholder="Your Name">
            <input type="email" name="email" placeholder="Your Email">
            <input type="text" name="subject"   placeholder="Subject">
            <textarea name="message" rows="8" cols="80" placeholder="Your Message"></textarea>
            <input type="submit" class="xbutton" name="submit" value="Send">
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- Contact END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
