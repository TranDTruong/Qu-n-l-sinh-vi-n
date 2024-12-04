<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <title>Quản lý Điểm sinh viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Thêm mới Điểm</h1>
        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã môn học</td>
                    <td><input type="text" name="id" id="id" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Mã sinh viên</td>
                    <td><input type="text" name="uid" id="uid" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Điểm chuyên cần</td>
                    <td><input type="text" name="diemchuyencan" id="diemchuyencan" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Điểm giữa kỳ</td>
                    <td><input type="text" name="diemgiuaky" id="diemgiuaky" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Điểm cuối kỳ</td>
                    <td><input type="text" name="diemcuoiky" id="diemcuoiky" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tổng điểm</td>
                    <td><input type="text" name="diemtong" id="diemtong" class="form-control" readonly /></td>
                </tr>
                <tr>
                    <td>Lần thi</td>
                    <td><input type="text" name="lanthi" id="lanthi" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                        <a href="grades.php" class="btn btn-primary">
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
        $id = $_POST['id'];
        $uid = $_POST['uid'];
        $diemchuyencan = $_POST['diemchuyencan'];
        $diemgiuaky = $_POST['diemgiuaky'];
        $diemcuoiky = $_POST['diemcuoiky'];
        $diemtong = $_POST['diemtong'];
        $lanthi = $_POST['lanthi'];
        $errors = [];
        if (empty($uid)) {
            $errors['uid'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $uid,
                'msg' => 'Vui lòng nhập thông tin'
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
        INSERT INTO `grades` (`id`, `uid`, `diemchuyencan`, `diemgiuaky`, `diemcuoiky`, `diemtong`, `lanthi`) 
        VALUES ('$id', '$uid', '$diemchuyencan', '$diemgiuaky', '$diemcuoiky', '$diemtong', '$lanthi')
        EOT;
        // Thực thi INSERT
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>location.replace('grades.php')</script>";
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