<?php    
session_start();  
error_reporting(0);   
include('link/config.php');

if(strlen($_SESSION['alogin'])=="") {    
    header("Location: user_login.php");  
} else {  
    $username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Result</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="css/all.min.css" media="screen"> 
    <link rel="stylesheet" href="css/main.css" media="screen" >
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        body {
            background-color: #f4f7f6;
        }
        .main-container {
            margin-top: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        .empty-state {
            padding: 30px;
        }
        .empty-state i {
             font-size: 60px;
             color: #e53935;
             margin-bottom: 20px;
        }
        .empty-state h3 {
             color: #333;
             font-weight: 700;
             margin-bottom: 10px;
        }
        .empty-state p {
             color: #666;
             font-size: 16px;
        }
        .result-card {
            background: linear-gradient(135deg, #499bea 0%, #207ce5 100%);
            color: white;
            border-radius: 12px;
            padding: 35px;
            margin-bottom: 25px;
            text-align: left;
            box-shadow: 0 8px 25px rgba(73, 155, 234, 0.4);
        }
        .result-card h2 {
            margin-top: 0;
            font-size: 20px;
            font-weight: 600;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            padding-bottom: 15px;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }
        .result-card h3 {
            font-size: 32px;
            font-weight: 900;
            margin: 10px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .cause-section {
            background: white;
            color: #333;
            padding: 25px;
            border-radius: 8px;
            margin-top: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .cause-section h4 {
            color: #207ce5;
            font-weight: 800;
            margin-top: 0;
            margin-bottom: 15px;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }
        .cause-section p {
            margin-bottom: 0;
            font-size: 16px;
            line-height: 1.6;
            color: #475569;
        }
        .disclaimer {
            font-size: 13px;
            color: #64748b;
            text-align: justify;
            margin-top: 30px;
            padding: 20px;
            background: #f8fafc;
            border-left: 4px solid #f59e0b;
            border-radius: 8px;
            line-height: 1.6;
        }
        .btn-back {
            display: inline-block;
            background: #1e293b;
            color: white;
            padding: 14px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            margin-top: 30px;
            border: none;
        }
        .btn-back:hover {
            background: #0f172a;
            color: white;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            transform: translateY(-2px);
            text-decoration: none;
        }
        .btn-back i {
            margin-right: 8px;
        }
    </style>
</head>
<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <!-- ========== TOP NAVBAR ========== -->
        <?php include('link/user-topber.php'); ?> 
        
        <div class="container">
            <div class="main-container">
                <?php 
                // Fetch the user's result ID
                $sql = "SELECT result FROM user WHERE user_name=:username";
                $query = $dbh->prepare($sql);
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->execute(); 
                $resultObj = $query->fetch(PDO::FETCH_OBJ);
                $resultname = $resultObj ? $resultObj->result : NULL;

                if(empty($resultname)) { 
                ?>
                    <div class="empty-state">
                        <h3>No Result Found</h3>
                        <p>You haven't checked your symptoms yet, or you are a new user. Please run the disease check first to see your results.</p>
                    </div>
                <?php 
                } else {
                    // Fetch the disease details based on the result ID
                    $sql2 = "SELECT disease_name, cause FROM disease_tb WHERE id=:id";
                    $query2 = $dbh->prepare($sql2);
                    $query2->bindParam(':id', $resultname, PDO::PARAM_INT);
                    $query2->execute();
                    $diseaseData = $query2->fetch(PDO::FETCH_OBJ);

                    if($diseaseData) {
                ?>
                    <div class="result-card">
                        <h2>Your Previous Result</h2>
                        <p>Based on your selected symptoms, the predicted result is:</p>
                        <h3><?php echo htmlentities($diseaseData->disease_name); ?></h3>
                        
                        <div class="cause-section">
                            <h4>Disease Information & Causes</h4>
                            <p><?php echo htmlentities($diseaseData->cause); ?></p>
                        </div>
                    </div>
                <?php 
                    } else {
                ?>
                    <div class="empty-state">
                        <i class="fas fa-exclamation-triangle"></i>
                        <h3>Result Data Unavailable</h3>
                        <p>We could not retrieve your disease information. Please try checking your symptoms again.</p>
                    </div>
                <?php
                    }
                } 
                ?>

                <div class="disclaimer">
                    <strong>Disclaimer:</strong> Please note that the information provided by this tool is solely for educational purposes and is not a qualified medical opinion. This information should not be considered advice or an opinion of a doctor or other health professional about your actual medical state, and you should see a doctor for any symptoms you may have. If you are experiencing a health emergency, you should call your local emergency number immediately to request emergency medical assistance.
                </div>

                <a href="user_interface.php" class="btn-back"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
            </div>
        </div>
    </div> <!-- .main-wrapper -->

    <!-- Common JS Files -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>