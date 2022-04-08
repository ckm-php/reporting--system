<?php include 'header.php'; ?>

<?php
    include '../function.php';
    $data = new Common();

    require_once('../pagination/pagination_start.php');
    $table = 'admin';
    $result = $data->getAllData("SELECT * FROM $table");
    $result_count = count($result);
    $total_no_of_pages = ceil($result_count / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;

    $datas = $data->getAllData("SELECT * FROM $table ORDER BY id DESC LIMIT $offset, $total_records_per_page");

    include 'nav.php';
    include 'sidebar.php';
?>

<div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <?php
                    if(isset($_GET['exist'])) {
                        $exist = "Email or Name already token, try something else.";
                        echo '<div class="alert alert-danger">'. $exist .'</div>';
                    }
                    if(isset($_GET['passnomatch'])) {
                        $passnomatch = "Password does not match";
                        echo '<div class="alert alert-danger">'. $passnomatch .'</div>';
                    }
                    if(isset($_GET['success'])) {
                        $success = "Password Changed Successfully";
                        echo '<div class="alert alert-success">'. $success .'</div>';
                    }
                ?>
                
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach($datas as $row){ ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
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
                                <?php if($row['image'] != '') {?>
                                    <img src="../photo/<?= $row['image']?>" alt="admin image" width="100px" height="100px">
                                <?php } else {?>
                                    <img src="../photo/default_img.png" alt="default image" width="100px" height="100px">
                                <?php } ?>
                            </td>
                            <td>
                            <a href="manageEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                            <a href="manageDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                            $i++; 
                            } 
                        ?>
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
        </section>
</div>

<?php include 'footer.php'; ?>