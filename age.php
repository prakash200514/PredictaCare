
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Disease Prediction System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/age.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        
        <div class="age-card">
            <h2 class="age-title">Select Your Age</h2>
            <p class="age-subtitle">Accurate age helps us provide better results.</p>

            <form action="question-intro.php" method="post">
                <div class="age-display" id="ageVal">25</div>
                <div class="age-label">Years Old</div>

                <div class="slider-container">
                    <input type="range" min="1" max="100" value="25" name="range" class="slider" id="myRange">
                </div>

                <div class="nav-area">
                    <a href="policy.php" class="btn-back" title="Go Back">
                        &laquo;
                    </a>
                    
                    <button type="submit" name="submit" class="btn-next">NEXT</button>
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
