<?php 
    include_once "../model/mysession.php"; 

    if(!isset($_SESSION['id'])) {
        header("Location:../signin.php");
    }
    
    if($_SESSION['role']=="admin") {
        include_once '../include/admin_header.php';
    }else if($_SESSION['role']=="user") {
        include '../include/header.php';
    }
    include_once "../controller/create_report.php";

?>
<div id="wrapper">
    <?php
        if($_SESSION['role']=="admin") {
            include '../include/admin_nav.php';
        }else if($_SESSION['role']=="user") {
            include '../include/nav.php';
        }        
    ?>
   
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                New Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Report Create</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Create New Report
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="post" class="addreport">
                                <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']?>">
                                <div class="form-group">
                                    <label for="date">Choose Date</label>
                                    <input type="date" class="form-control" name="date" id="date" required />
                                </div>
                                <div class="form-group">
                                    <label for="detail">Report Details</label>
                                    <textarea class="form-control" rows="10" name="detail" id="detail" required></textarea>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="button" class="btn btn-primary cancel-btn"><a href="create_report.php">Reset</a></button>
                                    <button type="submit" name="report" class="btn btn-primary">Add New Report</button>
                                    <button type="button" class="btn btn-primary cancel-btn"><a href="report_lists.php">Cancel</a></button>
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



