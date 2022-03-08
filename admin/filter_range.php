<?php
    if(isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];

        // echo $keyword;
        // die();
        $condition = [];

        if(!empty($keyword) ) {
            $condition[] = " CONCAT(`date`, `report`) LIKE '%".$keyword."%' AND adminId = $id ";
        }

        if(!empty($fromDate) && !empty($toDate) )  {
            $condition[] = " date BETWEEN '".$fromDate."' AND '".$toDate."' AND adminId = $id"; 
        }

        $query = "SELECT * FROM report ";

        if($condition) {
            $query .= "WHERE ".implode('AND', $condition) ." ORDER BY date DESC LIMIT $offset, $total_records_per_page";
        }

        if(!$condition) {
            $query = "SELECT * FROM report WHERE adminId = $id  ORDER BY date DESC LIMIT $offset, $total_records_per_page";
        }

        $datas = $data->getAllData($query);
        
        $result_count = count($datas);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;
       
        
        if($datas) {
            foreach($datas as $row){
           
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $name ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['report'] ?></td>
            <td>
                <a href="reportEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                <a href="reportDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
        }
           } else {
        ?>
            <tr>
                <td colspan="5" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
            </tr>
        <?php } 
    }
    else {
        $table = 'report'; 
        $datas = $data->getAllData("SELECT * FROM $table WHERE adminId = ? ORDER BY date DESC LIMIT $offset, $total_records_per_page", [$_SESSION['id']]);

        $result_count = count($datas);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;

        // echo $id;
        // die();
        if($datas) { 
            foreach($datas as $row){
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $name ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['report'] ?></td>
            <td>
                <a href="reportEdit.php?edit=<?= $row['id']?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a> 
                <a href="reportDelete.php?delete=<?= $row['id']?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
        }
           } else {
        ?>
            <tr>
                <td colspan="5" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
            </tr>
        <?php } 
    }
?>