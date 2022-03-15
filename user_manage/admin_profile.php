<?php include 'header.php'; ?>

<?php include 'admin_topmenu.php' ?>

<div class="container">
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
            <a href="management.php" class="back-btn"><i class="fa-solid fa-share"></i> Back</a>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>