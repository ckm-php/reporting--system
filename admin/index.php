    <?php include 'header.php'; 
    ?>
    
    <div class="container-fluid">
        <header>
            <h3 class="head-title text-primary">Admin View</h3>
            <span class="text-primary">adafaf</span>
            <?php echo $_SESSION['user']; ?>
            <a href="../logout.php" class="head-log btn btn-outline-danger">Logout</a>
        </header>
        <div class="d-flex justify-content-around mt-3">
            <form class="example" action="action_page.php">
                <input type="text" placeholder="Search.." name="search" class="input-search">
                <button type="submit" class="btn-submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="p-2 bg-info text-white">
                <a href="" class="csv-link">Export Csv</a>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
