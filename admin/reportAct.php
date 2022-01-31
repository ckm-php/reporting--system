<?php

    include '../config.php';
    if(isset($_POST['save'])) {
        try {
            
        $date = $_POST['date'];
        $report = $_POST['report'];

        // echo $date;
        // die();

        $data = $conn->prepare("INSERT INTO report (report, date) VALUES (?, ?)");
        $datas = $data->execute([$report, $date]);
        if($datas) {
            // echo "Create Successfully";
            header('location: index.php');
        }else {
            header('location: index.php?msg');
        }
        
        }
        catch(PDOException $e) {
            echo $data . "<br>" . $e->getMessage();
          }
    }

?>