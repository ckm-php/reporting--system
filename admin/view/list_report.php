<?php 
    include_once "../model/mysession.php"; 
    if(!isset($_SESSION['id'])) {
        die('Direct access not allowed');
        exit();
    }
    // include_once "../model/common.php";
    include '../include/header.php';
    include "../controller/delete_report.php";
    include '../model/pagination.php';
   
    $commons = new Common();
    $_POST['id'] = $_SESSION['id'];
    
    // $results = $commons->getAllRow("SELECT * FROM report WHERE user_id='$id'");
    
    if(isset($_POST['startdate'])){$_SESSION['startdate'] = $_POST['startdate'];}
    if(isset($_POST['enddate'])){$_SESSION['enddate'] = $_POST['enddate'];}
    if(isset($_POST['searchvalue'])){$_SESSION['searchvalue'] = $_POST['searchvalue'];}
?>
<div id="wrapper">
    <?php include '../include/nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Report Lists
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Report Lists
                        </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <!-- Search Date -->
                                <form class="form-inline search-box" method="post">
                                    <label for="startdate">Date: From</label>
                                        <input type="date" class="form-control" placeholder="Start"  name="startdate" value="<?php if(isset($_POST['startdate'])) echo $_POST['startdate']; ?>" />
                                    <label for="enddate">To</label>
                                        <input type="date" class="form-control" placeholder="End"  name="enddate" value="<?php if(isset($_POST['enddate'])) echo $_POST['enddate']; ?>" />
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" value="<?php if(isset($_POST['searchvalue'])) echo $_POST['searchvalue']; ?>">
                                    <button class="btn btn-primary" type="submit" name="search">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button> 
                                    <!-- <button class="btn btn-success" name="reset">Reset</button> -->
                                    <a href="list_report.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                                </form>
                                <!-- CSV Export link -->
                                <span class="export-btn"><a href="../controller/csv_export.php" class="btn btn-success "><i class="dwn"></i> Export</a></span>
                            </div> 
                            
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="report-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="8%">No</th>
                                                <th width="10%">Date</th>
                                                <th>Report Details</th>
                                                <th width="7%">Edit</th>
                                                <th width="7%">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include '../controller/search.php'?>	
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

<!-- 
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Report Details</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($results as $result ) : ?>
                                        <tr class="odd">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $result['date']; ?></td>
                                            <td><?php echo $result['report_details']; ?></td>
                                            <td><a href="edit_report.php?edit_id=<?php echo $result['id']; ?>" formaction="" class="btn btn-xs btn-success confirm_edit">Edit</a></td>
                                            <td><a href="list_report.php?del_id=<?php echo $result['id']; ?>" class="btn btn-xs btn-danger confirm_del">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> -->
                            
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

<?php include '../include/footer.php';?>

<script>
    $(function(){
        $('.confirm_del').click(function(){
            return confirm('Are you sure you want to delete!');
        });
        $('.confirm_edit').click(function(){
            return confirm('Are you sure you want to edit!');
        });
    });
</script>