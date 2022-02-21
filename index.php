<?php 
    include_once "admin_header.php"; 

    include_once 'admin/model/pagination.php';

    $commons = new Common;
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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Report Lists
                        </h1>
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
                                <input type="date" class="form-control" placeholder="Start"  name="startdate"/>
                            <label>To</label>
                                <input type="date" class="form-control" placeholder="End"  name="enddate"/>
                            <select class="form-control" name="user">
                                <?php  
                                    $sql = "SELECT * FROM `user`";
                                    // print_r($sql);
                                    $users = $commons->getAllRow($sql);
                                    // print_r($users);
                                    foreach($users as $user):
                                ?> 
                                    <option value="<?php echo $user['id'];?>"> 
                                        <?php echo $user['name']; ?> 
                                    </option> 
                                <?php  
                                    endforeach;
                                ?> 
                            </select>
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" aria-label="Search">
                            <button class="btn btn-primary" type="submit" name="searchdate">
                                <span class="glyphicon glyphicon-search"></span>
                            </button> 
                            <!-- <button class="btn btn-success" name="reset">Reset</button> -->
                            <a href="index.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                        </form>
                        <!-- CSV Export link -->
                        <span class="export-btn"><a href="admin/model/csv_export.php" class="btn btn-success "><i class="dwn"></i> Export</a></span>
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
                            <?php echo $paginator->createLinks( $links, 'pagination pagination-sm' ); ?>
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
