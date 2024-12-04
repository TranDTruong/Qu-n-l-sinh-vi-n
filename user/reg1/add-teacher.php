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
    <div class="container">
        <h1>Thêm mới giảng viên</h1>
        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã giảng viên</td>
                    <td><input type="text" name="uid" id="uid" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="fullname" id="fullname" class="form-control" /></td>
                </tr>
                <tr>
                    <td><label for="">Giới tính</label>
                    <td>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="date" id="date" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="">Quê quán</label>
                    <td>
                        <select name="address" id="address" class="form-control" required>
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
                    <td><input type="text" name="phone" id="phone" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="">Chứng chỉ</label>
                    <td>
                        <select name="certificate" id="certificate" class="form-control" required>
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
                        <select name="specialization" id="specialization" class="form-control" required>
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
                        <a href="list.php" class="btn btn-primary">
                            <i class="fas fa-reply"></i> Quay lại
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    include('db/connect.php');

    if (isset($_POST['btnSave'])) {
        $uid = $_POST['uid'];
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $certificate = $_POST['certificate'];
        $specialization = $_POST['specialization'];
        $errors = [];
        if (empty($uid)) {
            $errors['uid'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $uid,
                'msg' => 'Vui lòng nhập mã Học sinh'
            ];
        }
        if (!empty($uid) && strlen($uid) < 3) {
            $errors['uid'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $uid,
                'msg' => 'Mã sinh viên phải có ít nhất 3 ký tự'
            ];
        }
        if (!empty($uid) && strlen($uid) > 50) {
            $errors['uid'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $uid,
                'msg' => 'Mã sinh viên không được vượt quá 50 ký tự'
            ];
        }

        // Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
        // empty($errors);
        if (!empty($errors)) {
            // In ra thông báo lỗi
            // kèm theo dữ liệu thông báo lỗi
            foreach ($errors as $errorField) {
                foreach ($errorField as $error) {
                    echo $error['msg'] . '<br />';
                }
            }
            return;
        }

        $sql = <<<EOT
        INSERT INTO `teacher` (`uid`, `fullname`, `gender`, `date`, `phone`, `address`, `certificate`, `specialization`) 
        VALUES ('$uid', '$fullname', '$gender', '$date', '$phone', '$address', '$certificate', '$specialization')
        EOT;
        // Thực thi INSERT
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