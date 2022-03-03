<?php
    include '../function.php';
    $id = $_POST[id];
    $date = $_POST['date'];
    $report = $_POST['report'];

    $now = date('Y-m-d h:i:s');

    $data = new Common();
    $sql = $data->getReturnData('UPDATE report SET date = ?, report = ?, created_date = ?, updated_date = ? WHERE id = ?', [$date, $report, $now, $now, $id]);
    // $sql = $data->getReturnData('UPDATE report SET date = ?, report = ?, adminId = ? created_date = ?, updated_date = ? WHERE id = ?', [$date, $report, $_SESSION['id'], $now, $now, $id]);
    if($sql) {
        $msg = "Success Data Update";
        header('location:index.php?msg='.$msg);
    }
    else {
        $msg = "Fail Data Update";
        header('location:index.php?msg='.$msg);
    }
?>