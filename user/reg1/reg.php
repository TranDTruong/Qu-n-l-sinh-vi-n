<?php
require 'db/connect.php';
if (isset($_POST['btn-reg'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $comfirmpas = $_POST['confirm_password'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $hobby = ($_POST['hobby']);
    $yourself = $_POST['yourself'];

    if ($comfirmpas != $password) {
        setcookie("error", "Dang ky khong thanh cong!", time() + 1, "/", "", 0);
        echo '<script>alert("Mật khẩu không trùng khớp!!")</script>';
    } else if (
        !empty($username) && !empty($password) && !empty($comfirmpas) && !empty($email)
        && !empty($date) && !empty($gender) && !empty($city) && !empty($hobby) && !empty($yourself)
    ) {
        $sql = "INSERT INTO `users` (`username`, `password`, `confirm_password`, `email`,
        `date`, `gender`, `city`, `hobby`, `yourself`) VALUES('$username', md5('$password'), md5('$comfirmpas'),
        '$email', '$date', '$gender', '$city', '$hobby' ,'$yourself') ";

        if ($conn->query($sql) === true) {
            setcookie("success", "Dang ky thanh cong!", time() + 1, "/", "", 0);
            echo '<script>alert("Đăng ký thành công")</script>';
            echo "<script>location.replace('login.php')</script>";
        } else {
            echo "Loi {$sql}" . $conn->error;
        }
    }
}
