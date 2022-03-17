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

        $result_count = count($query);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;

        $datas = $data->getAllData($query);
        
        if($datas) {
            $i = 1;
            foreach($datas as $row){
           
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $name ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['report'] ?></td>
        </tr>
        <?php
        $i++;
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
        $result = $data->getAllData("SELECT * FROM $table WHERE adminId = ?", [$_SESSION['id']] );
        $result_count = count($result);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;

        $datas = $data->getAllData("SELECT * FROM $table WHERE adminId = ? ORDER BY date DESC LIMIT $offset, $total_records_per_page", [$_SESSION['id']]);

        // echo $id;
        // die();
        if($datas) { 
            $i = 1;
            foreach($datas as $row){
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $name ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['report'] ?></td>
        </tr>
        <?php
        $i++;   
        }
           } else {
        ?>
            <tr>
                <td colspan="5" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
            </tr>
        <?php } 
    }
?>