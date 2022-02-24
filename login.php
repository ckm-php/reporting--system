<?php 
    session_start();
    include 'header.php'
 ?>
<div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Login</h3>
        <a href="index.php" class="back-link btn btn-outline-info">Back User View <i class="fas fa-reply-all"></i></a>
    </header>
    <div class="row mt-3">
        <?php
        
        print_r($_COOKIE['email']);
        print_r(hay);

        ?>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php 
                if(isset($_GET['msg'])) {
                    $message = "Incorrect email or password";
                    echo "<div class='alert alert-danger'>" . $message . "</div>";
                }
            ?>
            <form action="admin/loginAct.php" method="post" name="login_validate">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="emailInput" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" placeholder="Enter Email">
                </div>
                <div class="mb-4">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passInput" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group d-flex justify-content-between mb-3">
                    <label>
                        <input type="checkbox" name="remerberme"> Remember me
                    </label>
                    <a href="forgot_pass.php" class="text-rimary forgotpass">Forgot Pasword?</a>
                </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-name">Login</button>
                </div>
            </form>
            <div class="mt-3 signup">
                <span>Don't have an account?</span>
                <a href="signup.php" class="text-primary">Sign up</a>
            </div>
            
        </div>
    </div>
</div>
<?php include 'footer.php' ?>