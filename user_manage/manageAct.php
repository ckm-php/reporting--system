<?php 
    session_start();
    include '../function.php'; 
?>

<?php

    if(isset($_POST['submit'])) {

        try {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            // echo $email;
            // exit();
            $datas = new Common();
            $data = $datas->getOneRowData("SELECT * FROM user_management ");

            // echo $data['email'];
            // exit();

            if($email == $data['email'] and $password == $data['password'] ) {
                $_SESSION['admin_name'] = $data['name'];
                $_SESSION['admin_id'] = $data['id'];
                $_SESSION['psw'] = $data['password'];
                $_SESSION['logged_in'] = true;

                header('Location: management.php');
                
            }
            else {
                header('Location: admin_login.php?msg');
            }


        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
       
    }
    else {
        header('Location: login.php');
    }

?>