 <?php include 'header.php'; ?>
 <?php
    session_start();
    include 'function.php';
    $data = new Common();
    // $datas = $data->getAllData("SELECT * FROM report ORDER BY date DESC");
    $_SESSION['keyword'] = $_POST['keyword'];
    $_SESSION['search'] = $_POST['search'];
    $_SESSION['fromDate'] = $_POST['fromDate'];
    $_SESSION['toDate'] = $_POST['toDate'];
    $_SESSION['username'] = $_POST['username'];
   
    require_once('pagination/pagination_start.php');

 ?>
 <div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Reporting System</h3>
        <a href="/admin/login.php" class="head-log btn btn-outline-warning text-primary">Login</a>
    </header>
    <div class="d-flex justify-content-around mt-3">
        <form class="example" action="" method="post">
            <input type="text" placeholder="Search.." name="keyword" value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword']; ?>" class="input-search">
            <select name="username" class="userDrop">
                <option value="">All</option>
                <?php
                    $names= $data->getAllData("SELECT * FROM admin");
                    foreach($names as $row):
                ?>
                <option value="<?= $row['id'] ?>" <?php if($row['id'] == $_POST['username']) { echo "selected"; } ?> > 
                <?= $row['name'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label for="fromdatepicker">From</label>
            <input type="text" id="fromdatepicker" name="fromDate" class="date-search" value="<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>" placeholder="yyy-mm-dd ">
            <label for="todatepicker">To</label>
            <input type="text" id="todatepicker" name="toDate" class="date-search" value="<?php if(isset($_POST['toDate'])) echo $_POST['toDate']; ?>" placeholder="yyy-mm-dd ">
            <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
            <a href="index.php" class="btn btn-secondary refresh-icon"><i class="fas fa-sync-alt"></i></a>
        </form>
        <div class="p-2 bg-success text-white">
            <a href="exportCsv.php" class="csv-link">Export Csv</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 table-td-style">
            <table class="table table-striped mt-5">
               <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Report</th>
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
                        include_once('pagination/pagination_end.php');
                    ?>
                </ul>
            <?php endif;?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include 'footer.php'; ?>
