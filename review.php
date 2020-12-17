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
    <div class="def-container">
      <div class="questions-container flex">
          <div class="questions fl-2">
            <h1>Kindly rate each of the following</h1>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How much are you satisfied with the website ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you see the support team ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the hike equipment ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the transportations ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the place ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate your team guides ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you feel the weather in there ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <div class="qr-review flex">
              <div class="ques fl-3">
                <p>How do you rate the service ?</p>
              </div>
              <div class="rev fl-1 flex">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
            </div>
            <textarea name="comment" class="review-comment" id="comment" cols="30" rows="7" placeholder="(Optional)"></textarea>
            <div class="mb-a xbutton mb-30">
              Submit reviews
            </div>
          </div>
          <div class="hike-image fl-1">
            <img src="layout/jpg/galen-crout-fItRJ7AHak8-unsplash.jpg" alt="">
            <div class="hike-rev-props">
              <div class="rev-prop mb-10 flex">
                <i class="fas fa-map-marker-alt"></i><b> Eagles Nest </b>
              </div>
              <div class="rev-prop mb-10 flex">
                <i class="fas fa-user"></i> 8 Persons
              </div>
              <div class="rev-prop mb-10 flex">
                <i class="fas fa-dollar-sign"></i> 275 USD
              </div>
              <div class="rev-prop mb-10 flex">
                <i class="far fa-clock"></i> 11/12/2020 9:00 AM
              </div>
            </div>
          </div>
      </div>
    </div>
    
    <!-- Questions END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
