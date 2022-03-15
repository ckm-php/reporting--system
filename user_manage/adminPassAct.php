<?php
    session_start();
    include '../function.php';
    $msg = false;

    if(isset($_POST['changepass'])) {
        $name = $_SESSION['admin_name'];
        $email = $_SESSION['admin_email'];
        $id = $_SESSION['admin_id'];
        $oldpass = md5($_POST['opassword']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        // echo $oldpass;
        // exit();

        $data = new Common();
        $query = $data->getAllData("SELECT password FROM user_management WHERE password='$oldpass'");

        $num = sizeof($query);

        if($num>0) {
            if($password == $cpassword) {
                // update userinfo set password=' $newpassword' where email='$useremail'
                $sql = $data->getReturnData("UPDATE user_management SET password = '$password' WHERE email ='$email' && name ='$name' ",);
                if($sql) {
                    // echo 'Data have';
                    header("location:admin_changPsw.php?success");
                }
            }
            else {
                header("location:admin_changPsw.php?passnomatch");
            }
        }
        else {
            header("location:admin_changPsw.php?oldpassnomatch");
        }
    }
        

?>