<?php 
    include_once "../model/mysession.php"; 
    if(!isset($_SESSION['id'])) {
        header("Location:../signin.php");
    }
    if($_SESSION['role']=="user") {
        header("Location:error.php");
    }
    include_once '../include/admin_header.php';
    include_once "../controller/admin/user_delete.php";
    include_once '../model/pagination.php';
   
    $commons = new Common();
    $_POST['id'] = $_SESSION['id'];
    
    // $results = $commons->getAllRow("SELECT * FROM report WHERE user_id='$id'");
    
    // if(isset($_POST['startdate'])){$_SESSION['startdate'] = $_POST['startdate'];}
    // if(isset($_POST['enddate'])){$_SESSION['enddate'] = $_POST['enddate'];}
    if(isset($_POST['searchvalue'])){$_SESSION['searchvalue'] = $_POST['searchvalue'];}
    if(isset($_POST['user'])){$_SESSION['user'] = $_POST['user'];}
    if(isset($_POST['status'])){ $_SESSION['ustatus'] = $_POST['status'];}
    if(isset($_POST['role'])){ $_SESSION['urole'] = $_POST['role'];}

    // print_r($_SESSION['userrole']);
    // print_r($_SESSION['userstatus']);
    // exit();

?>
<div id="wrapper" class="usersearch">
    <?php include '../include/admin_nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                User Lists
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">User List</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Lists
                        </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <form class="form-inline search-box" method="post" id="userlists">
                                    <!-- Created Date Search -->
                                    <!-- <label for="startdate">Date: From</label>
                                        <input type="date" class="form-control" placeholder="Start"  name="startdate" value="<?php if(isset($_POST['startdate'])) echo $_POST['startdate']; ?>" />
                                    <label for="enddate">To</label>
                                        <input type="date" class="form-control" placeholder="End"  name="enddate" value="<?php if(isset($_POST['enddate'])) echo $_POST['enddate']; ?>" /> -->
                                    <!-- User Search -->
                                    <select class="form-control" name="user">
                                        <option value="">Select User</option>
                                        <?php  
                                            $sql = "SELECT * FROM `user`";
                                            $select=$_POST['user'];
                                            $users = $commons->getAllRow($sql);
                                            foreach($users as $user):
                                        ?> 
                                            <option value="<?php echo $user['id'];?>" <?php if($user['id']==$select ){ echo "selected"; } ?>> 
                                                <?php echo $user['name']; ?> 
                                            </option> 
                                        <?php  
                                            endforeach;
                                        ?> 
                                    </select>
                                    <!-- Role Search -->
                                    <select class="form-control" name="role">
                                        <option value="">Select Role</option>
                                        <?php $selectedrole=$_POST['role']; ?> 
                                        <option value="admin" <?php if("admin"==$selectedrole ){ echo "selected"; } ?>>Admin</option>
                                        <option value="user" <?php if("user"==$selectedrole ){ echo "selected"; } ?>>User</option>
                                    </select>
                                    <!-- Status Search -->
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <?php $selected=$_POST['status']; ?> 
                                        <option value="active" <?php if("active"==$selected ){ echo "selected"; } ?>>Active</option>
                                        <option value="deactivate" <?php if("deactivate"==$selected ){ echo "selected"; } ?>>Deactivate</option>
                                    </select>
                                    <!-- All Data Value Search -->
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" value="<?php if(isset($_POST['searchvalue'])) echo $_POST['searchvalue']; ?>">
                                    <button class="btn btn-primary" type="submit" name="usersearch">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button> 
                                    <a href="user_lists.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                                </form>
                                <!-- CSV Export link -->
                                <span class="export-btn"><a href="../controller/admin/user_csv_export.php" class="btn btn-success "><i class="dwn"></i> Export</a></span>
                                 <!-- Add New User -->
                                 <span class="add-btn"><a href="user_create.php" class="btn btn-success ">Add New User</a></span>
                            </div> 
                            
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="report-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="8%">No</th>
                                                <th>Name</th>
                                                <th width="20%">Email</th>
                                                <th>Created Date</th>
                                                <th width="8%">Role</th>
                                                <th width="8%">Status</th>
                                                <th width="7%">Edit</th>
                                                <th width="7%">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include '../controller/admin/user_search.php'?>	
                                            <!--  -->
                                        </tbody>
                                    </table>
                                    <?php 
                                        if(isset($results)){
                                        echo $paginator->createLinks( $links, 'pagination pagination-sm' ); 
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                            
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

<?php include '../include/admin_footer.php';?>

<script>
    $(function(){
        $('.con_del').click(function(){
            return confirm('Are you sure you want to delete!');
        });
        $('.con_edit').click(function(){
            return confirm('Are you sure you want to edit!');
        });
    });
</script>