<?php include 'header.php'; 
    ?>
    <?php 
        include '../function.php';
        $name = $_SESSION['user'];
        $data = new Common();
        //  $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ? ORDER BY date DESC", [$_SESSION['id']]);
        $_SESSION['fromDate'] = $_POST['fromDate'];
        $_SESSION['toDate'] = $_POST['toDate'];

        require_once('../pagination/pagination_start.php');

        $table = 'report'; 
        $query = $data->getAllData("SELECT * FROM $table WHERE adminId = ? ORDER BY date DESC", [$_SESSION['id']]);
        $result_count = count($query);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;  
        $datas = $data->getAllData("SELECT * FROM $table WHERE adminId = ? ORDER BY date DESC LIMIT $offset, $total_records_per_page", [$_SESSION['id']]);

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
                <input type="date" name="toDate" id="to" class="date-search" value="<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>" placeholder="To.....">
                <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
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
            <?php
                if(isset($_POST['search'])) {
                $keyword = $_POST['keyword'];
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                if(!empty($fromDate) && !empty($toDate)) {
                    $datas = $data->getAllData("SELECT * FROM report WHERE date between '".$fromDate."' and '".$toDate."' ");
                }else {
                    $datas = $data->getAllData("SELECT * FROM report date LIKE '%$keyword%' OR report LIKE '%$keyword%' AND '".$id."' ");
                }
            ?>
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
                       <?php
                            if($datas) {
                                foreach($datas as $row){
                                    $i = 1;
                       ?>
                       <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $name ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['report'] ?></td>
                            <td>
                               <a href="reportEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                               <a href="reportDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                       </tr>
                       <?php
                         }
                            $i++;}
                            else {
                       ?>
                        <tr>
                            <td colspan="5" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
                        </tr>
                        <?php } ?>
                   </tbody>
                </table>

                <?php } else {  ?>

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
                       <?php
                            if($datas) { 
                                foreach($datas as $row){
                       ?>
                       <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $name ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['report'] ?></td>
                            <td>
                               <a href="reportEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                               <a href="reportDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                       </tr>
                       <?php
                            }
                                } 
                                else {
                       ?>
                       <tr>
                            <td colspan="5" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
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
                        include_once('../pagination/pagination_end.php');
                    ?>
                </ul>
                <?php } ?>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <?php include 'footer.php' ?>
