<?php
    session_start();
    include "../../config/connection.php";
    include "../../model/common.php";
    $commons = new Common();
    $filename = 'user_'.time().'.csv';
    $id = $_SESSION['id'];

    // POST values
    if(isset($_SESSION['startdate'])){$startdate = $_SESSION['startdate'];}
    if(isset($_SESSION['enddate'])){$enddate = $_SESSION['enddate'];;}
    if(isset($_SESSION['searchvalue'])){$searchvalue = $_SESSION['searchvalue'];}
    if(isset($_SESSION['user'])){$user = $_SESSION['user'];}
    if(isset($_SESSION['ustatus'])){ $ustatus = $_SESSION['ustatus'];}
    if(isset($_SESSION['urole'])){ $urole = $_SESSION['urole'];}

    // print_r($user);
    // print_r($urole);
    // print_r($ustatus);
    // exit();
    
    $query = "SELECT * FROM user ORDER BY user.created_date DESC";

    if(isset($searchvalue) || isset($startdate) || isset($enddate) || isset($urole) || isset($ustatus) || isset($user)){

        // $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
        $conditions = array();

        if(! empty($startdate) || ! empty($enddate) ) {
            $conditions[] = "user.created_date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($user) && $user!="" ) {
            $conditions[] = "id='$user'";
        }
        if(! empty($urole) && $urole!="" ) {
            $conditions [] = "role='$urole'";
        }
        if(! empty($ustatus) && $ustatus!="" ) {
            $conditions [] = "status='$ustatus'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "CONCAT(`name`, `email`, `role`, `status`, `created_date`) LIKE '%".$searchvalue."%'";
        }

        $query = "SELECT * FROM user WHERE " . implode(' AND ', $conditions) ." ORDER BY user.created_date DESC";

        $results = $commons->getAllRow($query);
        // print_r($results);
        // exit();
    
    }else{
         $results = $commons->getAllRow($query);
    }

    $user_arr = array();


    // file creation
    $file = fopen($filename,"w");

    // $report_arr = array("Date","Name","Report Detail"); 

    foreach($results as $result) {

        $name = $result['name'];
        $email = $result['email'];
        $role = $result['role'];
        $status = $result['status'];
        $created_date = $result['created_date'];

        $user_arr = array($name,$email,$role,$status,$created_date);
        // if(sizeof($user_arr)>0){
            fputcsv($file,$user_arr); 
        // }
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