<?php
    session_start();
    include '../function.php';
    $msg = false;

    if(isset($_POST['changepass'])) {
        $name = $_SESSION['user'];
        $email = $_SESSION['mail'];
        $id = $_SESSION['id'];
        $oldpass = md5($_POST['opassword']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        // echo $oldpass;
        // exit();

        $data = new Common();
        $query = $data->getAllData("SELECT password FROM admin where password='$oldpass'");

        $num = sizeof($query);

        if($num>0) {
            if($password == $cpassword) {
                // update userinfo set password=' $newpassword' where email='$useremail'
                $sql = $data->getReturnData("UPDATE admin SET password = '$password' WHERE email ='$email' && name ='$name' ",);
                if($sql) {
                    // echo 'Data have';
                    header("location:user_profile.php?success");
                }
            }
            else {
                header("location:user_profile.php?passnomatch");
            }
        }
        else {
            header("location:user_profile.php?oldpassnomatch");
        }
    }
        

?>