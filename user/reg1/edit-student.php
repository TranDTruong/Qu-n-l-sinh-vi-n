<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <title>Quản lý học sinh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
    include('db/connect.php');
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter
    $uid = ($_GET['uid']);
    $sqlSelect = "SELECT * FROM `student` WHERE `uid`='$uid'";
    // Thực thi câu truy vấn SQL
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $query = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($query)) {
        echo "Giá trị uid: $uid không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>

    <div class="container">
        <h1>Cập nhật thông tin học sinh</h1>
        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã học sinh</td>
                    <td><input type="text" name="uid" class="form-control" value="<?php echo $query['uid'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="fullname" class="form-control" value="<?php echo $query['fullname'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="date" class="form-control" value="<?php echo $query['date'] ?>" /></td>
                </tr>
                <tr>
                    <td><label for="gender">Giới tính</label>
                    <td>
                        <select name="gender" id="gender" class="form-control" value="<?php echo $query['gender'] ?>" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Quê quán</label>
                    <td>
                        <select name="address" id="address" class="form-control" value="<?php echo $query['address'] ?>" required>
                            <option value=""></option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Bắc Ninh">Bắc Ninh</option>
                            <option value="Bắc Giang">Bắc Giang</option>
                            <option value="Thái Nguyên">Thái Nguyên</option>
                            <option value="Phú Thọ">Phú Thọ</option>
                            <option value="Thanh Hoá">Thanh Hoá</option>
                            <option value="Quảng Ninh">Quảng Ninh</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>Mã lớp</td>
                    <td><input type="text" name="malop" class="form-control" value="<?php echo $query['malop'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                        <a href="liststu.php" class="btn btn-primary">
                            <i class="fas fa-reply"></i> Quay lại
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    if (isset($_POST['btnSave'])) {
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $uid = $_POST['uid'];
        $fullname = $_POST['fullname'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $malop = $_POST['malop'];
        // $updated_at = date('Y-m-d H:i:s'); 
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        // Câu lệnh UPDATE
        $sql = "UPDATE `student` SET `uid`='$uid', `fullname`='$fullname', `date`='$date', `gender`='$gender', `address`='$address', `malop`='$malop' WHERE `uid`=$uid";
        // Thực thi UPDATE
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location:liststu.php');
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>