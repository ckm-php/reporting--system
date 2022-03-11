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

    // $sql = $data->getAllData(" SELECT * FROM admin WHERE email = ? || name = ? && id = ? ", [$email, $name,$id]);
    // $sql = $data->getAllData(" SELECT * FROM admin WHERE id = $id");
    // $count = count($sql);
    // echo '<pre>';
    // print_r($count);
    // exit();

    // if( == 0) {
        $sql = $data->getReturnData('UPDATE admin SET name = ?, email = ?, password = ?, status = ? WHERE id = ?', [$name, $email, $password, $status, $id]);
        if($sql) {
            header('location:management.php');
        }
        else {
            $msg = "Fail Data Update";
        }
    // }else {
    //     header("location:management.php?exist");
    // }
?>