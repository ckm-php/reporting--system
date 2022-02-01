<?php 
    require_once('model/common.php');
    $commons = new Common;

    if(isset($_GET['edit_id'])){
        $edit_id = $_GET['edit_id'];
     
        $result = $commons->getRow("SELECT * FROM report WHERE id='$edit_id'");

        $date=$result['date'];
        $detail=$result['report_details'];

        

        if(isset($_POST['update_report'])){
            $date = $_POST['date'];
            $detail = $_POST['detail'];

            $result = $commons->updateData("UPDATE report SET date='$date', report_details='$detail', updated_date=now() WHERE id='$edit_id'");
            if($result) {
                
                header ("location: list_report.php");
                $_SESSION['success_report']="Update Report Successfully!";
            }
            else {
                $_SESSION['error_report']="Update Report Failed!";
        
            }
         
            
        }
    }
?>