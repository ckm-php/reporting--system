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
    $keyword = $_SESSION['keyword'];
    $id = $_SESSION['id'];

    // echo 'hello';
    // echo $keyword;
    // exit();
    
    if($search || $keyword || ($fromDate && $toDate) ) {

        $condition = [];

        if(!empty($keyword) ) { 
            $condition [] = " date LIKE '%$keyword%' OR report LIKE '%$keyword%' AND adminId = $id";
        }

        if(!empty($fromDate) && !empty($toDate) )  {
            $condition [] = " date BETWEEN '".$fromDate."' AND '".$toDate."' AND adminId = $id"; 
        }
    
        $query = "SELECT * FROM report ";
    
        if($condition) {
            $query .= "WHERE".implode('AND', $condition) ." ORDER BY date DESC";
        }

        if(!$condition) {
            $query = "SELECT * FROM report WHERE adminId = $id  ORDER BY date DESC";
        }
    
        $datas = $data->getAllData($query);
    }
    else {
        $datas = $data->getAllData("SELECT * FROM report WHERE adminId = ? ORDER BY date DESC ", [$id]);
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