<?php
    session_start();
    include '../function.php';
    $data = new Common();

    
    header("Content-Type: application/octet-stream; ");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Disposition: attachment; filename=\"report.csv\""); 

    //save-csv in server and create empty csv file
    $fh = fopen("php://output", "w");
    if($fh === false) { exit("Failed to create csv file"); }

    $search = $_SESSION['search'];
    $fromDate = $_SESSION['fromDate'];
    $toDate = $_SESSION['toDate'];

    // echo $fromDate;
    // echo $toDate;
    // echo 'heillo';
    // echo $search;
    // echo $keyword;
    // exit();
    
    if($search || $keyword || ($fromDate && $toDate) ){
        $datas = $data->getAllData("SELECT * FROM report WHERE date between '".$fromDate."' and '".$toDate."' ");
    }
    elseif ($keyword !== null || $search !== null) {
        $datas = $data->getAllData("SELECT * FROM report WHERE date LIKE '%$keyword%' OR report LIKE '%$keyword%'");
    }
    else {
        $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ?", [$_SESSION['id']]);
    }


    // echo "<pre>";
    // print_r($datas);

    foreach($datas as $row) {
        $name = $_SESSION['user'];
        fputcsv($fh, [
            $name,
            $row['date'],
            $row['report']

        ]);
    }

    fclose($fh);


?>