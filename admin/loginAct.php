<?php 
    session_start();
    include '../function.php'; 
?>

<?php

    if(isset($_POST['submit'])) {

        try {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            // echo $password;
            // exit();
            $datas = new Common();
            $data = $datas->getOneRowData("SELECT * FROM admin WHERE email = ? ", [$email]);

            // echo $data['password'];
            // exit();

            if($email == $data['email'] and $password == $data['password']) {
                $_SESSION['user'] = $data['name'];
                $_SESSION['id'] = $data['id'];
                header('Location: index.php');
            }
            else {
                header('Location: ../login.php?msg');
            }


        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
       
    }

?>