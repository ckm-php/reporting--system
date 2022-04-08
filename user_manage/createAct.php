<?php

    include '../function.php';
    $msg = false;

    if(isset($_POST['create'])) {
        $errors     = array();
        $name = $_POST['name'];
        $status = $_POST['status'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $image = basename($_FILES['image']['name']);
        $tmp = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];
        $size = $_FILES['image']['size'];
        echo '<pre>';
        print_r($_FILES['image']);
        die();

        $maxsize = 2097152;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        if($size > $maxsize) {
            $errors[] = 'File too large. File must be less than 2 megabytes.';
        }
    
        if((!in_array($type, $acceptable)) && (!empty($type))) {
            $errors[] = 'Invalid file type. Only JPG, JPEG and PNG types are accepted.';
        }

        // echo '<pre>';
        // print_r($_FILES);
        // die();

        // if($image != "") {
        //     $tmp = $_FILES["img"]["tmp_name"];
        //     $type = $_FILES["img"]["type"];
        // }
        // else {
        //     $image = "img/defalt_img.png";
        // }

        $data = new Common();

        $sql = $data->getAllData(" SELECT * FROM admin WHERE email = ? || name = ? ", [$email, $name]);
        $count = count($sql);

        if(count($errors) === 0) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../photo/".$_FILES['image']['name']);
            if($count == 0) {
                $sql = $data->getReturnData("INSERT INTO admin (name, email, password, status, image) VALUES (?, ?, ?, ?, ?)", [$name, $email, $password, $status, $image]);
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
        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
                header("location:new_user.php");
            }
        }

        // $data = new Common();

        // $sql = $data->getAllData(" SELECT * FROM admin WHERE email = ? || name = ? ", [$email, $name]);
        // $count = count($sql);

        // if($count == 0) {
        //     $sql = $data->getReturnData("INSERT INTO admin (name, email, password, status) VALUES (?, ?, ?, ?)", [$name, $email, $password, $status]);
        //     if($sql) {
        //         header("location:management.php");
        //     }
        //     else {
        //         echo "Insert Not Success";
        //     }
        // } 
        // else {
        //     header("location:new_user.php?exist");
        // }
        
    }
        

?>