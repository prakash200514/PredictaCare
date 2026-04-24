<?php
// session_start(); // Handled in intro.php
error_reporting(0);
include('link/config.php');
// Session clearing removed to allow intro.php to detect logged-in state

if(isset($_POST['login']))  
{
$uname=$_POST['uname'];
$_SESSION["username"]=$_POST['uname'];
$password=md5($_POST['pass']);
$sql ="SELECT user_name,password FROM user WHERE user_name=:uname and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute(); 
$results=$query->fetchAll(PDO::FETCH_OBJ);  
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['uname'];
$_SESSION['user_logged_in']=true;
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success!',
                text: 'Logged in Successfully',
                icon: 'success',
                confirmButtonColor: '#3b82f6'
            }).then(() => {
                window.location = 'terms_conditions.php';
            });
        });
      </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";
    $_SESSION["login_attempts"]+=1;
    $_SESSION["error"]="Password doesn't match"; 
}

}

?>

<div id="1111111111" class="modal">
  <form class="modal-content animate" method="post">
    <div class="auth-modal-wrapper">
      <div class="auth-card">
        <span
          onclick="document.getElementById('1111111111').style.display='none'"
          class="close"
          title="Close Modal"
        >&times;</span>

        <div class="auth-top-icon">
          <i class="fa fa-sign-in"></i>
        </div>
        <div class="auth-title">Welcome Back</div>
        <div class="auth-subtitle">Sign in to your account to continue</div>

        <?php if(isset($_SESSION["error"])) { ?>
          <?php unset($SESSION["error"]); } ?>

        <div class="auth-form">
          <div class="form-group">
            <label for="inputEmail3">Username</label>
            <input
              type="text"
              name="uname"
              id="inputEmail3"
              placeholder="Enter your username"
              required
            >
          </div>

          <div class="form-group">
            <label for="inputPassword3">Password</label>
            <input
              type="password"
              name="pass"
              id="inputPassword3"
              placeholder="Enter your password"
              required
            >
          </div>

          <?php 
            if($SESSION["login_attempts"]> 2)
            {
              $_SESSION["locked"]=time();
              echo "<p>Wait 5 seconds</p>";
            }
            else 
            {
          ?>
            <button type="submit" name="login" class="auth-btn">
              <i class="fa fa-sign-in"></i> Log In
            </button>

            <div class="auth-redirect-text">
              Don't have an account?
              <a href="#"
                 onclick="document.getElementById('1111111111').style.display='none'; document.getElementById('0303').style.display='flex'; return false;">
                Create one
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </form>
</div>
