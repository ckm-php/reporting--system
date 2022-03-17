<?php 
    include 'header.php';
    include 'nav.php';
    include 'sidebar.php';
 ?>

<div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Management Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Management Profile</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="nameInput" value="<?= $_SESSION['admin_name'] ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="emailInput" value="<?= $_SESSION['admin_email']; ?>" readonly>
                        </div>
                        <a href="management.php" class="btn btn-secondary"> Cancel</a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
</div>

<?php include 'footer.php' ?>