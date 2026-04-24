<?php 
// session_start(); // Handled in intro.php

include('link/config.php'); 
 
if(isset($_POST['submit']))
{ 
  $username=$_POST['uname'];
  $password=md5($_POST["pass"]); 
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $sql="INSERT INTO  user(user_name,password,contact,gender) VALUES(:username,:password,:email,:gender)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':gender',$gender,PDO::PARAM_STR);
  $query->execute();

  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    echo "<script>alert('Signed Up Success');</script>";
    echo "<script type='text/javascript'> document.location = 'intro.php'; </script>";
  } else {
    echo "<script>alert('Invalid Details! Something went wrong. Please Try Again. Your Username may already exist.');</script>";
    header("refresh:0;url=intro.php");
  }
}
?>

<div id="0303" class="modal">
  <form class="modal-content animate" method="post">
    <div class="auth-modal-wrapper">
      <div class="auth-card">
        <span
          onclick="document.getElementById('0303').style.display='none'"
          class="close"
          title="Close Modal"
        >&times;</span>

        <div class="auth-top-icon">
          <i class="fa fa-user-plus"></i>
        </div>
        <div class="auth-title">Create Account</div>
        <div class="auth-subtitle">Join the Disease Prediction System today</div>

        <div class="auth-form">
          <!-- Username Field -->
          <div class="form-group">
            <label for="uname">Username</label>
            <input
              type="text"
              name="uname"
              id="uname"
              placeholder="Choose a username"
              required
            >
          </div>

          <!-- Password Field -->
          <div class="form-group">
            <label for="pass">Password</label>
            <input
              type="password"
              name="pass"
              id="pass"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase and one lowercase letter, and at least 8 characters"
              placeholder="Create a strong password"
              required
            >
            <div class="hint-text">
              <i class="fa fa-info-circle"></i> Min 8 chars with uppercase, lowercase &amp; number
            </div>
          </div>

          <!-- Email Field -->
          <div class="form-group">
            <label for="email">Email Address</label>
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Enter your email address"
              required
            >
          </div>

          <!-- Gender Field -->
          <div class="form-group">
            <label for="gender">Gender</label>
            <select
              name="gender"
              id="gender"
              required
            >
              <option value="">Select Gender</option>
              <option value="Male">&#9794; Male</option>
              <option value="Female">&#9792; Female</option>
              <option value="Other">&#9711; Other</option>
            </select>
          </div>

          <!-- Submit Button -->
          <button type="submit" name="submit" class="auth-btn">
            <i class="fa fa-check-circle"></i> Create My Account
          </button>

          <p class="auth-redirect-text">
            Already have an account?
            <a href="#"
               onclick="document.getElementById('0303').style.display='none'; document.getElementById('1111111111').style.display='flex';">
              Login here
            </a>
          </p>

          <button
            type="button"
            onclick="document.getElementById('0303').style.display='none'"
            class="auth-cancel-link"
          >
            Cancel
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
var modal = document.getElementById('0303');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
