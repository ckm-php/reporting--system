<?php 
    require_once('../../model/common.php');
    $commons = new Common();

    if(isset($_GET['edit_id'])){
        $edit_id = htmlspecialchars($_GET['edit_id']);
     
        $result = $commons->getRow("SELECT * FROM user WHERE id='$edit_id'");
        $id = $result['id'];
        $name = $result['name'];
        $email = $result['email'];
        $role = $result['role'];
        $status = $result['status'];

    
    
        //Update Admin
        if (isset($_POST['updateuser'])) // when click on Update button
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_pass = $_POST['confirm_pass'];
            $role = $_POST['role'];
            $status = $_POST['status'];
            $hash_pw = password_hash($password, PASSWORD_DEFAULT);
            if($_SESSION['role']=="admin") {
    
                // if ($email != "" ) {
                //     $rows = $commons->getAllRow("SELECT * FROM user WHERE email='$email'");

                    // if (sizeof($rows)>0) {
                        
                        if ($password == $confirm_pass) {
            
                            $results = $commons->updateData("UPDATE user SET name='$name', email='$email', password='$hash_pw', role='$role', status='$status', updated_date=now() WHERE id='$edit_id'");
                            $_SESSION['success']="Update User Successfully!";
                            header("Location:user_lists.php");
                    
                    
                        } else {
                            $_SESSION['pw_error'] = "Password does not match";
                        }
                    // }
                // }
            }else{
                header("Location:user_lists.php");
            }
        }
    }
?>