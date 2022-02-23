<?php

    include 'function.php';
    $msg = false;

    if(isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        // echo $name;
        // exit();

        $data = new Common();
        $sql = $data->getAllData("SELECT * FROM admin WHERE email = ?", [$email]);
        // print_r($sql);
        // print_r(count($sql));
        
        $count = count($sql);

        // print_r($count);
        // die();

        if($count == 0) {
            if($password == $cpassword) {
                $sql = $data->getReturnData("INSERT INTO admin (name, email, password) VALUES (?, ?, ?)", [$name, $email, $password]);
                if($sql) {
                    header("location:signup.php?success");
                }
            }
            else {
                header("location:signup.php?passnomatch");
            }
        }
        if($count == 1) {
            header("location:signup.php?emailExist");
        }
    }
        

?>