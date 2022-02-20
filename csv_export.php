<?php
 include "admin/config/connection.php";
 include "admin/model/common.php"; 
 $commons = new Common;
$filename = 'report_'.time().'.csv';

// POST values
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$searchvalue = $_POST['searchvalue'];

// Select query
$query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id ORDER BY report.date DESC";

if(isset($_POST['startdate']) || isset($_POST['enddate']) || isset($_POST['searchvalue'])){
//    $query = "SELECT * FROM employee where date_of_joining between '".$from_date."' and '".$to_date."' ORDER BY id asc";

    $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
    $conditions = array();

    if(! empty($startdate) || ! empty($enddate) ) {
    $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
    }
    if(! empty($searchvalue)) {
    $conditions[] = "name='$searchvalue'";
    }

    if (count($conditions) > 0) {
    $query .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY report.date DESC";
    }
}



$results = $commons->getAllRow($query);
$report_arr = array();

// file creation
$file = fopen($filename,"w");

// Header row - Remove this code if you don't want a header row in the export file.
$report_arr = array("Date","Name","Report Detail"); 

foreach($results as $result){
   $date = $result['date'];
   $name = $result['name'];
   $report_details = $result['report_details'];


   // Write to file 
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

