<?php
    //  include "admin/model/common.php";
    // session_start();
    $commons = new Common();

     $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20;
     $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
     $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
     $id = $_SESSION['id'];
    //  $user = $_SESSION['id'];
?>   
<?php
    if(isset($_POST['usersearch'])){

        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $searchvalue = $_POST['searchvalue'];
        if (isset ($user)&&$user!=""){  
            $user = $_POST['user'];
        }
        $role = $_POST['role'];
        $status = $_POST['status'];

        $query = "SELECT * FROM user";
        $conditions = array();

        if(! empty($startdate) || ! empty($enddate) ) {
        $conditions[] = "user.created_date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($user) && $user!="" ) {
            $conditions[] = "id='$user'";
        }
        if(! empty($role) && $role!="" ) {
            $conditions[] = "role='$role'";
        }
        if(! empty($status) && $status!="" ) {
            $conditions[] = "status='$status'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`name`, `email`, `role`, `status`, `created_date`) LIKE '%".$searchvalue."%'";
        }

        // $query = "SELECT * FROM user WHERE " . implode(' AND ', $conditions) ." ORDER BY user.created_date DESC";
        
        if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY user.created_date DESC";
        }
        $rows = $commons->getAllRow($query);

        
        if($rows) { 
            $paginator  = new Pagination( $commons->pdo, $query );
            $results    = $paginator->getData( $limit, $page );
            $j=1;
            for( $i = 0; $i < count( $results->data ); $i++ ) :
        ?>
            <tr <?php if($results->data[$i]['status'] == "deactivate"){ ?>class="disableduser"<?php } ?>>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $results->data[$i]['name']; ?></td>
                    <td><?php echo $results->data[$i]['email']; ?></td>
                    <td><?php echo $results->data[$i]['role']; ?></td>
                    <td><?php echo $results->data[$i]['status']; ?></td>
                    <td><?php echo $results->data[$i]['created_date']; ?></td>
                    <td><a href="user_edit.php?edit_id=<?php echo  $results->data[$i]['id']; ?>" formaction="" class="btn btn-xs btn-success con_edit">Edit</a></td>
                    <td><a href="user_lists.php?del_id=<?php echo  $results->data[$i]['id']; ?>" class="btn btn-xs btn-danger con_del">Delete</a></td> 
                    
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
        $query = "SELECT * FROM user ORDER BY user.created_date DESC";
        // $rows = $commons->getAllRow($query);
        $paginator  = new Pagination( $commons->pdo, $query );
        $results    = $paginator->getData( $limit, $page );
        $j=1;
        for( $i = 0; $i < count( $results->data ); $i++ ) :
    ?>
                <tr <?php if($results->data[$i]['status'] == "deactivate"){ ?>class="disableduser"<?php } ?>>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $results->data[$i]['name']; ?></td>
                    <td><?php echo $results->data[$i]['email']; ?></td>
                    <td><?php echo $results->data[$i]['role']; ?></td>
                    <td><?php echo $results->data[$i]['status']; ?></td>
                    <td><?php echo $results->data[$i]['created_date']; ?></td>
                    <td><a href="user_edit.php?edit_id=<?php echo  $results->data[$i]['id']; ?>" formaction="" class="btn btn-xs btn-success con_edit">Edit</a></td>
                    <td><a href="user_lists.php?del_id=<?php echo  $results->data[$i]['id']; ?>" class="btn btn-xs btn-danger con_del">Delete</a></td> 
                    <!-- <td><a href="list_report.php?del_id=<?php echo  $results->data[$i]['id']; ?>" class="btn btn-xs btn-danger confirm_del">Delete</a></td> -->
                    
                
                </tr>
    <?php
            endfor;
    }

?>