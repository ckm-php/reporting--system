<?php
    if(isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $selectname = $_POST['username'];
      
        $condition = [];

        if(!empty($keyword) ) { 
            $condition[] = " name LIKE '%$keyword%' OR date LIKE '%$keyword%' OR report LIKE '%$keyword%' ";
        }

        if(!empty($selectname && $selectname != "")) {
            $condition[] = " adminId = $selectname ";
        }

        if(!empty($fromDate) && !empty($toDate)) {
            $condition[] = " date BETWEEN '".$fromDate."' AND '".$toDate."' "; 
        }

        $query = "SELECT * FROM report INNER JOIN admin ON report.adminId = admin.id";

        if($condition) {
            $query .= " WHERE ".implode('AND', $condition) ."ORDER BY date desc LIMIT $offset, $total_records_per_page";
        }

        $datas = $data->getAllData($query);

        $result_count = count($datas);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1;

        if($datas) { 
            foreach($datas as $value) { 
            $getnum = $data->getOneRowData("SELECT name FROM admin WHERE id = ? ", [$value['adminId']]);
            
        ?>
            <tr>
                <td><?= $getnum['name']; ?></td>
                <td><?= $value['date']; ?></td>
                <td><?= $value['report']; ?></td>
            </tr>
        <?php 
        }
            } else {                    
        ?>
            <tr>
                <td colspan="3" class="text-primary text-center font-weight-bold"><b>There is no datas to show</b></td>
            </tr>
        <?php } 

    } else  {
        $table = 'report'; 
        $datas = $data->getAllData("SELECT * FROM $table ORDER BY date DESC LIMIT $offset, $total_records_per_page");
        $result_count = count($datas);
        $total_no_of_pages = ceil($result_count / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; 

       
        foreach($datas as $value) { 
        $getnum = $data->getOneRowData("SELECT name FROM admin WHERE id = ? ", [$value['adminId']]);
    ?>
        <tr>
            <td><?= $getnum['name']; ?></td>
            <td><?= $value['date']; ?></td>
            <td><?= $value['report']; ?></td>
        </tr>
    <?php 
        }
    }
        
   
?>