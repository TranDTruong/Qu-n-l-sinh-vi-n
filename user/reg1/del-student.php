<?php
include('db/connect.php');

$uid = ($_GET['uid']);
$sql = "DELETE FROM `student` WHERE `uid`=$uid;";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header('location:liststu.php');
