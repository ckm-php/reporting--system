<?php include 'header.php' ?>
<div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Forgot Password</h3>
        <a href="index.php" class="back-link btn btn-outline-info">Back User View <i class="fas fa-reply-all"></i></a>
    </header>
    <div class="row mt-3">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="forgotAct.php" method="post" name="forgot_validate">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter Email">
                </div>
                <div class="d-flex justify-content-center">
                    <a href="login.php" class="btn btn-secondary mr-1">Cancel</a>
                    <button type="submit" name="forgotpass" class="btn btn-primary btn-name">Request Password</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>