<?php 
    require_once('../model/common.php');
    $commons = new Common();

    
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];

    if (isset($_POST['profile_update'])) {
        

        if (isset($_POST['old_pass']) || isset($_POST['new_pass']) || isset($_POST['con_pass'])) {

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $con_pass = $_POST['con_pass'];
            $hash_pw = password_hash($new_pass, PASSWORD_DEFAULT);
                $pass = $commons->getRow("SELECT * FROM user WHERE email='$email'");    
               
                if (password_verify($old_pass,$pass['password'])) {
                    if ($new_pass == $con_pass) {
                        if($_SESSION['role']=="admin") {
                            $role = $_POST['role'];
                            $status = $_POST['status'];
                            $results = $commons->updateData("UPDATE user SET password='$hash_pw', role='$role', status='$status', updated_date=now() WHERE id='$id'");
                            $_SESSION['success']="Update User Successfully!";
                            header("Location:user_list.php");
                        }else{
                            $results = $commons->updateData("UPDATE user SET password='$hash_pw', updated_date=now() WHERE id='$id'");
                            $_SESSION['success']="Update User Successfully!";
                            header("Location:user_list.php");
                        }
                
                    } else {
                        $_SESSION['pw_error'] = "Password does not match";
                    }
                }else {
                    $_SESSION['pw_error'] = "Wrong Password";
                }
    
        }else{
            $results = $commons->updateData("UPDATE user SET role='$role', status='$status', updated_date=now() WHERE id='$id'");
            $_SESSION['success']="Update User Successfully!";
            header("Location:user_list.php");
        }
    
        
    }
?>