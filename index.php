 <?php include 'header.php'; ?>
 <?php
    session_start();
    include 'function.php';
    $data = new Common();
    $datas = $data->getAllData("SELECT * FROM report ORDER BY date");
    $_SESSION['keyword'] = $_POST['keyword'];
    $_SESSION['search'] = $_POST['search'];

 ?>
 <div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Reporting System</h3>
        <a href="login.php" class="head-log btn btn-outline-warning text-primary">Login</a>
    </header>
    <div class="d-flex justify-content-around mt-3">
        <form class="example" action="" method="post">
            <input type="text" placeholder="Search.." name="keyword" class="input-search">
            <label for="from">From</label>
            <input type="date" name="from-keywoard" class="date-search" id="from" placeholder="From.....">
            <label for="to">To</label>
            <input type="date" name="to-keyword" class="date-search" id="to" placeholder="To.....">
            <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="p-2 bg-success text-white">
            <a href="exportCsv.php" class="csv-link">Export Csv</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php
                if(isset($_POST['search'])) {
                $keyword = $_POST['keyword'];

                $adminData = $data->getAllData("SELECT * FROM admin WHERE name like '%$keyword%' ");
                if(sizeof($adminData) > 0) {
                    $id = $adminData[0]['id'];
                $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ?", [$id]);
                } else {
                    $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%' ");
                }
            ?>
            <table class="table table-striped mt-5">
               <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Report</th>
                    </tr>
               </thead>
                <tbody>
                    <?php
                        if($datas) { 
                        foreach($datas as $value) { 
                        $getnum = $data->getOneRowData("SELECT name FROM admin WHERE id = ? ", [$value['adminId']]);
                    ?>
                        <tr>
                            <td><?= $getnum['name']; ?></td>
                            <td><?= $value['date']; ?></td>
                            <td><?= $value['report']; ?></td>
                        </tr>
                    <?php 
                        }
                        } else {                    
                     ?>
                    <tr>
                        <td colspan="3" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <table class="table table-striped mt-5">
               <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Report</th>
                    </tr>
               </thead>
                <tbody>
                    <?php
                        if($datas) { 
                        foreach($datas as $value) { 
                        $getnum = $data->getOneRowData("SELECT name FROM admin WHERE id = ? ", [$value['adminId']]);
                    ?>
                        <tr>
                            <td><?= $getnum['name']; ?></td>
                            <td><?= $value['date']; ?></td>
                            <td><?= $value['report']; ?></td>
                        </tr>
                    <?php 
                        }
                        } else {                    
                     ?>
                    <tr>
                        <td colspan="3" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include 'footer.php'; ?>
