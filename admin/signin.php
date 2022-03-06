<!DOCTYPE html>
<html lang="en">
<?php 
    include 'config/connection.php';
    include_once "model/mysession.php"; 
    include_once "controller/signin.php";
      if(isset($_SESSION['loggedin'])){
        header("Location:view/dashboard.php");
      }
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reporting System</title>
  <!--Fonts and icons-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/signin.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/illustration-signin.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">

                <form role="form" class="text-start" action="" method="post">
                <?php 
                      // if(isset($_SESSION['loggedin'])){
                      //   echo "ALready Login";
                      // }


                    if (checkSession("error_login") &&  getSession('error_login') != '') {
                        echo '<h5 class=" text-danger"> ' . getSession('error_login') . ' </h5>';
                        unset($_SESSION['error_login']);                 
                    }
                  ?>
                  <div class="input-group input-group-outline my-3">
                    <!-- <label for="email" class="form-label">Email</label> -->
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label for="password" class="form-label">Password</label> -->
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <input type="submit" name="signin" class="btn bg-gradient-primary w-100 my-4 mb-2" value="Sign in"/>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="signup.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

</body>

</html>