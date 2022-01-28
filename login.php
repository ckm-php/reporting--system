<?php include 'header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="login-logo text-center mt-5 mb-3">
                <img src="images/login.png" alt="" width="100px" height="100px">
            </div>
            <form action="admin/loginAct.php" method="post" name="login_validate">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter Email">
                </div>
                <div class="mb-4">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passInput" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="index.php" class="back-link btn btn-outline-info">Back User View <i class="fas fa-reply-all"></i></a>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>