<?php 
    include_once "admin_header.php"; 

    include_once 'admin/model/pagination.php';

    $commons = new Common();

    if(isset($_POST['startdate'])){$_SESSION['startdate'] = $_POST['startdate'];}
    if(isset($_POST['enddate'])){$_SESSION['enddate'] = $_POST['enddate'];}
    if(isset($_POST['searchvalue'])){$_SESSION['searchvalue'] = $_POST['searchvalue'];}
    if(isset($_POST['user'])){$_SESSION['user'] = $_POST['user'];}

    // $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3;
    // $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    // $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    // $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id WHERE date_submit BETWEEN '$date1' AND '$date2' ORDER BY report.date DESC";
    // $paginator  = new Pagination( $commons->pdo, $query );
    // $results    = $paginator->getData( $limit, $page );
?>

    


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 view-header">
                        <h1 class="">Report Lists</h1>
                        <a href="admin/signin.php" class="btn bg-gradient-primary view-signin">Signin</a>
                    </div>
                    <!-- <div class="col-md-6">
                        Search Name 
                        <form class="form-inline search-name" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" aria-label="Search">
                            <button class="btn btn-primary" type="submit" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="index.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                        </form>
                    </div>  -->
                    
                    <div class="col-md-12">
                        <!-- Search Date -->
                        <form class="form-inline search-box" method="post">
                            <label>Date: From</label>
                                <input type="date" class="form-control" placeholder="Start"  name="startdate" value="<?php if(isset($_POST['startdate'])) echo $_POST['startdate']; ?>" />
                            <label>To</label>
                                <input type="date" class="form-control" placeholder="End"  name="enddate" value="<?php if(isset($_POST['enddate'])) echo $_POST['enddate']; ?>" />
                            <select class="form-control" name="user">
                                <option value="">Select User</option>
                                <?php  
                                    $sql = "SELECT * FROM `user`";
                                    $select=$_POST['user'];
                                    // print_r($sql);
                                    $users = $commons->getAllRow($sql);
                                    // print_r($users);
                                    foreach($users as $user):
                                ?> 
                                    <option value="<?php echo $user['id'];?>" <?php if($user['id']==$select ){ echo "selected"; } ?>> 
                                        <?php echo $user['name']; ?> 
                                    </option> 
                                <?php  
                                    endforeach;
                                ?> 
                            </select>
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" value="<?php if(isset($_POST['searchvalue'])) echo $_POST['searchvalue']; ?>">
                            <button class="btn btn-primary" type="submit" name="searchdate">
                                <span class="glyphicon glyphicon-search"></span>
                            </button> 
                            <!-- <button class="btn btn-success" name="reset">Reset</button> -->
                            <a href="index.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                        </form>
                        <!-- CSV Export link -->
                        <span class="export-btn"><a href="csv_export.php" class="btn btn-success "><i class="dwn"></i> Export</a></span>
                        <!-- <span class="export-btn"><button class="btn btn-success" type="submit" name="export"><i class="dwn"></i> Export</button></span> -->
                    </div> 
                    
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="report-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Report Details</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include 'range.php'?>	
                                    <!--  -->
                                </tbody>
                            </table>
                            <?php 
                                if($results){
                                   echo $paginator->createLinks( $links, 'pagination pagination-sm' ); 
                                }
                            ?>
                            
                        </div>
                    </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 
    <!-- footer -->
    <?php include_once "admin_footer.php"; ?>
