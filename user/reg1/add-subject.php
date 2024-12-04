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
        <h1>Thêm mới môn học</h1>
        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã môn học</td>
                    <td><input type="text" name="id" id="id" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tên môn học</td>
                    <td><input type="text" name="name" id="name" class="form-control" /></td>
                </tr>
                <tr>
                    <td><label for="">Số tín chỉ</label>
                    <td>
                        <select name="sotinchi" id="sotinchi" class="form-control" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                    </td>
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
    include('db/connect.php');

    if (isset($_POST['btnSave'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sotinchi = $_POST['sotinchi'];
        // $created_at = date('Y-m-d H:i:s'); 
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`
        // $updated_at = NULL;
        // Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];
        // --- Kiểm tra Mã nhà cung cấp (validate)
        // required (bắt buộc nhập <=> không được rỗng)
        if (empty($id)) {
            $errors['id'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $id,
                'msg' => 'Vui lòng nhập mã Môn học'
            ];
        }
        if (!empty($id) && strlen($id) < 3) {
            $errors['id'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $id,
                'msg' => 'Mã môn học phải có ít nhất 3 ký tự'
            ];
        }
        if (!empty($id) && strlen($id) > 50) {
            $errors['id'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $id,
                'msg' => 'Mã môn học không được vượt quá 50 ký tự'
            ];
        }

        // --- Kiểm tra Tên nhà cung cấp (validate)
        // required (bắt buộc nhập <=> không được rỗng)
        // if (empty($description)) {
        //     $errors['description'][] = [
        //         'rule' => 'required',
        //         'rule_value' => true,
        //         'value' => $description,
        //         'msg' => 'Vui lòng nhập mô tả Loại sản phẩm'
        //     ];
        // }
        // minlength 3 (tối thiểu 3 ký tự)
        // if (!empty($description) && strlen($description) < 3) {
        //     $errors['description'][] = [
        //         'rule' => 'minlength',
        //         'rule_value' => 3,
        //         'value' => $description,
        //         'msg' => 'Mô tả loại sản phẩm phải có ít nhất 3 ký tự'
        //     ];
        // }
        // maxlength 255 (tối đa 255 ký tự)
        // if (!empty($description) && strlen($description) > 255) {
        //     $errors['description'][] = [
        //         'rule' => 'maxlength',
        //         'rule_value' => 255,
        //         'value' => $description,
        //         'msg' => 'Mô tả loại sản phẩm không được vượt quá 255 ký tự'
        //     ];
        // }

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
        INSERT INTO `subject` (`id`, `name`, `sotinchi`) 
        VALUES ('$id', '$name', '$sotinchi')
        EOT;
        // Thực thi INSERT
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location:monhoc.php');
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