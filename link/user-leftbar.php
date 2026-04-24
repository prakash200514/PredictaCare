<div class="sidebar sidebar-wrapper">
    <div class="profile-card">
        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['alogin']); ?>&background=eff6ff&color=2563eb&size=200" alt="User" class="profile-img">
        <div class="user-name"><?php echo htmlentities($_SESSION['alogin']); ?></div>
    </div>

    <div class="sidebar-nav">
        <a href="user_interface.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'user_interface.php') ? 'active' : ''; ?>"> 
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span> 
        </a> 
        <a href="view-user-info.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'view-user-info.php') ? 'active' : ''; ?>">
            <i class="fas fa-user-circle"></i> <span>Profile Info</span>
        </a>
        <a href="change-password-user.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'change-password-user.php') ? 'active' : ''; ?>"> 
            <i class="fas fa-key"></i> <span>Change Password</span>
        </a>
        <a href="change-name-user.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'change-name-user.php') ? 'active' : ''; ?>"> 
            <i class="fas fa-id-card"></i> <span>Change Name</span>
        </a>
        <a href="previous-result.php" class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'previous-result.php') ? 'active' : ''; ?>"> 
            <i class="fas fa-history"></i> <span>Previous Results</span>
        </a>
    </div>
</div>