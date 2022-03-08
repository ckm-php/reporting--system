<?php include 'header.php'; ?>

<?php include 'admin_topmenu.php' ?>

<?php
    include '../function.php';
    $data = new Common();

    require_once('../pagination/pagination_start.php');
    $table = 'admin'; 
    $datas = $data->getAllData("SELECT * FROM $table ORDER BY id DESC LIMIT $offset, $total_records_per_page");

    // print_r($datas);
    // die();

    $result_count = count($datas);
    $total_no_of_pages = ceil($result_count / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;
?>

<div class="container">

    <div class="d-flex justify-content-end">
        <div class="btn btn-primary report-new mt-3 float-right">
            <a href="new_user.php" class="text-white"><i class="fas fa-plus"></i> Create New User</a>
        </div>
    </div>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datas as $row){ ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['eamil'] ?></td>
                <td>
                    <?php
                        if($row['status'] == 0) {
                            echo "<span class='text-primary text-bold'> Activate </span>";
                        }else {
                            echo "<span class='text-danger text-bold'> Deactivate </span>";
                        }
                    ?>
                </td>
                <td>
                <a href="manageEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                <a href="manageDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if($datas):?>
        <ul class="pagination">
            <?php
                include_once('../pagination/pagination_end.php');
            ?>
        </ul>
    <?php endif;?>
       
</div>

<?php include 'header.php'; ?>