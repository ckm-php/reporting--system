<?php 

    require_once "../model/common.php";

    if(isset($_POST['report'])){
        $commons = new Common;
        $id =$_SESSION['id'];
        $date =$_POST['date'];
        $detail =htmlspecialchars($_POST['detail']);
        // $detail =$_POST['detail'];
        // $detail = str_replace('&#13;&#10;', "\n", $detail);
        $detail = preg_replace("/[\n\r]/","<br />", $detail);
        $detail = str_replace('<br /><br />','<br />', $detail);
        

        $results = $commons->insertData("INSERT INTO report (user_id, date, report_details ,created_date,updated_date) VALUES ('$id', '$date', '$detail', now(),now())");
        $_SESSION['success']="Create Report Successfully!";
        header("Location:report_lists.php");
 

    }

 ?>