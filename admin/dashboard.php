<?php include 'header.php'; ?>
    <?php 
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
     <?php include 'nav.php'; ?>

    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="d-flex justify-content-around mt-3">
                    <form  method="post">
                        <input type="text" placeholder="Search.." name="keyword" class="input-search" value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword']; ?>">
                        <label for="fromdatepicker2">From</label>
                        <input type="text" id="fromdatepicker2" name="fromDate" class="date-search" value="<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>" placeholder="yyyy-mm-dd">
                        <label for="todatepicker2">To</label>
                        <input type="text" id="todatepicker2" name="toDate" class="date-search" value="<?php if(isset($_POST['toDate'])) echo $_POST['toDate']; ?>" placeholder="yyyy-mm-dd">
                        <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
                        <a href="dashboard.php" class="btn btn-secondary refresh-icon"><i class="fas fa-sync-alt"></i></a>
                    </form>

                    <div class="p-2 bg-info text-white">
                        <a href="adminExport.php" class="csv-link">Export Csv</a>
                    </div>
                
                </div>
                <div class="table-td-style">
                    <table class="table table-striped mt-5">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Date</th>
                                <th class="reportdetail">Report Detail</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php include 'dash_filter_range.php'; ?>
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
            </div>
        </section>
    </div>

    <?php include 'footer.php' ?>
    
