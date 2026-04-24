
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Disease Prediction System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/question.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        
        <div class="question-card">
            <h2 class="question-title">Health Profile</h2>
            <p class="question-subtitle">Please check all the statements below that apply to you.</p>

            <form action="teerms.php" method="post">
                <div class="question-list">
                    
                    <!-- Question 1 -->
                    <div class="question-item">
                        <span class="q-text">I am Overweight and Obese</span>
                        <div class="q-options">
                            <label class="radio-container">
                                <input type="radio" name="overweight" value="Yes" required>
                                <span class="radio-label">Yes</span>
                            </label>
                            <label class="radio-container">
                                <input type="radio" name="overweight" value="No" required>
                                <span class="radio-label">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="question-item">
                        <span class="q-text">I Smoke Cigarettes</span>
                        <div class="q-options">
                            <label class="radio-container">
                                <input type="radio" name="overweight1" value="Yes" required>
                                <span class="radio-label">Yes</span>
                            </label>
                            <label class="radio-container">
                                <input type="radio" name="overweight1" value="No" required>
                                <span class="radio-label">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="question-item">
                        <span class="q-text">I have high Cholesterol</span>
                        <div class="q-options">
                            <label class="radio-container">
                                <input type="radio" name="overweight2" value="Yes" required>
                                <span class="radio-label">Yes</span>
                            </label>
                            <label class="radio-container">
                                <input type="radio" name="overweight2" value="No" required>
                                <span class="radio-label">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="question-item">
                        <span class="q-text">I have Hypertension</span>
                        <div class="q-options">
                            <label class="radio-container">
                                <input type="radio" name="overweight3" value="Yes" required>
                                <span class="radio-label">Yes</span>
                            </label>
                            <label class="radio-container">
                                <input type="radio" name="overweight3" value="No" required>
                                <span class="radio-label">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="question-item">
                        <span class="q-text">I have Diabetes</span>
                        <div class="q-options">
                            <label class="radio-container">
                                <input type="radio" name="overweight4" value="Yes" required>
                                <span class="radio-label">Yes</span>
                            </label>
                            <label class="radio-container">
                                <input type="radio" name="overweight4" value="No" required>
                                <span class="radio-label">No</span>
                            </label>
                        </div>
                    </div>

                </div>

                <div class="nav-area">
                    <a href="age.php" class="btn-back" title="Go Back">
                        &laquo;
                    </a>
                    
                    <button type="submit" name="submit" class="btn-submit">SUBMIT</button>
                </div>
            </form>
        </div>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
