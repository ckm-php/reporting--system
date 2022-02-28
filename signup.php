<?php include 'header.php' ?>
<div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Create Account</h3>
        <a href="index.php" class="back-link btn btn-outline-info">Back User View <i class="fas fa-reply-all"></i></a>
    </header>
    <div class="row mt-3">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php
                if(isset($_GET['success'])) {
                    $success = "Your Signup is success.";
                    echo '<div class="alert alert-success">'. $success .'</div>';
                }
                if(isset($_GET['passnomatch'])) {
                    $passnomatch = "Password does not match";
                    echo '<div class="alert alert-danger">'. $passnomatch .'</div>';
                }
                if(isset($_GET['emailExist'])) {
                    $emailExist = "Email already existed";
                    echo '<div class="alert alert-danger">'. $emailExist .'</div>';
                }
            ?>
            <form action="signupAct.php" method="post" name="signup_validate">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="nameInput" placeholder="Enter Name">
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter Email">
                </div>
                <div class="mb-4">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passInput" name="password" placeholder="Enter Password">
                </div>
                <div class="mb-4">
                    <label for="cpassInput" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassInput" name="cpassword" placeholder="Enter Password">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="signup" class="btn btn-primary btn-name">Sign up</button>
                </div>
            </form>
            <div class="mt-3 signup">
                <span>Already have an account?</span>
                <a href="login.php" class="text-primary">Sign in</a>
            </div>
            
        </div>
    </div>
</div>
<?php include 'footer.php' ?>