<?php
    session_start();
    include '../function.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $edit_pass = $_POST['editpass'];
    $yes = $_POST['chkPassPort'];

    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    
    $now = date('Y-m-d h:i:s');

    // echo $yes;
    // die();

    $data = new Common();

    // $sql = $data->getAllData(" SELECT * FROM admin WHERE email = ? || name = ? AND id != ? ", [$email, $name, $id]);
    $sql = $data->getAllData(" SELECT * FROM admin WHERE (name = '$name' AND id != $id) OR (email = '$email' AND id != $id) ");
    $count = sizeof($sql);

    if($count>0) {
        header("location:management.php?exist");
    }
    else {
        if(isset($yes) && $yes != 0) {
            // echo "change password";
            if($password == $cpassword) { 
                $sqls = $data->getReturnData('UPDATE admin SET name = ?, email = ?, password = ?, status = ? WHERE id = ?', [$name, $email, $password, $status, $id]);
                if($sqls) {
                    header('location:management.php?success');
                }
                else {
                    $msg = "Fail Data Update";
                }
            }
            else {
                header("location:management.php?passnomatch");
            }
        }
        else {
            // echo "Insert data to db";
            $sqls = $data->getReturnData('UPDATE admin SET name = ?, email = ?, password = ?, status = ? WHERE id = ?', [$name, $email, $edit_pass, $status, $id]);
            if($sqls) { 
                header('location:management.php');
            }
            else {
                $msg = "Fail Data Update";
            }
        }
        
    }

    
?>