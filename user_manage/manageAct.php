<?php 
    session_start();
    include '../function.php'; 
?>

<?php

    if(isset($_POST['submit'])) {

        try {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $pass = $_POST['password'];

            // echo $pass;
            // exit();
            $datas = new Common();
            $data = $datas->getOneRowData("SELECT * FROM user_management ");

            // echo $data['email'];
            // exit();

            if($email == $data['email'] and $password == $data['password'] ) {
                $_SESSION['admin_name'] = $data['name'];
                $_SESSION['admin_id'] = $data['id'];
                $_SESSION['admin_email'] = $data['email'];
                $_SESSION['psw'] = $data['password'];
                $_SESSION['logged_in'] = true;
                $_SESSION['loggedin_time'] = time();

                if($_POST['rememb'] == true) {
                    setcookie('mail', $email, time()+3600*24*7);
                    setcookie('pass', $pass, time()+3600*24*7);
                    header('Location: management.php');
                }
                
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