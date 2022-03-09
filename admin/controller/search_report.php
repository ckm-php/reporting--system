<?php
    
    require_once "../model/common.php";
    
    // session_start();
    $commons = new Common();

     $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20;
     $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
     $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
     $id = $_SESSION['id'];
?>   
<?php
    if(isset($_POST['search'])){
        // $id = $_SESSION['id'];
        // $results = $commons->getAllRow("SELECT * FROM report WHERE user_id='$id'");
       
        // echo $id;
        // exit();
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $searchvalue = $_POST['searchvalue'];
       
        // $query = "SELECT * FROM report";
        $conditions = array();

        $conditions[] = "user_id = '$id'";

        if(! empty($startdate) || ! empty($enddate) ) {
        $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`date`, `report_details`) LIKE '%".$searchvalue."%'";
        }

        $query = "SELECT * FROM report WHERE " . implode(' AND ', $conditions) ." ORDER BY report.date DESC";

        // $sql = $query;
        // if (count($conditions) > 0) {
        //     $sql = " WHERE " . implode(' AND ', $conditions) ." ORDER BY report.date DESC";
        // }

        // $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id WHERE report.date BETWEEN '$startdate' AND '$enddate' ORDER BY report.date DESC";
        $rows = $commons->getAllRow($query);

        
        if($rows) { 
            $paginator  = new Pagination( $commons->pdo, $query );
            $results    = $paginator->getData( $limit, $page );
            $j=1;
            for( $i = 0; $i < count( $results->data ); $i++ ) :
        ?>
                <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $results->data[$i]['date']; ?></td>
                    <td><?php echo $results->data[$i]['report_details']; ?></td>
                    <td><a href="edit_report.php?edit_id=<?php echo  $results->data[$i]['id']; ?>" formaction="" class="btn btn-xs btn-success confirm_edit">Edit</a></td>
                    <td><a href="report_lists.php?del_id=<?php echo  $results->data[$i]['id']; ?>" class="btn btn-xs btn-danger confirm_del">Delete</a></td>
                </tr>
        <?php
                endfor;
        }else{
    ?>
            <tr>
                <td colspan = "3"><center>Record Not Found</center></td>
            </tr>
    <?php
        }
       
    }else{
        $query = "SELECT * FROM report WHERE user_id='$id' ORDER BY report.date DESC";
        // $rows = $commons->getAllRow($query);
        $paginator  = new Pagination( $commons->pdo, $query );
        $results    = $paginator->getData( $limit, $page );
        $j=1;
        for( $i = 0; $i < count( $results->data ); $i++ ) :
    ?>
                <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $results->data[$i]['date']; ?></td>
                    <td><?php echo $results->data[$i]['report_details']; ?></td>
                    <td><a href="edit_report.php?edit_id=<?php echo  $results->data[$i]['id']; ?>" formaction="" class="btn btn-xs btn-success confirm_edit">Edit</a></td>
                    <td><a href="report_lists.php?del_id=<?php echo  $results->data[$i]['id']; ?>" class="btn btn-xs btn-danger confirm_del">Delete</a></td>
                </tr>
    <?php
            endfor;
    }

?>

