<?php
// unset($_SESSION['username']);
//Khái báo utf-8 để hiện thị TV
require_once 'db/connect.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['btn-log'])) {
    //Lay du lieu nhap vao
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $query = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password';";
    $result = mysqli_query($conn, $query);
    // or die(mysqli_error($conn));
    // var_dump($result);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // echo "Tên đăng nhập hoặc mật khẩu không đúng";
        $_SESSION['username'] = $row['username'];
        echo "<script>alert('Đăng nhập thành công!!')</script>";
        echo "<script>location.replace('trangchu.php')</script>";
    } else {
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng nhập lại.')</script>";
        echo "<script>location.replace('login.php')</script>";;
    }

    // var_dump($row['username']);
    // die();
    // $conn->close();
}