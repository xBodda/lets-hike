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
    <?php include('includes/header.php'); ?>
    <!-- Header END -->


    <div class="signup-container flex mb-30">
        <div class="signup-img fl-1">

        </div>
        <div class="signup-content">
            <h1>Hikingify</h1>
            <p>Find your adventure</p>
            <p>Join Now !</p>
        </div>
        <!--  -->
        <div class="signup-form fl-1">
            <form action="signup.php" method="POST">
                <h1 class="mb-30">Create Account</h1>
                <label for="name"> &nbsp Fullname
                    <i class="fas fa-id-card icon"></i>
                    <input class="input" type="text" name="name" id="name" placeholder=" Enter Your Name .." required/>
                </label>
                <label for="email"> &nbsp Email
                    <i class="fas fa-envelope icon"></i>
                    <input class="input" type="text" name="email" id="email" placeholder=" Enter Your Email .." required/>
                </label>
                <label for="Password"> &nbsp Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="text" name="password" id="password" placeholder=" Enter Your Password .." required/>
                </label>
                <label for="repassword"> &nbsp Confirm Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="text" name="repassword" id="repassword" placeholder=" Confirm Your Password .." required/>
                </label>
                <label for="gender"> &nbsp Gender
                    <i class="fas fa-venus-mars icon"></i>
                    <select name="gender" id="gender" class="input" required>
                        <option value="" selected disabled>Specify Your Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Rather Not To Say</option>
                    </select>
                </label>
                <label for="phone"> &nbsp Phone Number
                    <i class="fas fa-phone icon"></i>
                    <input class="input" type="text" name="phone" id="phone" placeholder=" Enter Your Phone Number .." required/>
                </label>
                <div class="flex">
                    <div class="button-container fl-1">
                        <button type="submit" class="bButton">
                            <span class="span">Create Account</span>
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
                            <span class="span">Login ?</span>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->

  </body>
</html>
