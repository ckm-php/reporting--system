<?php 
    include_once "../model/mysession.php"; 

    if(!isset($_SESSION['id'])) {
        die('Direct access not allowed');
        exit();
    }

    include '../include/header.php';
    include_once "../controller/edit_report.php";

    $id = $_GET['edit_id'];
    // print_r($id);
    // exit();
    $query = "SELECT * FROM report WHERE id='$id'";
    $result = $commons->getRow($query);

?>
<div id="wrapper">
    <?php include '../include/nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Edit Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Edit Report</a></li>
                <li class="active">Data</li>
            </ol> 						
        </div>
		
        <div id="page-inner">     
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Edit Report
                        </div>
                        <div class="panel-body">
                            <?php if($_SESSION['id'] == $result['user_id']) {?>
                            <form role="form" action="" method="post">
                                <?php 
                                    if (checkSession("error_report") &&  getSession('error_report') != '') {
                                        echo '<h5 class=" text-danger"> ' . getSession('error_report') . ' </h5>';
                                        unset($_SESSION['error_report']);                 
                                    }elseif (checkSession("success_report") &&  getSession('success_report') != ''){
                                        echo '<h5 class=" text-danger"> ' . getSession('success_report') . ' </h5>';
                                        unset($_SESSION['success_report']);
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="date">Choose Date</label>
                                    <input type="date" class="form-control" name="date" id="date" required value="<?php echo $date; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Report Details</label>
                                    <textarea class="form-control" rows="3" name="detail" id="detail" required><?php echo $detail; ?></textarea>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" name="update_report" class="btn btn-primary">Update Report</button>
                                </div>
                            </form>
                            <?php }?>
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