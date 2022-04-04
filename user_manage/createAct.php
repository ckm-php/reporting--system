<?php

    include '../function.php';
    $msg = false;

    if(isset($_POST['create'])) {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $image = $_FILES['img']['name'];
        $tmp = $_FILES["img"]["tmp_name"];
        $type = $_FILES["img"]["type"];

        if($image != "") {
            $tmp = $_FILES["img"]["tmp_name"];
            $type = $_FILES["img"]["type"];
        }
        else {
            $image = "img/defalt_img.png";
        }

        echo $image;
        exit();

        $data = new Common();

        $sql = $data->getAllData(" SELECT * FROM admin WHERE email = ? || name = ? ", [$email, $name]);
        $count = count($sql);

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
            header("location:new_user.php?exist");
        }
        
    }
        

?>