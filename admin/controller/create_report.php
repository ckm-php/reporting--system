<?php 
    require_once('../model/common.php');

    if(isset($_POST['report'])){
        $commons = new Common;
        $id =$_SESSION['id'];
        $date =$_POST['date'];
        $detail =$_POST['detail'];
       
        $results = $commons->insertData("INSERT INTO report (user_id, date, report_details ,created_date,updated_date) VALUES ('$id', '$date', '$detail', now(),now())");
        $_SESSION['success']="Create Report Successfully!";
        header("Location:list_report.php");

    }

 ?>