<?php 
    include 'header.php';
    include 'function.php';
    $data = new Common();
    $id = $_GET['edit'];
    $result = $data->getOneRowData("SELECT * FROM report WHERE id = ?", [$id]);
 ?>
<div class="container-fluid">
    <?php include 'top_menu.php' ?>
    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="reportUpdate.php?update=<?= $result['id']?>" method="post" name="report_validate">
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <div class="form-group mb-3">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="<?= $result['date']?>">
                </div>
                <div class="form-group mb-4">
                    <label for="report">Report</label>
                    <textarea class="form-control" id="report" name="report" rows="3"><?= $result['report'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>