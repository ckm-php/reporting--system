<?php 
    include 'header.php'; 
    include 'nav.php';
    include 'sidebar.php';
?>

<div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <?php
                            if(isset($_GET['success'])) {
                                $success = "Password Changed Successfully";
                                echo '<div class="alert alert-success">'. $success .'</div>';
                            }
                            if(isset($_GET['passnomatch'])) {
                                $passnomatch = "Password does not match";
                                echo '<div class="alert alert-danger">'. $passnomatch .'</div>';
                            }
                            if(isset($_GET['oldpassnomatch'])) {
                                $oldpassnomatch = "Old Password does not match";
                                echo '<div class="alert alert-danger">'. $oldpassnomatch .'</div>';
                            }
                        ?>
                        <form action="adminPassAct.php" method="post" name="changepass_validate">
                            <div class="mb-4">
                                <label for="oldPass" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="oldPass" name="opassword" placeholder=" Old Password">
                            </div>
                            <div class="mb-4">
                                <label for="passInput" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="passInput" name="password" placeholder=" New Password">
                            </div>
                            <div class="mb-4">
                                <label for="cpassInput" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassInput" name="cpassword" placeholder="Confirm Password">
                            </div>
                            <div class="">
                                <button type="submit" name="changepass" class="btn btn-primary">Change Password</button>
                                <a href="management.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
</div>
<?php include 'footer.php' ?>