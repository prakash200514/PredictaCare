<nav class="dashboard-header top-navbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="user_interface.php">
            <i class="fa fa-heartbeat" style="color: #06b6d4;"></i>
            Disease Prediction System
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['alogin']) && $_SESSION['alogin']!="") { ?>
                <li>
                    <a href="user_logout.php" onclick="return confirm('Do you want to log out?');" class="logout-link">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>