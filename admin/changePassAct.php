<?php
    session_start();
    include '../function.php';
    $msg = false;

    if(isset($_POST['changepass'])) {
        $name = $_SESSION['user'];
        $email = $_SESSION['mail'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        // echo $email;
        // exit();

        $data = new Common();
        if($password == $cpassword) {
            // $sql = $data->getReturnData("UPDATE admin SET (name, email, password) VALUES (?, ?, ?)", [$name, $email, $password]);
            $sql = $data->getReturnData('UPDATE admin SET name = ?, email = ?, password = ? WHERE id = ?', [$name, $email, $password, $_SESSION['id']]);
            if($sql) {
                // echo 'Data have';
                header("location:change_password.php?success");
            }
        }
        else {
            header("location:change_password.php?passnomatch");
        }
    }
        

?>