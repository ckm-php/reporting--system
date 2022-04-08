<?php include 'header.php'; ?>

<?php 
    include 'nav.php';
    include 'sidebar.php';
?>

<div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">New User</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <?php
                            if(isset($_GET['exist'])) {
                                $exist = "Email or Name already exist, try something else.";
                                echo '<div class="alert alert-danger">'. $exist .'</div>';
                            }
                        ?>
                        <form action="createAct.php" method="post" name="create_validate" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="nameInput" placeholder="Enter Name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-control" name="status" id="status">
                                    <option selected value="0">Activate</option>
                                    <option value="1">Deactivate</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter Email">
                            </div>
                            <div class="mb-4">
                                <label for="passInput" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passInput" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-4">
                                <label for="img" class="form-label">Choose a profile Image</label><br>
                                <input type="file" id="img" name="image">
                            </div>
                            <div class="mb-4">
                                <button type="submit" name="create" class="btn btn-primary">Create</button>
                                <a href="management.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
</div>
<?php include 'footer.php'; ?>