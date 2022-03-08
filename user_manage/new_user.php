<?php include 'header.php'; ?>

<?php include 'admin_topmenu.php' ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="createAct.php" method="post" name="create_validate">
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
                <div>
                    <button type="submit" name="create" class="btn btn-primary">Create</button>
                    <a href="management.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>