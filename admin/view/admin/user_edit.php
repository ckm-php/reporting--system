<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location:../signin.php");
    } 
    if($_SESSION['role']=="user") {
        header("Location:../error.php");
    }
    include_once '../../include/admin_header.php';
    include_once "../../controller/admin/user_edit.php";


?>
<div id="wrapper">
<?php include '../../include/admin_nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Update User Information
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Edit User</a></li>
                <li class="active">User</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Update User Information
                        </div>
                        <div class="panel-body"> 
                            <form role="form" action="" method="post" class="edituser">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required  value="<?php if(isset($name)) echo $name; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required value="<?php if(isset($email)) echo $email; ?>"/>
                                    <?php 
                                        if (isset($_SESSION['email_error']) && $_SESSION['email_error'] != '') {
                                            echo '<p style="color:red;align:center;"> ' . $_SESSION['email_error'] . ' </p>';
                                            unset($_SESSION['email_error']); 
                                            //session_destroy();
                                        } 
                                    ?>
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
                                    <select class="form-control" name="role" required >
                                        <option value="">Select Role</option>
                                        <?php $selectedrole=$_POST['role']; ?> 
                                        <option value="admin" <?php if("admin"==$role || "admin"==$selectedrole ){ echo "selected"; } ?>>Admin</option>
                                        <option value="user" <?php if("user"==$role || "user"==$selectedrole ){ echo "selected"; } ?>>User</option>
                                    </select>
                                </div>
                                <!-- Status Search -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Status</option>
                                        <?php $selectedstatus=$_POST['status']; ?> 
                                        <option value="active" <?php if("active"==$status || "active"==$selectedstatus){ echo "selected"; } ?>>Active</option>
                                        <option value="deactivate" <?php if("deactivate"==$status || "deactivate"==$selectedstatus){ echo "selected"; } ?>>Deactivate</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="button" class="btn btn-primary cancel-btn"><a href="user_edit.php">Reset</a></button>
                                    <button type="submit" name="updateuser" class="btn btn-primary">Update User</button>
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

<?php include_once '../../include/admin_footer.php';?>



