<?php 
    
    include_once "../model/mysession.php"; 

    if(!isset($_SESSION['id'])) {
        die('Direct access not allowed');
        exit();
    }
    
    include '../include/header.php';
    include_once "../controller/create_report.php";
?>
<div id="wrapperadd">
    <?php include '../include/nav.php';?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                New Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">New Report</a></li>
                <li class="active">Report</li>
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
                                    <button type="submit" name="report" class="btn btn-primary">Add New Report</button>
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

<?php include '../include/footer.php';?>

<script type="text/javascript">
    function press(event) {
            if (event.keyCode == 13 && !event.shiftKey) {
                
                //Stops enter from creating a new line
                event.preventDefault(); 
             
            }

        }
});
</script>


