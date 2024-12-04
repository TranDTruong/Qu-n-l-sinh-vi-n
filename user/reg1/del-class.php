<?php
include('db/connect.php');

$malop = ($_GET['malop']);
$sql = "DELETE FROM `lophoc` WHERE `malop`='$malop';";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header('location:list-class.php');