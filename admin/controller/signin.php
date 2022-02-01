<?php 
    require_once('model/common.php');

    if(isset($_POST['signin'])){
        $commons = new Common;
        $email=$_POST["email"];
        $password=$_POST["password"];
        $user = $commons->getRow("SELECT * FROM user WHERE email='$email'");

        if($user['email']==""){
            $_SESSION['error_login']="Please Signup!";
        }elseif (password_verify($password,$user['password'])){
            setSession("name",$user['name']);
            setSession("email",$email);
            setSession("id",$user['id']);
            header("location: dashboard.php");
        }else{
            $_SESSION['error_login']="Email and Password does not incorrect!";
        }

    }

 ?>