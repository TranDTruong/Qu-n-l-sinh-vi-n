<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lớp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Thêm mới lớp</h1>
        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã lớp</td>
                    <td><input type="text" name="malop" id="malop" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tên Lớp</td>
                    <td><input type="text" name="tenlop" id="tenlop" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Năm đào tạo</td>
                    <td><input type="date" name="namdaotao" id="namdaotao" class="form-control"></td>
                </tr>
                <tr>
                    <td>Năm kết thúc</td>
                    <td><input type="date" name="namketthuc" id="namketthuc" class="form-control"></td>
                    </td>
                </tr>
                <tr>
                    <td>Mã khoa</td>
                    <td><input type="text" name="makhoa" id="makhoa" class="form-control" /></td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                        <a href="list-class.php" class="btn btn-primary">
                            <i class="fas fa-reply"></i> Quay lại
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </head>

    <?php
    include('db/connect.php');

    if (isset($_POST['btnSave'])) {
        $malop = $_POST['malop'];
        $tenlop = $_POST['tenlop'];
        $namdaotao = $_POST['namdaotao'];
        $namketthuc = $_POST['namketthuc'];
        $makhoa = $_POST['makhoa'];
        // $created_at = date1('Y-m-d H:i:s'); 
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`
        // $update1d_at = NULL;
        // Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];
        // --- Kiểm tra Mã nhà cung cấp (validate1)
        // required (bắt buộc nhập <=> không được rỗng)
        if (empty($malop)) {
            $errors['malop'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $malop,
                'msg' => 'Vui lòng nhập mã lớp'
            ];
        }
        if (!empty($malop) && strlen($malop) < 3) {
            $errors['malop'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $malop,
                'msg' => 'Mã lớp phải có ít nhất 3 ký tự'
            ];
        }
        if (!empty($malop) && strlen($malop) > 50) {
            $errors['malop'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $malop,
                'msg' => 'Mã lớp không được vượt quá 50 ký tự'
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
        INSERT INTO `lophoc` (`malop`, `tenlop`, `namdaotao`, `namketthuc`, `makhoa`) 
        VALUES ('$malop', '$tenlop', '$namdaotao', '$namketthuc', '$makhoa')
        EOT;
        // Thực thi INSERT
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location:list-class.php');
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>