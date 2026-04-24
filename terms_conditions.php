<?php
session_start();

// Rule 1 & 4 Guard: If not logged in, redirect to login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

// Process Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (isset($_POST['accept_terms'])) {
        $_SESSION['terms_accepted'] = true;
        header("Location: age_page.php");
        exit();
    } else {
        $error_msg = "Please accept the Terms and Conditions to continue.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Disease Prediction System - Terms & Policy</title>
        
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/policy.css"> <!-- Reusing existing Policy CSS -->
        
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            .error-message {
                color: #e74c3c;
                font-size: 14px;
                margin-top: 10px;
                display: none;
            }
        </style>
    </head>
    <body>

        <div class="policy-container">
            <div class="policy-card">
                
                <!-- Content Side -->
                <div class="content-side">
                    <h2 class="policy-title">Terms & Policy</h2>
                    <p class="policy-subtitle">Before using the checkup, please read our Terms of Service. Remember that:</p>
                    
                    <ul class="policy-list">
                        <li><strong>Checkup is not a diagnosis.</strong> Checkup is for informational purposes only and represents a collection of statistical data, not a qualified medical opinion.</li>
                        <li><strong>Do not use in emergencies.</strong> In case of a health emergency, call your local emergency number immediately.</li>
                        <li><strong>Your data is safe.</strong> Information that you provide is anonymous and is not shared with anyone outside this system.</li>
                        <li><strong>Privacy First.</strong> We respect your privacy and handle your data with the utmost care.</li>
                    </ul>

                    <form method="post" action="terms_conditions.php" id="termsForm">
                        <!-- Interactive Checkbox -->
                        <div class="checkbox-wrapper" onclick="toggleCheckbox(event)">
                            <input type="checkbox" id="myCheck" name="accept_terms" value="accepted" required>
                            <label for="myCheck" class="checkbox-label">I have read and accept the Terms of Service and Privacy Policy.</label>
                        </div>
                        
                        <?php if (isset($error_msg)): ?>
                            <div class="error-message" style="display: block;"><?php echo htmlspecialchars($error_msg); ?></div>
                        <?php endif; ?>

                        <!-- Navigation Area -->
                        <div class="nav-area">
                            <!-- Removed the Back Button to Enforce the Flow - users must accept or leave -->
                            
                            <div id="next-btn-container" style="display: none;">
                                <button type="submit" name="submit" class="btn-health" style="border: none; cursor: pointer;">NEXT</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Image Side -->
                <div class="image-side">
                    <img src="images/policy.JPG" alt="Policy Illustration">
                </div>

            </div>
        </div>

        <!-- Scripts -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script>
            $(function() {
                // Check initial state
                if ($("#myCheck").is(':checked')) {
                    $("#next-btn-container").show();
                }

                // jQuery event listener for checkbox
                $("#myCheck").on('change', function(){
                    if($(this).is(':checked')) {
                        $("#next-btn-container").fadeIn("fast");
                    } else {
                        $("#next-btn-container").fadeOut("fast");
                    }
                });
            });

            // Helper function to toggle checkbox when clicking the wrapper div
            function toggleCheckbox(event) {
                // Prevent double toggling if clicking the input or label directly
                if (event.target.tagName !== 'INPUT' && event.target.tagName !== 'LABEL') {
                    $('#myCheck').click();
                }
            }
        </script>
    </body>
</html>
