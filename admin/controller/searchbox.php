<?php
class Searchbox{
    function search_range($params = []) {
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $searchvalue = $_POST['searchvalue'];

        $query = "SELECT * FROM report INNER JOIN user ON report.user_id=user.id";
        $conditions = array();

        if(! empty($startdate) || ! empty($enddate) ) {
        $conditions[] = "report.date BETWEEN '$startdate' AND '$enddate'";
        }
        if(! empty($searchvalue)) {
        $conditions[] = "name='$searchvalue'";
        }

        $sql = $query;
        if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $conditions) ."ORDER BY report.date DESC";
        }
     
         $result = mysql_query($sql);
     
         return $result;
     }
}

?> 