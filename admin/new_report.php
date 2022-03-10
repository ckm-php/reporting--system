<?php 
    include 'header.php';
 ?>
<div class="container-fluid">
    <?php include 'top_menu.php' ?>
    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="reportAct.php" method="post" name="report_validate">
                <input type="hidden" name="id" value="<?= $_SESSION['id']?>">
                <div class="form-group mb-3">
                    <label for="datepicker">Date</label>
                    <input type="text" id="datepicker" class="form-control" name="date" placeholder="yyyy-mm-dd">
                </div>
                <div class="form-group mb-4">
                    <label for="report">Report</label>
                    <textarea class="form-control" name="report" id="report" rows="5" placeholder="Report ..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                <a href="report_list.php" class="btn btn-secondary">Cancel</a>
                
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>