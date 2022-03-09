<?php 
    require_once('../model/common.php');
    // session_start();
    if(isset($_POST['adduser'])){
        $commons = new Common();
        // $id =$_SESSION['id'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_pass = $_POST['confirm_pass'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $hash_pw = password_hash($password, PASSWORD_DEFAULT);

        if ($email != "") {
            $rows = $commons->getAllRow("SELECT * FROM user WHERE email='$email'");
            // print_r(sizeof($rows));
            // print_r($email);
            // exit();
            if (sizeof($rows)>0) {
                $_SESSION['email_error'] = "Email already inserted";
            }else{
                 if ($password == $confirm_pass) {
    
                    $results = $commons->insertData("INSERT INTO `user`(name, email, password, role, status, created_date, updated_date) VALUES ('$name','$email','$hash_pw','$role','$status',now(),now())");
                    $_SESSION['success']="Create User Successfully!";
                    header("Location:user_lists.php");
            
             
                } else {
                    $_SESSION['pw_error'] = "Password does not match";
                }
            }
        }

        // $results = $commons->insertData("INSERT INTO `user`(name, email, password, role, status, created_date, updated_date) VALUES ('$name','$email','$hash_pw','$role','$status',now(),now())");
        // $_SESSION['success']="Create User Successfully!";
        // header("Location:user_lists.php");

        

    }

 ?>