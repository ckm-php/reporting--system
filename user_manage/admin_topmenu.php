<div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Admin Management View</h3>
        <span class="text-primary"><?= $_SESSION['admin_name']; ?></span>
        <div class="btn-group">
            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $_SESSION['admin_name']; ?>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="admin_profile.php">Admin Profile</a>
                <a class="dropdown-item" href="admin_changPsw.php">Change Password</a>
            </div>
        </div>
        <a href="admin_logout.php" class="head-log btn btn-outline-danger">Logout</a>
    </header>
</div>