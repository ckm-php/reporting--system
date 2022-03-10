<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../../"><strong><i class="icon fa fa-calendar"></i> Report</strong></a>
        <div id="sideNav">
            <i class="fa fa-bars icon"></i> 
        </div>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i><span style="color:black;"><?php echo $_SESSION['name'];?></span> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="user_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="signout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>
<!--/. NAV TOP  -->

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="nav-item">
                <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <!-- User Management -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
                    <i class="fa fa-sitemap"></i><span>User Management</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#main-menu">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="user_lists.php"><i class="fa fa-list"></i>User Lists</a>
                            </li>
                            <li>
                                <a href="user_create.php"><i class="fa fa-edit"></i>User Create Form</a>
                            </li>
                        </ul>
                    
                    </div>
                </div>
            </li>
            <!-- Report -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
                    <i class="fa fa-list-alt"></i><span>Report Management</span>
                </a>
                <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#main-menu">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="report_lists.php"><i class="fa fa-list"></i>Report Lists</a>
                            </li>
                            <li>
                                <a href="create_report.php"><i class="fa fa-edit"></i>New Report Form</a>
                            </li>
                        </ul>
                    
                    </div>
                </div>
            </li>
            
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->