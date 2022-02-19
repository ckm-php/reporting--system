<?php include 'header.php'; 
    ?>
    <?php 
        include '../function.php';
        $name = $_SESSION['user'];
        $data = new Common();
        $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ?", [$_SESSION['id']]);
    ?>
    
    <div class="container-fluid">
        <!-- top menu -->
        <?php include 'top_menu.php' ?>

        <div class="d-flex justify-content-around mt-3">
            <form class="example" action="action_page.php">
                <!-- <input type="text" placeholder="Search.." name="search" class="input-search"> -->
                <input type="date" name="fromDate" class="date-search" placeholder="From.....">
                <input type="date" name="toDate" class="date-search" placeholder="To.....">
                <button type="submit" name="search" class="btn-submit"><i class="fa fa-search"></i></button>
            </form>
            <!-- add report -->
           <div class="btn btn-success report-new">
               <a href="new_report.php" class="text-white">Add New Report</a>
           </div>

            <div class="p-2 bg-info text-white">
                <a href="adminExport.php" class="csv-link">Export Csv</a>
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
                }
               
                else {
                    $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%' ");
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
                       ?>
                       <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $name ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['report'] ?></td>
                            <td>
                               <a href="reportEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                               <a href="reportDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                       </tr>
                       <?php
                         }
                            }
                            else {
                       ?>
                        <tr>
                            <td colspan="3" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
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
                               <a href="reportDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                       </tr>
                       <?php
                            }
                                } 
                                else {
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

    <?php include 'footer.php' ?>
