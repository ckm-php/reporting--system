<?php 
    require_once('../../model/common.php');
    $commons = new Common;
    if(isset($_GET['del_id'])){
        // $del_id = htmlspecialchars($_GET['del_id']);
        $del_id = $_GET['del_id'];
        // print_r($del_id);
        // exit();
        $query = "SELECT * FROM user WHERE id='$del_id'";
        $result = $commons->getRow($query);

        if($_SESSION['role'] == "admin") {

            $result = $commons->deleteData("DELETE FROM user WHERE id='$del_id'");
            if(!empty($result)){
                header("Location:user_lists.php");
            }

            // if($result['status'] == "active") {
                // $status = "deactivate";
                // $result = $commons->updateData("UPDATE user SET status='$status', updated_date=now() WHERE id='$del_id'");
                // if($result) {    
                //     header("Location:user_lists.php");
                //     $_SESSION['success_report']="Update Report Successfully!";
                // }
                // else {
                //     $_SESSION['error_report']="Update Report Failed!";
            
                // }
            // }
        }
    }
?>