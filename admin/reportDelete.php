<?php

session_start();
include '../function.php';
$id = $_GET['delete'];
$data = new Common();
// if($_SESSION['id'] = $id) {
//     $sqlde = $data->getReturnData("DELETE FROM report WHERE id = ? ", [$id]);
//     header("location: index.php");
// }
// else {
//     header("location: ../login.php");
// }

$sqlde = $data->getReturnData("DELETE FROM report WHERE id = ? ", [$id]);
// $sqlde = $data->getReturnData("DELETE FROM report WHERE id = ? , adminId = ?", [$id, $_SESSION['id']]);
header("location: index.php");


?>