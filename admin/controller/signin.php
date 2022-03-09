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
            if($user['status']=="active"){
                if($user['role']=="admin"){
                    setSession("name",$user['name']);
                    setSession("email",$email);
                    setSession("id",$user['id']);
                    setSession("role",$user['role']);
                    setSession("loggedin",true);
                    header("location: view/user_lists.php");
                }else{
                    setSession("name",$user['name']);
                    setSession("email",$email);
                    setSession("id",$user['id']);
                    setSession("role",$user['role']);
                    setSession("loggedin",true);
                    header("location: view/dashboard.php");
                }
            }else{
                $_SESSION['error_login']="This account is Deactivate!";
            }
        }else{
            $_SESSION['error_login']="Email and Password does not incorrect!";
        }

    }

 ?>