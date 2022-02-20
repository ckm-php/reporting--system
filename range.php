<?php
    //  include "admin/model/common.php";
     $commons = new Common;

     $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3;
     $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
     $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    
?>   
<?php
    if(isset($_POST['searchdate'])){
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $searchvalue = $_POST['searchvalue'];

        $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
        $conditions = array();

        if(! empty($startdate) || ! empty($enddate) ) {
        $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`name`, `date`, `report_details`) LIKE '%".$searchvalue."%'";
        }

        $sql = $query;
        if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY report.date DESC";
        }

        // $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id WHERE report.date BETWEEN '$startdate' AND '$enddate' ORDER BY report.date DESC";
        $row = $commons->getAllRow($sql);
        $paginator  = new Pagination( $commons->pdo, $sql );
        $results    = $paginator->getData( $limit, $page );
        if($row>0){
            for( $i = 0; $i < count( $results->data ); $i++ ) :
    ?>
                <tr>
                    <td><?php echo $results->data[$i]['name'];?></td>
                    <td><?php echo $results->data[$i]['report_details'];?></td>
                    <td><?php echo $results->data[$i]['date'];?></td>
                </tr>
    <?php
            endfor;
        }else{
    ?>
            <tr>
                <td colspan = "3"><center><?php echo "Record Not Found";?></center></td>
            </tr>
    <?php
        }
       
    }else{
        $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id ORDER BY report.date DESC";
        $paginator  = new Pagination( $commons->pdo, $query );
        $results    = $paginator->getData( $limit, $page );
        
        for( $i = 0; $i < count( $results->data ); $i++ ) :
    ?>
            <tr>
                <td><?php echo $results->data[$i]['name'];?></td>
                <td><?php echo $results->data[$i]['report_details'];?></td>
                <td><?php echo $results->data[$i]['date'];?></td>
            </tr>
    <?php
       endfor;
    }

?>

