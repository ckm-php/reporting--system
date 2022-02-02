<?php include 'header.php'; 
    ?>
    <?php 
        include 'function.php';
        $data = new Common();
        $datas = $data->getAllData("SELECT * FROM report");
    ?>
    
    <div class="container-fluid">
        <!-- top menu -->
        <?php include 'top_menu.php' ?>

        <div class="d-flex justify-content-around mt-3">
            <form class="example" action="action_page.php">
                <input type="text" placeholder="Search.." name="search" class="input-search">
                <input type="date" name="start-date" class="date-search" placeholder="From.....">
                <input type="date" name="end-date" class="date-search" placeholder="To.....">
                <button type="submit" class="btn-submit"><i class="fa fa-search"></i></button>
            </form>
            <!-- add report -->
           <div class="btn btn-success report-new">
               <a href="new_report.php" class="text-white">Add New Report</a>
           </div>

            <div class="p-2 bg-info text-white">
                <a href="" class="csv-link">Export Csv</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <?
                    if($_GET['msg']) {
                        echo $_GET['msg'];
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
                            foreach($datas as $row){
                            $data = new Common();
                            $name = $data->getOneRowData("SELECT * FROM admin WHERE id = ?", [$row['adminId']]);
                            $i=1;
                            if($name['id'] == $row['adminId']) {
                       ?>
                       <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $name['name']; ?></td>
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
                           $i++;
                       ?>
                   </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <?php include 'footer.php' ?>
