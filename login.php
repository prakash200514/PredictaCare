<?php
session_start();
error_reporting(0);
include('link/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']=''; 
}
if(isset($_POST['login']))  
{
$uname=$_POST['uname'];
$_SESSION["username"]=$_POST['uname'];
$password=md5($_POST['pass']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute(); 
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['uname'];
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Welcome Admin!',
                text: 'Logged in Successfully',
                icon: 'success',
                confirmButtonColor: '#3b82f6'
            }).then(() => {
                window.location = 'admin_edit_choice.php';
            });
        });
      </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";
    header("refresh:0;url=index.php");

}

}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login - Disease Prediction System</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body class="body-login">

<!-- Modal wrapper removed -->

<div class="main-container">
    <div class="login-card">
        <div class="card-header-aesthetic">
            <div class="login-icon-overlap">
                <i class="fa fa-heartbeat"></i>
            </div>
            <h2>Admin Portal</h2>
            <p>Secure Access for Health Professionals</p>
        </div>
        <form class="login-form" method="post">
            <div class="input-group-custom">
                <label for="uname">Username</label>
                <div class="input-icon-wrap">
                    <i class="fa fa-user input-icon"></i>
                    <input type="text" name="uname" id="uname" placeholder="Enter Username" required>
                </div>
            </div>
            <div class="input-group-custom">
                <label for="pass">Password</label>
                <div class="input-icon-wrap">
                    <i class="fa fa-lock input-icon"></i>
                    <input type="password" name="pass" id="pass" placeholder="Enter Password" required>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" name="login" class="btn-login">
                    Login <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </form>
        <div class="card-footer">
            <a href="index.php" class="back-link"><i class="fa fa-long-arrow-left"></i> Back to Home</a>
        </div>
    </div>
</div>
<!-- Script removed -->

</body>
</html>
