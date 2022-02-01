<?php

    include 'function.php';
    if(isset($_POST['save'])) {
        try {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $report = $_POST['report'];

        // echo $id;
        // die();
        $data = new Common();
        $datas = $data->getCrudData("INSERT INTO report (report, date, adminId) VALUES (?, ?, ?)", [$report, $date, $id]);
        if($datas) {
            // echo "Create Successfully";
            header('location: index.php');
        }else {
            header('location: index.php?msg');
        }
        
        }
        catch(PDOException $e) {
            echo $datas . "<br>" . $e->getMessage();
          }
    }

?>