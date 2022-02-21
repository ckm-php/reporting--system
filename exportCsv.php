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

        $adminData = $data->getAllData("SELECT * FROM admin WHERE name Like  '%$keyword%' ");
        $datas = null;
        if(!empty($fromDate) && !empty($toDate)) {
            $datas = $data->getAllData("SELECT * FROM report WHERE date between '".$fromDate."' and '".$toDate."' ");
        }
        elseif(!empty($selectname)) {
            $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ? ", [$selectname]);
        }
        elseif (sizeof($adminData) > 0) {
            $id = $adminData[0]['id'];
            $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ?", [$id]);
        
        } 
        elseif ($keyword !== null || $search !== null) {
            $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%' ");
        }
    }
    else {
        $datas = $data->getAllData("SELECT * FROM report");
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