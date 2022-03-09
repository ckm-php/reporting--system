<?php 
    include 'header.php';
 ?>
<div class="container-fluid">
    <?php include 'top_menu.php' ?>
    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                 if(isset($_GET['success'])) {
                    $success = "Successful change password";
                    echo '<div class="alert alert-success">'. $success .'</div>';
                }
                if(isset($_GET['passnomatch'])) {
                    $passnomatch = "Password does not match";
                    echo '<div class="alert alert-danger">'. $passnomatch .'</div>';
                }
            ?>
            <form action="changePassAct.php" method="post" name="changepass_validate">
                <div class="mb-4">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passInput" name="password" placeholder=" New Password">
                </div>
                <div class="mb-4">
                    <label for="cpassInput" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassInput" name="cpassword" placeholder="Confirm Password">
                </div>
                <div class="">
                    <button type="submit" name="changepass" class="btn btn-primary">Change Password</button>
                    <a href="report_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>