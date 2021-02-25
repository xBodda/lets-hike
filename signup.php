<?php
include('includes/head.php');
if (Login::isLoggedIn()) {
    die("Already Logged In");
}

if (!empty($_POST)) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = $_POST['gender'];
    $phonenumber = $_POST['phonenumber'];
    $image = 'user.png';

    if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))) {
        if (strlen($fullname) >= 3 && strlen($fullname) <= 128) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($password) >= 8 && strlen($password) <= 60) {
                    if ($password == $repassword) {
                        DB::query(
                            'INSERT INTO users VALUES(\'\',:fullname,:email,:password,:gender,:phonenumber,:image,1)',
                            array(
                                ':fullname' => $fullname,
                                ':email' => $email,
                                ':password' => password_hash($password, PASSWORD_BCRYPT),
                                ':gender' => $gender,
                                ':phonenumber' => $phonenumber,
                                ':image' => $image
                            )
                        );

                        echo '<script>alert("Account Created! You Can Login Now")</script>';
                        echo '<script>window.location="signin.php"</script>';
                    } else {
                        echo '<script>alert("Password Doesn\'t Match!")</script>';
                    }
                } else {
                    echo '<script>alert("Password Is Too Short!")</script>';
                }
            } else {
                echo '<script>alert("Error In Email!")</script>';
            }
        } else {
            echo '<script>alert(" Error In Fullname Length!")</script>';
        }
    } else {
        echo '<script>alert("Already Registered!")</script>';
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
    <!-- Top Banner START -->
    <div class="top-banner">
        <div class="overlay"></div>
        <div class="content">
            <h1>Join us now !</h1>
        </div>
    </div>
    <!-- Top Banner END -->

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
                    <input class="input" data-min="5" data-max="50" type="text" name="fullname" id="name" placeholder=" Enter Your Name .." required />
                </label>
                <label for="email"> &nbsp Email
                    <i class="fas fa-envelope icon"></i>
                    <input class="input" data-type="email" type="email" name="email" id="email" placeholder=" Enter Your Email .." required />
                </label>
                <label for="Password"> &nbsp Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" data-min="8" data-max="60" type="password" name="password" id="password" placeholder=" Enter Your Password .." required />
                </label>
                <label for="repassword"> &nbsp Confirm Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input"  data-type="confirm-password" type="password" name="repassword" id="repassword" placeholder=" Confirm Your Password .." required />
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
                    <input class="input"  type="text" name="phonenumber" id="phone" placeholder=" Enter Your Phone Number .." required />
                </label>
                <div class="flex">
                    <div class="button-container fl-3">
                        <button type="submit" class="bButton validate-submit" name="signup">
                            Create Account
                        </button>
                    </div>
                    <div class="button-container fl-1">
                        <a href="signin.php">
                            <button type="button" class="bButtonb">
                                Login ?
                            </button>
                        </a>
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