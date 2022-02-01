<?php 
    include 'header.php';
    session_start();
 ?>
<div class="container-fluid">
    <?php include 'top_menu.php' ?>
    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                if(isset($_GET['msg'])) {
                    $message ="Data Insert Not Success";
                    echo "<div class='alert alert-danger'>".$message."</div>";
                }
            ?>
            <form action="reportAct.php" method="post" name="report_validate">
                <input type="hidden" name="id" value="<?= $_SESSION['id']?>">
                <div class="form-group mb-3">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="form-group mb-4">
                    <label for="report">Report</label>
                    <textarea class="form-control" id="report" name="report" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>