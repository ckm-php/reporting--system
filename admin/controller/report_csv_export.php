<?php
    session_start();
    include "../config/connection.php";
    include "../model/common.php";
    $commons = new Common();
    $filename = 'report_'.time().'.csv';
    $id = $_SESSION['id'];

    // POST values
    if(isset($_SESSION['startdate'])){$startdate = $_SESSION['startdate'];}
    if(isset($_SESSION['enddate'])){$enddate = $_SESSION['enddate'];;}
    if(isset($_SESSION['searchvalue'])){$searchvalue = $_SESSION['searchvalue'];}
    
    $query = "SELECT * FROM report WHERE user_id='$id' ORDER BY report.date DESC";

    if($searchvalue || $startdate || $enddate ){

        // $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
        $conditions = array();

        // if(! empty($startdate) && ! empty($enddate) ) {
        // $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        // }
        // if(! empty($user) && $user!="") {
        // $conditions[] = "user_id='$user'";
        // }
        // if(! empty($searchvalue)) {
        // $conditions[] = "CONCAT(`name`, `date`, `report_details`) LIKE '%".$searchvalue."%'";
        // }
        // if (count($conditions) > 0) {
        // $query .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY report.date DESC";
        // }

        $conditions[] = "user_id = '$id'";

        if(! empty($startdate) || ! empty($enddate) ) {
        $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`date`, `report_details`) LIKE '%".$searchvalue."%'";
        }

        $query = "SELECT * FROM report WHERE " . implode(' AND ', $conditions) ." ORDER BY report.date DESC";
        $results = $commons->getAllRow($query);
    
    }else{
         $results = $commons->getAllRow($query);
    }

    $report_arr = array();

    // file creation
    $file = fopen($filename,"w");

    // $report_arr = array("Date","Name","Report Detail"); 

    foreach($results as $result) {

        $date = $result['date'];
        $report_details = $result['report_details'];

        $report_arr = array($date,$report_details);
        fputcsv($file,$report_arr); 
    }

    fclose($file);

    // download
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");

    readfile($filename);
    // // deleting file
    unlink($filename);
    // exit();

?>