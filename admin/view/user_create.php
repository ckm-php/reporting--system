<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        // die('Direct access not allowed');
        // exit();
        header("Location:../signin.php");
    }
     if($_SESSION['role']=="user") {
        header("Location:error.php");
    }
    include_once '../include/admin_header.php';
    include_once "../controller/admin/user_create.php";


?>
<div id="wrapper">
<?php include '../include/admin_nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Create New User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">User Create</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Create New User
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="post" class="adduser">
                                <?php 
                                    if (isset($_SESSION['account_error']) && $_SESSION['account_error'] != '') {
                                        echo '<p style="color:red;align:center;"> ' . $_SESSION['account_error'] . ' </p>';
                                        unset($_SESSION['account_error']); 
                                        //session_destroy();
                                    } 
                                    ?>
                                <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']?>">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required  value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required />
                                    <?php
                                    if (isset($_SESSION['pw_error']) && $_SESSION['pw_error'] != '') {
                                        echo '<p  style="color:red;align:center;"> ' . $_SESSION['pw_error'] . ' </p>';
                                        unset($_SESSION['pw_error']);
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_pass">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" required />
                                    <?php
                                    if (isset($_SESSION['pw_error']) && $_SESSION['pw_error'] != '') {
                                        echo '<p  style="color:red;align:center;"> ' . $_SESSION['pw_error'] . ' </p>';
                                        unset($_SESSION['pw_error']);
                                    }
                                    ?>
                                </div>
                                <!-- Role Search -->
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role" required>
                                        <option value="">Select Role</option>
                                        <?php $selectedrole=$_POST['role']; ?> 
                                        <option value="admin" <?php if("admin"==$selectedrole ){ echo "selected"; } ?>>Admin</option>
                                        <option value="user" <?php if("user"==$selectedrole ){ echo "selected"; } ?>>User</option>
                                    </select>
                                </div>
                                <!-- Status Search -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>
                                        <?php $selectedstatus=$_POST['status']; ?> 
                                        <option value="active" <?php if("active"==$selectedstatus ){ echo "selected"; } ?>>Active</option>
                                        <option value="deactivate" <?php if("deactivate"==$selectedstatus ){ echo "selected"; } ?>>Deactivate</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="button" class="btn btn-primary cancel-btn"><a href="user_create.php">Reset</a></button>
                                    <button type="submit" name="adduser" class="btn btn-primary">Add New User</button>
                                    <button type="button" class="btn btn-primary cancel-btn"><a href="user_lists.php">Cancel</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<?php include_once '../include/admin_footer.php';?>



