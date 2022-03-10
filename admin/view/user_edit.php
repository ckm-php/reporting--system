<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location:signin.php");
    } 
    if($_SESSION['role']=="user") {
        header("Location:error.php");
    }
    include_once '../include/admin_header.php';
    include_once "../controller/admin/user_edit.php";


?>
<div id="wrapper">
<?php include '../include/admin_nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Update User Information
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">User Edit</li>
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
                                <?php 
                                    if (isset($_SESSION['pw_error']) && $_SESSION['pw_error'] != '') {
                                        echo '<p style="color:red;align:center;"> ' . $_SESSION['pw_error'] . ' </p>';
                                        unset($_SESSION['pw_error']); 
                                    } 
                                ?>
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="name" id="name" disabled  value="<?php if(isset($name)) echo $name; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" disabled value="<?php if(isset($email)) echo $email; ?>"/>
                                    <?php 
                                        if (isset($_SESSION['email_error']) && $_SESSION['email_error'] != '') {
                                            echo '<p style="color:red;align:center;"> ' . $_SESSION['email_error'] . ' </p>';
                                            unset($_SESSION['email_error']); 
                                            //session_destroy();
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
                                <div class="form-group">
                                    <label for="password">Change Password </label>
                                    <input type="radio" value="yes" id="yes" name="password" required>Yes
                                    <input type="radio" value="no" id="no" name="password" required>No
                                </div>
                                <!-- <div class="form-group yes">
                                    <label for="wave_pass">Old Password</label>
                                    <input type="password" name="old_pass" class="form-control req" id="old_pass"/>
                                </div> -->
                                <div class="form-group yes">
                                    <label for="new_pass">New Password</label>
                                    <input type="password" name="new_pass" class="form-control req" id="new_pass"/>
                                </div>
                                <div class="form-group yes">
                                    <label for="con_pass">Confirm Password</label>
                                    <input type="password" name="con_pass" class="form-control req" id="con_pass"/>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <!-- <button type="button" class="btn btn-primary cancel-btn"><a href="user_edit.php">Reset</a></button> -->
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

<?php include_once '../include/admin_footer.php';?>
<script>
     $(function(){
		$('#no').click(function(){
			$('.yes').hide();
            $('.req').attr("required",false);
		});
		$('#yes').click(function(){
			$('.yes').show();
			$('.req').attr("required",true);
		});
    });

</script>



