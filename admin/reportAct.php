<?php

    include '../function.php';
    if(isset($_POST['save'])) {
        try {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $report = $_POST['report'];
        $now = date('Y-m-d h:i:s');

        // echo $date;
        // die();

        $data = new Common();
        $datas = $data->getReturnData("INSERT INTO report (report, date, adminId, created_date, updated_date) VALUES (?, ?, ?, ?, ?)", [$report, $date, $id, $now, $now]);
        if($datas) {
            // echo "Create Successfully";
            header('location: index.php');
        }else {
            
            echo 'Create Not Successfully';
        }
        
        }
        catch(PDOException $e) {
            echo $datas . "<br>" . $e->getMessage();
          }
    }

?>