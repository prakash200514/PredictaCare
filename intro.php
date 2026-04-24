
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to the Disease Prediction System</title>
        
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/intro.css"> <!-- New Health Theme CSS -->
        
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>

        <div class="intro-container">
            <div class="intro-content-wrapper">
                
                <div class="intro-flex">
                    <!-- Text Side -->
                    <div class="intro-text-side">
                        <h2 class="intro-title">Hello!</h2>
                        <p class="intro-desc">
                            You’re about to use a short, safe, and anonymous health checkup. 
                            Your answers will be carefully analyzed, and you’ll learn about possible causes of your symptoms.
                        </p>
                        
                        <div class="intro-note">
                            <strong><i class="fa fa-info-circle"></i> Note:</strong>
                            Here, you can login or check anonymously. If you don't have an account in this system, 
                            you can register yourself. Registered users can get a lot more advantages than anonymous users. 
                            If you are already registered, simply login by putting your userID and Password. It's easy and free.
                        </div>
                    </div>

                    <!-- Image Side -->
                    <div class="intro-image-side">
                        <img src="images/intro.JPG" alt="Health Checkup Illustration">
                    </div>
                </div>

                <!-- Action Buttons Area -->
                <div class="action-area">
                    <div class="back-btn-wrapper">
                        <a href="index.php" class="btn-health btn-secondary btn-back" title="Go Back">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </div>
                    
                        <div class="nav-buttons">
                        <?php if(isset($_SESSION['alogin']) && $_SESSION['alogin']!="") { ?>
                            <a href="policy.php" class="btn-health">NEXT <i class="fa fa-arrow-right"></i></a>
                            <a href="logout.php" class="btn-health btn-secondary" style="background: #ff6b6b; border: none;">Logout <i class="fa fa-sign-out"></i></a>
                        <?php } else { ?>
                            <button onclick="document.getElementById('0303').style.display='flex'" class="btn-health">Register</button>
                            <button onclick="document.getElementById('1111111111').style.display='flex'" class="btn-health">Login</button>
                        <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modals -->
        <?php
            include "user_login.php";
            include "signup.php";
        ?>

        <!-- Scripts -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                // Initialize any plugins if needed
            });
        </script>
    </body>
</html>
