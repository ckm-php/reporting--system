<?php include 'header.php'; ?>
    <?php 
        session_start();
        include '../function.php';
        $name = $_SESSION['user'];
        $id = $_SESSION['id'];
        $data = new Common();
        //  $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ? ORDER BY date DESC", [$_SESSION['id']]);
        $_SESSION['fromDate'] = $_POST['fromDate'];
        $_SESSION['toDate'] = $_POST['toDate'];
        $_SESSION['search'] = $_POST['search'];
        $_SESSION['keyword'] = $_POST['keyword'];

        require_once('../pagination/pagination_start.php');

    ?>
    
    <div class="container-fluid">
        <!-- top menu -->
        <?php include 'top_menu.php' ?>

        <div class="d-flex justify-content-around mt-3">
            <form  method="post">
                <input type="text" placeholder="Search.." name="keyword" class="input-search" value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword']; ?>">
                <label for="from">From</label>
                <input type="date" name="fromDate" id="from" class="date-search" value="<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>" placeholder="From.....">
                <label for="to">To</label>
                <input type="date" name="toDate" id="to" class="date-search" value="<?php if(isset($_POST['toDate'])) echo $_POST['toDate']; ?>" placeholder="To.....">
                <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
                <a href="index.php" class="btn btn-secondary refresh-icon"><i class="fas fa-sync-alt"></i></a>
            </form>

            <div class="p-2 bg-info text-white">
                <a href="adminExport.php" class="csv-link">Export Csv</a>
            </div>

            <!-- add report -->
           <div class="btn btn-success report-new">
               <a href="new_report.php" class="text-white">Add New Report</a>
           </div>

        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-striped mt-5">
                   <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Date</th>
                            <th>Report Detail</th>
                            <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
                       <?php include 'filter_range.php'; ?>
                   </tbody>
                </table>
                <!-- ====================== pagination ============================================ -->
                <?php if($datas):?>
                <ul class="pagination">
                    <?php
                        include_once('../pagination/pagination_end.php');
                    ?>
                </ul>
                <?php endif;?>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <?php include 'footer.php' ?>
