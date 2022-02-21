<?php
    include "admin/config/connection.php";
    include "admin/model/common.php"; 
    $commons = new Common();
    $filename = 'report_'.time().'.csv';

    // POST values
    $startdate = $_SESSION['startdate'];
    $enddate = $_SESSION['enddate'];
    $searchvalue = $_SESSION['searchvalue'];
    $user = $_SESSION['user'];
    
    if($searchvalue || $user || $startdate || $enddate ){

        $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
        $conditions = array();

        if(! empty($startdate) && ! empty($enddate) ) {
        $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($user)) {
        $conditions[] = "name='$user'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`name`, `date`, `report_details`) LIKE '%".$searchvalue."%'";
        }
        if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY report.date DESC";
        }
        $results = $commons->getAllRow($query);
    
    }
    else {
        $results = $commons->getAllData("SELECT * FROM report INNER JOIN user ON report.user_id=user.id");
    }

    $report_arr = array();

    // file creation
    $file = fopen($filename,"w");

    // $report_arr = array("Date","Name","Report Detail"); 

    foreach($results as $result) {

        $date = $result['date'];
        $name = $result['name'];
        $report_details = $result['report_details'];

        $report_arr = array($date,$name,$report_details);
        fputcsv($file,$report_arr); 
    }

    fclose($file);

    // download
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");

    readfile($filename);

    // deleting file
    unlink($filename);
    exit();