<header>
    <h3 class="head-title text-primary">Admin View</h3>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['user']; ?>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="user_profile.php">User Profile</a>
            <a class="dropdown-item" href="change_password.php">Change Password</a>
        </div>
    </div>
    <a href="logout.php?logout=true" class="head-log btn btn-outline-danger">Logout</a>
</header>