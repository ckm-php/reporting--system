<?php
    session_start();
    include 'function.php';
    $data = new Common();

    
    header("Content-Type: application/octet-stream; ");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Disposition: attachment; filename=\"report.csv\""); 

    //save-csv in server and create empty csv file
    $fh = fopen("php://output", "w");
    if($fh === false) { exit("Failed to create csv file"); }

    $search = $_SESSION['search'];
    $keyword = $_SESSION['keyword'];
    $fromDate = $_SESSION['fromDate'];
    $toDate = $_SESSION['toDate'];
    $selectname = $_SESSION['username'];

    // echo $fromDate;
    // echo $toDate;
    // echo 'heillo';
    // echo $search;
    // echo $keyword;
    // exit();
    
    if($search || $keyword || ($fromDate && $toDate) || $selectname){

        $condition = [];

        if(!empty($keyword) ) { 
            $condition[] = " CONCAT(`name`, `date`, `report`) LIKE '%".$keyword."%' ";
        }

        if(!empty($selectname && $selectname != "")) {
            $condition[] = " adminId = $selectname ";
        }

        if(!empty($fromDate) && !empty($toDate)) {
            $condition[] = " date BETWEEN '".$fromDate."' AND '".$toDate."' "; 
        }

        $query = "SELECT * FROM report INNER JOIN admin ON report.adminId = admin.id";

        if($condition) {
            $query .= " WHERE ".implode('AND', $condition) ."ORDER BY date desc ";
        }

        $datas = $data->getAllData($query);
    
    }
    else {
        $datas = $data->getAllData("SELECT * FROM report ORDER BY date desc");
    }


    // echo "<pre>";
    // print_r($datas);

    foreach($datas as $row) {
        $repoData = $data->getOneRowData("SELECT * FROM admin WHERE id = ? ", [$row['adminId']]);

        fputcsv($fh, [
            $repoData['name'],
            $row['date'],
            $row['report']

        ]);
    }

    fclose($fh);


?>