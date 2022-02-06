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
    // echo 'heillo';
    // echo $search;
    // echo $keyword;
    // exit();
    if($_SESSION['search'] || $_SESSION['keyword']){

    $adminData = $data->getAllData("SELECT * FROM admin WHERE name Like  '%$keyword%' ");
    $datas = null;
    if (sizeof($adminData) > 0) {
    $id = $adminData[0]['id'];
    $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ?", [$id]);
    
    } else if ($keyword !== null || $search !== null) {
        $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%' ");
        }
    } 
    else {
        $datas = $data->getAllData("SELECT * FROM report");
    }

    foreach($datas as $row) {
        $data = new Common();
        $repoData = $comdta->getOneRowData("SELECT name FROM admin WHERE id = ? ", [$row['id']]);

    fputcsv($fh, [
        $repoData['name'],
        $row['date'],
        $row['report']

    ]);
    }

    fclose($fh);


?>