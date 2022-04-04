<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>

    <!-- Right navbar links -->
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="../img/avatar3.png" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"><?= $_SESSION['user'] ?></span>
            </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../img/avatar3.png" class="img-circle elevation-2" alt="User Image">
            <p>
            <?= $_SESSION['user'] ?> - Web Developer
              <small>Member since Mar. 2022</small>
            </p>
          </li>
          <li class="user-body">
            <div class="row">
              <div class="col-5 text-center">
                <a href="user_profile.php" class="txt-color">User Profile</a>
              </div>
              <div class="col-7 text-center">
                <a href="change_password.php" class="txt-color">Change Password</a>
              </div>
            </div>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer text-center">
            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
</nav>