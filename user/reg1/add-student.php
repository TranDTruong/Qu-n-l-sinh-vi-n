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
    <div class="container">
        <h1>Thêm mới học sinh</h1>
        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã học sinh</td>
                    <td><input type="text" name="uid" id="uid" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="fullname" id="fullname" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="date" id="date" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="gender">Giới tính</label>
                    <td>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Quê quán</label>
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
                    <td>Mã lớp</td>
                    <td><input type="text" name="malop" id="malop" class="form-control"></td>
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
    include('db/connect.php');

    if (isset($_POST['btnSave'])) {
        $uid = $_POST['uid'];
        $fullname = $_POST['fullname'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $malop = $_POST['malop'];
        // $created_at = date('Y-m-d H:i:s'); 
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`
        // $updated_at = NULL;
        // Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];
        // --- Kiểm tra Mã nhà cung cấp (validate)
        // required (bắt buộc nhập <=> không được rỗng)
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
                'msg' => 'Mã học sinh phải có ít nhất 3 ký tự'
            ];
        }
        if (!empty($uid) && strlen($uid) > 50) {
            $errors['uid'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $uid,
                'msg' => 'Mã học sinh không được vượt quá 50 ký tự'
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
        INSERT INTO `student` (`uid`, `fullname`, `date`, `address`, `malop`) 
        VALUES ('$uid', '$fullname', '$date', '$address', '$malop')
        EOT;
        // Thực thi INSERT
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