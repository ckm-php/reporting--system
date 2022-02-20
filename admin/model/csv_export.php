<?php 
 include "../config/connection.php";
 include "common.php"; 
 $commons = new Common;
 
// Fetch records from database 

$results = $commons->getAllRow("SELECT * FROM report INNER JOIN user ON report.user_id=user.id ORDER BY report.id DESC");
 
if($results > 0){ 
    $delimiter = ","; 
    $filename = "data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Date', 'Name', 'Report Details'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    foreach ($results as $key => $result):
        $lineData = array($result['date'], $result['name'], $result['report_details']); 
        fputcsv($f, $lineData, $delimiter); 
    endforeach;
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>