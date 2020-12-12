<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Product Sans Font -->
    <link rel="stylesheet" href="layout/css/productsans.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="layout/css/master.css">
    <!-- Link To Icons File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Favicon  -->
    <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
    <title>Hikingify | Signup</title>
  </head>
  <body id="signup">
    <!-- Header START -->
    <div id="header">
      <div class="logo">
        <img src="layout/svg/logo.svg" alt="Hikingify Logo">
      </div>
      <div class="navigation">
          <div> <a href="#">Home</a> </div>
          <div> <a href="#">Destination</a> </div>
          <div> <a href="#">Blog</a> </div>
          <div> <a href="#">Currency EGP £</a> </div>
          <div id="lang"> Lang </div>
          <div> <a href="#">Log In</a> </div>
      </div>
    </div>
    <!-- Header END -->
    <div class="signup-container flex mb-30">
        <div class="signup-img fl-1">
            
        </div>
        <div class="signup-content mt-100">
            <h1>Hikingify</h1>
            <p>Find your adventure</p>
            <p>Join Now !</p>
        </div>
        <div class="signup-form fl-1">
            <form action="signup.php" method="POST">
                <h1 class="mb-30">Login To Your Account</h1>
                <label for="email"> &nbsp Email
                    <i class="fas fa-envelope icon"></i>
                    <input class="input" type="text" name="email" id="email" placeholder=" Enter Your Email .." required/>
                </label>
                <label for="Password"> &nbsp Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="text" name="password" id="password" placeholder=" Enter Your Password .." required/>
                </label>

                <div class="flex">
                    <div class="button-container fl-1">
                        <button type="submit" class="bButton">
                            <span class="span">Login</span>
                            <svg class="svg"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                            >
                                <path class="path"
                                d="M0 11c2.761.575 6.312 1.688 9 3.438 3.157-4.23
                                8.828-8.187 15-11.438-5.861 5.775-10.711
                                12.328-14 18.917-2.651-3.766-5.547-7.271-10-10.917z"
                                
                                />
                            </svg>
                            
                        </button>
                    </div>
                    <div class="button-container fl-1">
                        <button type="button" class="bButtonb">
                            <span class="span">Create Account ?</span>
                        </button>
                    </div> 
                </div>

            </form>
        </div>
    </div>

    <div id="footer">
        <div class="f">
            <div class="logo">
              <a rel="canonical" href="/">
                <img src="layout/svg/logo-grey.svg">
              </a>
              <div class="content">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eos pariatur, optio laudantium amet fugit ratione saepe nesciunt doloribus eligendi similique libero facilis impedit quidem.
              </div>
              
            </div>
            <a href="#top" onclick="scrollToTop();return false"><div class="top"> <img src="layout/svg/arrow.svg" width="20px"> </div></a>
          <div class="links">
            <div class="col">
              <ul>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="take-the-tour.php">Take The Tour</a></li>
                <li><a href="plans.php">Plans & Pricing</a></li>
              </ul>
            </div>
            <div class="col">
              <ul>
                <li><a href='terms.php'>Terms & Conditions</a></li>
                <li><a href='privacy.php'>Privacy Policy</a></li>
                <li><a href='tours.php'>Tours</a></li>
                <li><a href='returns.php'>Returns Policy</a></li>
                <li><a href='support.php'>Support</a></li>
              </ul>
            </div>
            <div class="col">
              <ul>
                <li><a href='advertise.php'>Advertise</a></li>
                <li><a href='afilliates.php'>Afilliates</a></li>
                <li><a href='careers.php'>Careers</a></li>
                <li><a href='contact-us.php'>Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="footer-end">
          <div class="legal">
                All Copyrights Reserved <?php echo '© ' . date('Y') ?> 
          </div>
          <div class="social">
            <a href="#" rel="nofollow" target="=_blank"><i style="font-size:20px; color:#999;" class="fab fa-facebook"></i></a>
            <a href="#" rel="nofollow" target="=_blank"><i style="font-size:20px; color:#999;" class="fab fa-instagram"></i> </a>
          </div>
        </div>
      </div>
    
  </body>
</html>
