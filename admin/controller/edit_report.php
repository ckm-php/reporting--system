<?php 
    if($_SESSION['role']=="admin") {
        require_once "../../model/common.php";
    }else if($_SESSION['role']=="user") {
        require_once "../model/common.php";
    }
    // require_once('../model/common.php');
    $commons = new Common;

    if(isset($_GET['edit_id'])){
        $edit_id = htmlspecialchars($_GET['edit_id']);
     
        $result = $commons->getRow("SELECT * FROM report WHERE id='$edit_id'");

        $date=$result['date'];
        $detail=$result['report_details'];
        $detail = preg_replace("/[\n\r]/","<br />", $detail);
        $detail = str_replace('<br /><br />','<br />', $detail);

        

        if(isset($_POST['update_report'])){
            $date = $_POST['date'];
            $detail = $_POST['detail'];
            $detail = preg_replace("/[\n\r]/","<br />", $detail);
        $detail = str_replace('<br /><br />','<br />', $detail);
            if($_SESSION['id'] == $result['user_id']) {
                $result = $commons->updateData("UPDATE report SET date='$date', report_details='$detail', updated_date=now() WHERE id='$edit_id'");
                if($result) {
                    
                    header ("location: report_lists.php");
                    $_SESSION['success_report']="Update Report Successfully!";
                }
                else {
                    $_SESSION['error_report']="Update Report Failed!";
            
                }
            }
            
        }
    }
?>