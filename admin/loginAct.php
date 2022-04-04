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

            // echo $password;
            // exit();
            $datas = new Common();
            $data = $datas->getOneRowData("SELECT * FROM admin WHERE email = ? ", [$email]);

            $count = sizeof($data);
            // echo $count;
            // exit();

            // echo $data['password'];
            // exit();

            if($email == $data['email'] and $password == $data['password'] and $count > 0) {
                $_SESSION['user'] = $data['name'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['mail'] = $data['email'];
                $_SESSION['loggedin'] = true;
                $_SESSION['last_time'] = time(); 
                $_SESSION['status'] = $data['status'];

                if($_POST['remember'] == true) {
                    setcookie('mail', $email, time()+3600*24*7);
                    setcookie('pass', $pass, time()+3600*24*7);
                    header('Location: report_list.php');
                }
                if($data['status'] == 0) {
                    $_SESSION['last_time'] = time(); 
                    header('Location: report_list.php');
                }
                else {
                    header('Location: login.php?deactivatemsg');
                }
                
            }
            else {
                header('Location: login.php?msg');
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