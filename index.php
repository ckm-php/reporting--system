 <?php include 'header.php' ?>
 <div class="container-fluid">
    <header>
        <h3 class="head-title text-primary">Reporting System</h3>
        <a href="login.php" class="head-log btn btn-outline-warning text-primary">Login</a>
    </header>
    <div class="d-flex justify-content-around mt-3">
        <form class="example" action="action_page.php">
            <input type="text" placeholder="Search.." name="search" class="input-search">
            <button type="submit" class="btn-submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="p-2 bg-success text-white">
            <a href="" class="csv-link">Export Csv</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped mt-5">
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Report</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>26.1.2022</td>
                    <td>jadf;akfj;a</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>27.1.2022</td>
                    <td>jadf;akfj;a</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>28.1.2022</td>
                    <td>jadf;akfj;a</td>
                </tr>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'footer.php' ?>
