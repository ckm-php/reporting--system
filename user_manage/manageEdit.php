<?php 
    include 'header.php';
    include '../function.php';
    $data = new Common();
    $id = $_GET['edit'];
    $result = $data->getOneRowData("SELECT * FROM admin WHERE id = ?", [$id]);
    include 'nav.php';
    include 'sidebar.php';
 ?>
 <div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Management Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Management Edit</li>
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
                        <form action="manageUpdate.php?update=<?= $result['id']?>" method="post" name="create_validate">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="nameInput" value="<?= $result['name'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-control" name="status" id="status">
                                    <option selected value="0" <?php if($result['status'] == 0) echo 'selected="selected"'; ?> >Activate</option>
                                    <option value="1" <?php if($result['status'] == 1) echo 'selected="selected"'; ?>>Deactivate</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="emailInput" value="<?= $result['email'] ?>" >
                            </div>
                            <div>
                                <button type="submit" name="create" class="btn btn-primary">Update</button>
                                <a href="management.php" class="btn btn-secondary">Cancel</a>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
</div>

<?php include 'footer.php' ?>