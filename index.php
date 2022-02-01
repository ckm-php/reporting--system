<?php 
    include 'header.php';
    $commons = new Common;
    $results = $commons->getAllRow("SELECT * FROM report INNER JOIN user ON report.user_id=user.id");
?>
<div id="wrapper">
    <div id="container" >
        <div class=""> 
            <h1 class="page-header">
                Report Lists
            </h1>				
        </div>
		
        <div>     
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
                                            <th style="width:400px;">Date</th>
                                            <th>Email</th>
                                            <th>Report Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach($results as $result ) : ?>
                                        <tr class="odd">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $result['date']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
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

<?php include 'footer.php';?>