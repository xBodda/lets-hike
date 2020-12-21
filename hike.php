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
        <h1>Booking Hike</h1> 
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Hike Body START -->
    <div class="hike-s-description hike-body">
      <div class="flex-container">
        <div class="left">
          <div class="selected-hike-image">
            <div class="title">MT Charleston Peak, USA</div>
            <img src="layout/png/1.png">
          </div>
        </div>
        <div class="right">
        <div class="flex-container mb-20 j-sb">
          <div class="xbutton">Overview</div>
          <div class="xbutton secondary">Route</div>
          <div class="xbutton secondary">Safety</div>
          <div class="xbutton secondary">How to book</div>
          <div class="xbutton secondary">FAQ</div>
        </div>
        <div class="hike-details">
        <div class="hike-heading">
          <h1 id="h-text">MT Charleston Peak, USA </h1>
          <div class="sep"></div>
          <div class="rating" data-rating="3">

          </div>
          <div class="sep"></div>
          <div class="rating-count">235 Ratings</div>
        </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        </div>
      </div>
      <form class="flex-container book-container j-sb">
          <div class="price">850</div>
          <div class="flex-container j-c">
            <input type="date">
            <input type="date">
            <select>
              <option>3 persons</option>
            </select>
          </div>
          <div class="details">
            <table>
              <tr>
                <td>Start date</td>
                <td>06-12-2020</td>
              </tr>
              <tr>
                <td>End date</td>
                <td>08-12-2020</td>
              </tr>
              <tr>
                <td>Persons</td>
                <td>06-12-2020</td>
              </tr>
              <tr>
                <td>Booking Cost</td>
                <td>2250 EGP</td>
              </tr>
            </table>
          </div>
          <div class="xbutton">Book Now</div>
       </form>
    </div>
    <!-- Hikes Body END  -->


    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
