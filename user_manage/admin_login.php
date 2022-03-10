<?php
    session_start();
    // echo $_SESSION['admin_id'];
    // die();
    if(isset($_SESSION['logged_in'])) {
        header('location: management.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../css/all.css" >
    <link rel="stylesheet" href="../css/pagination.css">
    <link rel="stylesheet" href="../css/jquery.datetimepicker.css">
    <script src="../css/jquery-ui.css"></script>
    <link rel="stylesheet" href="../css/custom.css">
    
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/jquery.datetimepicker.full.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.min.js" ></script>
</head>
<body>
    <div class="container-fluid">
        <header>
            <h3 class="head-title text-primary">User Management Login</h3>
            <a href="/index.php" class="back-link btn btn-outline-info">Back User View <i class="fas fa-reply-all"></i></a>
        </header>
        <div class="row mt-3">
            <?php
            
            // print_r($_COOKIE['email']);
            // print_r(hay);

            ?>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php 
                    if(isset($_GET['msg'])) {
                        $message = "Incorrect email or password";
                        echo "<div class='alert alert-danger'>" . $message . "</div>";
                    }
                ?>
                <form action="manageAct.php" method="post" name="login_validate">
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter Email">
                    </div>
                    <div class="mb-4">
                        <label for="passInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passInput" name="password" placeholder="Enter Password">
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-name">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>