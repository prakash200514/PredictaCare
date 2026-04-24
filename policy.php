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
        <link rel="stylesheet" href="css/policy.css"> <!-- New Premium CSS -->
        
        <script src="js/modernizr/modernizr.min.js"></script>
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

                    <!-- Interactive Checkbox -->
                    <div class="checkbox-wrapper" onclick="toggleCheckbox()">
                        <input type="checkbox" id="myCheck">
                        <label for="myCheck" class="checkbox-label">I have read and accept the Terms of Service and Privacy Policy.</label>
                    </div>

                    <!-- Navigation Area -->
                    <div class="nav-area">
                        <a href="intro.php" class="btn-back" title="Go Back">
                            &laquo; <!-- Changed to HTML entity for cleaner look -->
                        </a>
                        
                        <div id="next-btn-container">
                            <a href="age.php" class="btn-health">NEXT</a>
                        </div>
                    </div>
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
            function toggleCheckbox() {
                // Prevent double toggling if clicking the input directly
                if (event.target.type !== 'checkbox') {
                    $('#myCheck').click();
                }
            }
        </script>
    </body>
</html>
