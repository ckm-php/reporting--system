<?php include 'header.php' ?>
<div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Login</h3>
        <a href="index.php" class="back-link btn btn-outline-info">Back User View <i class="fas fa-reply-all"></i></a>
    </header>
    <div class="row mt-3">
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
                    <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter Email">
                </div>
                <div class="mb-4">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passInput" name="password" placeholder="Enter Password">
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