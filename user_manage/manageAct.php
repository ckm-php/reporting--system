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
                $_SESSION['user'] = $data['name'];
                $_SESSION['id'] = $data['id'];

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