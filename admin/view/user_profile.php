<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location:signin.php");
    } 

    if($_SESSION['role']=="admin") {
        include_once '../include/admin_header.php';
    }else if($_SESSION['role']=="user") {
        include '../include/header.php';
    }
    include_once "../controller/user_profile.php";


?>
<div id="wrapper">
<?php 
    if($_SESSION['role']=="admin") {
        include_once '../include/admin_nav.php';
    }else if($_SESSION['role']=="user") {
        include '../include/nav.php';
    }

?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">User Profile</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Profile
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
                                    <input type="text" class="form-control" name="name" id="name" disabled="disabled"  value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" disabled="disabled" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>"/>
                                </div>
                                <!-- Role Search -->
                                <div class="form-group">
                                    <?php if($_SESSION['role']=="admin"){?>
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role" required >
                                            <option value="">Select Role</option>
                                            <?php $selectedrole=$_SESSION['role']; ?> 
                                            <option value="admin" <?php if("admin"==$_SESSION['role'] || "admin"==$selectedrole ){ echo "selected"; } ?>>Admin</option>
                                            <option value="user" <?php if("user"==$_SESSION['role'] || "user"==$selectedrole ){ echo "selected"; } ?>>User</option>
                                        </select>
                                    <?php }else if($_SESSION['role']=="user"){ ?>
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role" disabled="disabled" >
                                            <option value="">Select Role</option>
                                            <?php $selectedrole=$_SESSION['role']; ?> 
                                            <option value="admin" <?php if("admin"==$_SESSION['role'] || "admin"==$selectedrole ){ echo "selected"; } ?>>Admin</option>
                                            <option value="user" <?php if("user"==$_SESSION['role'] || "user"==$selectedrole ){ echo "selected"; } ?>>User</option>
                                        </select>
                                    <?php }?>
                                </div>
                                <!-- Status -->
                                <div class="form-group">
                                    <?php if($_SESSION['role']=="admin"){?>
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="">Select Status</option>
                                            <?php $selectedstatus=$_SESSION['status']; ?> 
                                            <option value="active" <?php if("active"==$_SESSION['status'] || "active"==$selectedstatus){ echo "selected"; } ?>>Active</option>
                                            <option value="deactivate" <?php if("deactivate"==$_SESSION['status'] || "deactivate"==$selectedstatus){ echo "selected"; } ?>>Deactivate</option>
                                        </select>
                                    <?php }else if($_SESSION['role']=="user"){ ?>
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" disabled="disabled">
                                            <option value="">Select Status</option>
                                            <?php $selectedstatus=$_POST['status']; ?> 
                                            <option value="active" <?php if("active"==$_SESSION['status'] || "active"==$selectedstatus){ echo "selected"; } ?>>Active</option>
                                            <option value="deactivate" <?php if("deactivate"==$_SESSION['status'] || "deactivate"==$selectedstatus){ echo "selected"; } ?>>Deactivate</option>
                                        </select>
                                    <?php }?>
       
                                </div>
                                <div class="form-group">
                                    <label for="password">Change Password </label>
                                    <input type="radio" name="password" value="yes" id="yes" required>Yes
                                    <input type="radio" name="password" value="no" id="no" required>No
                                </div>
                                <div class="form-group yes">
                                    <label for="wave_pass">Old Password</label>
                                    <input type="password" name="old_pass" class="form-control req" id="old_pass"/>
                                </div>
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
                                    <button type="submit" name="profile_update" class="btn btn-primary">Update Profile</button>
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

<?php 
     if($_SESSION['role']=="admin") {
        include_once '../include/admin_footer.php';
    }else if($_SESSION['role']=="user") {
        include '../include/footer.php';
    }
?>

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



