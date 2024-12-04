<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <title>Quản lý giảng viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
    include('db/connect.php');
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter
    $uid = ($_GET['uid']);
    $sqlSelect = "SELECT * FROM `teacher` WHERE `uid`='$uid'";
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
        <h1>Cập nhật thông tin giảng viên</h1>
        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã giảng viên</td>
                    <td><input type="text" name="uid" class="form-control" value="<?php echo $query['uid'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Tên giảng viên</td>
                    <td><input type="text" name="fullname" class="form-control" value="<?php echo $query['fullname'] ?>" /></td>
                </tr>
                <tr>
                    <td><label for="">Giới tính</label>
                    <td>
                        <select name="gender" id="gender" class="form-control" value="<?php echo $query['gender'] ?>" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="date" class="form-control" value="<?php echo $query['date'] ?>" /></td>
                </tr>
                <tr>
                    <td><label for="">Quê quán</label>
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
                    <td>Số điện thoại</td>
                    <td><input type="text" name="phone" class="form-control" value="<?php echo $query['phone'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="">Chứng chỉ</label>
                    <td>
                        <select name="certificate" id="certificate" class="form-control" value="<?php echo $query['certificate'] ?>" required>
                            <option value="Các loại chứng chỉ">Các loại chứng chỉ</option>
                            <option value="Cử nhân">Cử nhân</option>
                            <option value="Kỹ Sư">Kỹ Sư</option>
                            <option value="Thạc Sĩ">Thạc Sĩ</option>
                            <option value="Tiến Sĩ">Tiến Sĩ</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Chuyên ngành</label>
                    <td>
                        <select name="specialization" id="specialization" class="form-control" value="<?php echo $query['specialization'] ?>" required>
                            <option value="">Các chuyên ngành</option>
                            <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                            <option value="Quản trị kinh doanh">Quản trị kinh doanh</option>
                            <option value="Dược">Dược</option>
                            <option value="Kỹ thuật Ô tô">Kỹ thuật Ô tô</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
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
        $gender = $_POST['gender'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $certificate = $_POST['certificate'];
        $specialization = $_POST['specialization'];
        // $updated_at = date('Y-m-d H:i:s'); 
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        // Câu lệnh UPDATE
        $sql = "UPDATE `teacher` SET `uid`='$uid', `fullname`='$fullname', `gender`='$gender', `date`='$date', 
        `address`='$address', `phone`='$phone', `certificate`='$certificate', `specialization`='$specialization' WHERE `uid`=$uid";
        // Thực thi UPDATE
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>location.replace('list.php')</script>";
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