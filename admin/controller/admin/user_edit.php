<?php 
    require_once('../model/common.php');
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
            $role = $_POST['role'];
            $status = $_POST['status'];
           
            if($_SESSION['role']=="admin") {
                $rows = $commons->getAllRow("SELECT * FROM user WHERE (email='$email' AND id!=13) OR (name='$name' AND id!=$id)");

                // $rows = $commons->getAllRow("SELECT * FROM user WHERE id!='13');

                foreach($rows as $row) {
                    $oldname = $row['name'];
                    $oldemail = $row['email'];
                }
                
                // print_r(sizeof($rows));
                // print_r($email);
                // print_r($name);
                // print_r($oldname);
                // print_r($oldemail);
                // exit();
            
                // -- if($result['email'] != $_POST['email'] || $result['name'] != $_POST['name']){
                    
                    if (sizeof($rows)>0) {
                        if(($oldname == $name) && ($oldemail == $email)){
                            $_SESSION['account_error'] = "Unavilable Account!";
                        }else if($oldname == $name){
                            $_SESSION['account_error'] = "Unavilable Name!";
                        }else if($oldemail == $email){
                            $_SESSION['account_error'] = "Unavilable Email!";
                        }
                    
                    }else{
        
                        if ( isset($_POST['new_pass']) || isset($_POST['con_pass'])) {

                            // $old_pass = $_POST['old_pass'];
                            $new_pass = $_POST['new_pass'];
                            $con_pass = $_POST['con_pass'];
                            $hash_pw = password_hash($new_pass, PASSWORD_DEFAULT);
                            $pass = $commons->getRow("SELECT * FROM user WHERE email='$email'");    

                            // if (password_verify($old_pass,$pass['password'])) {
                                if ($new_pass == $con_pass) {
                    
                                    $results = $commons->updateData("UPDATE user SET name='$name', email='$email', password='$hash_pw', role='$role', status='$status', updated_date=now() WHERE id='$edit_id'");
                                    $_SESSION['success']="Update User Successfully!";
                                    header("Location:user_lists.php");
                            
                            
                                } else {
                                    $_SESSION['pw_error'] = "Password does not match";
                                }
                
                        }else{
                            $results = $commons->updateData("UPDATE user SET name='$name', email='$email', role='$role', status='$status', updated_date=now() WHERE id='$edit_id'");
                            $_SESSION['success']="Update User Successfully!";
                            header("Location:user_lists.php");
                        }
                    }
                
            }else{
                    header("Location:user_lists.php");
            }
        }
    }
?>