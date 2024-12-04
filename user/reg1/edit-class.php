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

    <?php
    include('db/connect.php');
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter
    $malop = ($_GET['malop']);
    $sqlSelect = "SELECT * FROM `lophoc` WHERE `malop`='$malop'";
    // Thực thi câu truy vấn SQL
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $query = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($query)) {
        echo "Giá trị malop: $malop không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>

    <div class="container">
        <h1>Cập nhật thông tin lớp</h1>
        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã lớp</td>
                    <td><input type="text" name="malop" class="form-control" value="<?php echo $query['malop'] ?>"
                            readonly /></td>
                </tr>
                <tr>
                    <td>Tên lớp</td>
                    <td><input type="text" name="tenlop" class="form-control" value="<?php echo $query['tenlop'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Ngày bắt đầu</td>
                    <td><input type="date" name="namdaotao" class="form-control"
                            value="<?php //echo $query['ngaybatdau'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày kết thúc</td>
                    <td><input type="date" name="namketthuc" class="form-control"
                            value="<?php //echo $query['ngayketthuc'] ?>" /></td>
                </tr>
                <tr>
                    <td>Mã khoa</td>
                    <td><input type="text" name="makhoa" class="form-control" value="<?php echo $query['makhoa'] ?> "
                            readonly />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                        <a href="list-class-cntt.php" class="btn btn-primary">
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
        $malop = $_POST['malop'];
        $tenlop = $_POST['tenlop'];
        $namdaotao = $_POST['namdaotao'];
        $namketthuc = $_POST['namketthuc'];
        $makhoa = $_POST['makhoa'];
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        // Câu lệnh UPDATE
        $sql = "UPDATE `lophoc` SET `malop`='$malop', `tenlop`='$tenlop', `namdaotao`='$namdaotao', `namketthuc`='$namketthuc',  `makhoa`='$makhoa' WHERE `malop`='$malop'";
        // Thực thi UPDATE
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location:list-class-cntt.php');
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