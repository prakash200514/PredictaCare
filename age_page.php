<?php
session_start();
<<<<<<<<<
// Rule 1 & 4 & 5 Guard: Must be logged i
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

// Rule 4 & 5 Guard: Must have accepted terms
if (!isset($_SESSION['terms_accepted']) || $_SESSION['terms_accepted'] !== true) {
    header("Location: terms_conditions.php");
    exit();
}

// Process Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (isset($_POST['range']) && is_numeric($_POST['range'])) {
        $age = (int)$_POST['range'];
        
        // Validate age range
        if ($age >= 1 && $age <= 120) {
            $_SESSION['user_age_confirmed'] = true;
            $_SESSION['user_age'] = $age;
            
            header("Location: user_interface.php");
            exit();
        } else {
            $error_msg = "Please enter a valid age between 1 and 120.";
        }
    } else {
         $error_msg = "Age cannot be empty or invalid.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Disease Prediction System - Confirm Age</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/age.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            .error-message {
                color: #e74c3c;
                font-size: 14px;
                margin-top: 10px;
                text-align: center;
                display: none;
            }
        </style>
    </head>
    <body>
        
        <div class="age-card">
            <h2 class="age-title">Confirm Your Age</h2>
            <p class="age-subtitle">Accurate age helps us provide better results.</p>

            <form action="age_page.php" method="post">
                <div class="age-display" id="ageVal">25</div>
                <div class="age-label">Years Old</div>

                <div class="slider-container">
                    <input type="range" min="1" max="100" value="25" name="range" class="slider" id="myRange" required>
                </div>
                
                <?php if (isset($error_msg)): ?>
                    <div class="error-message" style="display: block;"><?php echo htmlspecialchars($error_msg); ?></div>
                <?php endif; ?>

                <div class="nav-area">
                    <!-- Kept styling matching age.css without previous steps -->
                    <!-- Removed back button to prevent backwards flow skipping -->
                    <div></div>
                    <button type="submit" name="submit" class="btn-next">FINISH &amp; PROCEED</button>
                </div>
            </form>
        </div>

        <script>
            var slider = document.getElementById("myRange");
            var output = document.getElementById("ageVal");
            
            // Display the default slider value
            output.innerHTML = slider.value;

            // Update the current slider value (each time you drag the slider handle)
            slider.oninput = function() {
                output.innerHTML = this.value;
            }
        </script>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
