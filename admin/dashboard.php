<?php 
    include "model/mysession.php"; 
    include "model/common.php";
    include 'include/header.php';
    include "controller/delete_report.php";
    $commons = new Common;
    $id = $_SESSION['id'];
    $results = $commons->getAllRow("SELECT * FROM report WHERE user_id='$id'");
?>
<div id="wrapper">
    <?php include 'include/nav.php';?>
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:200px;">No</th>
                                            <th style="width:500px;">Date</th>
                                            <th>Report Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($results as $result ) : ?>
                                        <tr class="odd">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $result['date']; ?></td>
                                            <td><?php echo $result['report_details']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
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

<?php include 'include/footer.php';?>