<?php

    include '../function.php';
    $msg = false;

    if(isset($_POST['create'])) {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // echo $status;
        // exit();

        $data = new Common();

        $sql = $data->getAllData("SELECT * FROM admin WHERE email = ?", [$email]);
        $count = count($sql);

        // print_r($count);
        die();

        if($count == 0) {
            $sql = $data->getReturnData("INSERT INTO admin (name, email, password, status) VALUES (?, ?, ?, ?)", [$name, $email, $password, $status]);
            if($sql) {
                header("location:management.php");
            }
            else {
                echo "Insert Not Success";
            }
        } 
        else {
            header("location:new_user.php?emailExist");
        }


        
        
    }
        

?>