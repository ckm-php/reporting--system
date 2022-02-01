<?php 
    require_once('model/common.php');

    if(isset($_POST['signup'])){
        $commons = new Common;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_pw = password_hash($password, PASSWORD_DEFAULT);
        $results = $commons->insertData("INSERT INTO user (name, email, password,created_date,updated_date) VALUES ('$name', '$email', '$hash_pw', now(),now())");
        $_SESSION['error_login']="Signup Successfully!";
        header("Location:signin.php");
        
    }
    ?>