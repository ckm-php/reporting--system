<?php
    include '../function.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $now = date('Y-m-d h:i:s');

    $data = new Common();
    $sql = $data->getReturnData('UPDATE admin SET name = ?, email = ?, password = ?, status = ? WHERE id = ?', [$name, $email, $password, $status, $id]);
    if($sql) {
        header('location:management.php');
    }
    else {
        $msg = "Fail Data Update";
    }
?>