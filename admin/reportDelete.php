<?php

session_start();
include '../function.php';
$id = $_GET['delete'];
$data = new Common();
$sqlde = $data->getReturnData("DELETE FROM report WHERE id = ? ", [$id]);
// $sqlde = $data->getReturnData("DELETE FROM report WHERE id = ? , adminId = ?", [$id, $_SESSION['id']]);

header("location: index.php");

?>