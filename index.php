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

    // echo $_SESSION['fromDate'];
    // echo '<br>';
    // echo $_SESSION['toDate'];

    // $names= $data->getAllData("SELECT * FROM admin");
    // echo '<pre>';
    // print_r($names);
    // die();
   
    require_once('pagination/pagination_start.php');

      $table = 'report'; 
      $query = $data->getAllData("SELECT * FROM $table ORDER BY date DESC");
      $result_count = count($query);
      // print_r('<pre>');
      // print_r($result_count);
      // exit();
      $total_no_of_pages = ceil($result_count / $total_records_per_page);
      $second_last = $total_no_of_pages - 1;  
      $datas = $data->getAllData("SELECT * FROM $table ORDER BY date DESC LIMIT $offset, $total_records_per_page");

 ?>
 <div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Reporting System</h3>
        <a href="login.php" class="head-log btn btn-outline-warning text-primary">Login</a>
    </header>
    <div class="d-flex justify-content-around mt-3">
        <form class="example" action="" method="post">
            <input type="text" placeholder="Search.." name="keyword" value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword']; ?>" class="input-search">
            <select name="username" class="userDrop">
                <option value="all">All</option>
                <?php
                    $names= $data->getAllData("SELECT * FROM admin");
                    foreach($names as $row):
                ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="from">From</label>
            <input type="date" name="fromDate" class="date-search" id="from" value="<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>" placeholder="From.....">
            <label for="to">To</label>
            <input type="date" name="toDate" class="date-search" id="to" value="<?php if(isset($_POST['toDate'])) echo $_POST['toDate']; ?>" placeholder="To.....">
            <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
            <a href="index.php" class="btn btn-secondary refresh-icon"><i class="fas fa-sync-alt"></i></a>
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
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                $selectname = $_POST['username'];
                // echo $selectname;
                // echo $toDate;
                // exit();
               
                $adminData = $data->getAllData("SELECT * FROM admin WHERE name like '%$keyword%' ");
                // print_r($adminData);

                if(sizeof($adminData) > 0) {
                    $id = $adminData[0]['id'];
                $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ?", [$id]);
                }
                // elseif(!empty($selectname)) {
                //      $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ? ", [$selectname]);
                // }
                // elseif(!empty($fromDate) && !empty($toDate)) {
                //     $datas = $data->getAllData("SELECT * FROM report WHERE date between '".$fromDate."' and '".$toDate."' ");
                // }
                // elseif(!empty($keyword)) {
                //     $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%' ");
                // }
                // else {
                //     $datas = $data->getAllData("SELECT * FROM report");
                // }
                else { $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%' ");
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
            <!-- ====================== pagination ============================================ -->
            <?php
                $serialize_user = serialize($user_arr);
            ?>
            <textarea name="export_data" id="" style="display:none;"><?= $serialize_user; ?></textarea>
            <ul class="pagination">
                <?php
                    include_once('pagination/pagination_end.php');
                ?>
            </ul>
            <?php } ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include 'footer.php'; ?>
