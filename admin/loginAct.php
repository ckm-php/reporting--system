<?php 
    session_start();
    include '../config.php'; 
?>

<?php

    if(isset($_POST['submit'])) {

        try {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // echo $email;
            // exit();

            $sql = $conn->prepare("SELECT * FROM admin WHERE email = ? ");
            $sql->execute([$email]);
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            if($email === $data['email'] and $password === $data['password']) {
                $_SESSION['user'] = 'Khin Aye';
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