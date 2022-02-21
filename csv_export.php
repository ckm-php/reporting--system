<?php
    session_start();
    include "admin/config/connection.php";
    include "admin/model/common.php"; 
    $commons = new Common();
    $filename = 'report_'.time().'.csv';

    // POST values
    if(isset($_SESSION['startdate'])){$startdate = $_SESSION['startdate'];}
    if(isset($_SESSION['enddate'])){$enddate = $_SESSION['enddate'];;}
    if(isset($_SESSION['searchvalue'])){$searchvalue = $_SESSION['searchvalue'];}
    if(isset($_SESSION['user'])){$user = $_SESSION['user'];}
    
    $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";

    if($searchvalue || $user || $startdate || $enddate ){

        // $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
        $conditions = array();

        if(! empty($startdate) && ! empty($enddate) ) {
        $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($user)) {
        $conditions[] = "user_id='$user'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`name`, `date`, `report_details`) LIKE '%".$searchvalue."%'";
        }
        if (count($conditions) > 0) {
        $query .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY report.date DESC";
        }
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
    session_destroy();
    // // deleting file
    unlink($filename);
    // exit();

?>