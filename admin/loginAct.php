<?php 
    session_start();
    include '../function.php'; 
?>

<?php

    if(isset($_POST['submit'])) {

        try {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // echo $email;
            // exit();
            $datas = new Common();
            $data = $datas->getOneRowData("SELECT * FROM admin WHERE email = ? ", [$email]);

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