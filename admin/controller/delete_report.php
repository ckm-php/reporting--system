<?php 
    require_once('../model/common.php');
    $commons = new Common;
    if(isset($_GET['del_id'])){
        $del_id = $_GET['del_id'];
        $query = "SELECT * FROM report WHERE id='$del_id'";
        $result = $commons->getRow($query);
        if($_SESSION['id'] == $result['user_id']) {
            $result = $commons->deleteData("DELETE FROM report WHERE id='$del_id'");
            if(!empty($result)){
                header("Location:list_report.php");
            }
        }
    }


?>