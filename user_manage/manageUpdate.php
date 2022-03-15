<?php
    session_start();
    include '../function.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $password = $_SESSION['psw'];;
    
    $now = date('Y-m-d h:i:s');

    // echo $id;
    // die();

    $data = new Common();

    // $sql = $data->getAllData(" SELECT * FROM admin WHERE email = ? || name = ? AND id != ? ", [$email, $name, $id]);
    $sql = $data->getAllData(" SELECT * FROM admin WHERE (name = '$name' AND id != $id) OR (email = '$email' AND id != $id) ");
    $count = sizeof($sql);

    if($count>0) {
        header("location:management.php?exist");
    }
    else {
        // $sqls = $data->getReturnData("UPDATE admin SET name = '$name', email = '$email', password = '$password', status = '$status' WHERE id = '$id' ");
        $sqls = $data->getReturnData('UPDATE admin SET name = ?, email = ?, password = ?, status = ? WHERE id = ?', [$name, $email, $password, $status, $id]);
        if($sqls) {
            header('location:management.php');
        }
        else {
            $msg = "Fail Data Update";
        }
    }

    
?>