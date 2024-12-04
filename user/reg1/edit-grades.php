<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <title>Quản lý điểm sinh viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
    include('db/connect.php');
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter
    $uid = ($_GET['uid']);
    $sqlSelect = "SELECT * FROM `grades` WHERE `uid`='$uid'";
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
        <h1>Cập nhật điểm sinh viên</h1>
        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã môn học</td>
                    <td><input type="text" name="id" id="id" class="form-control" value="<?php echo $query['id'] ?>"
                            readonly /></td>
                </tr>
                <tr>
                    <td>Mã sinh viên</td>
                    <td><input type="text" name="uid" id="uid" class="form-control" value="<?php echo $query['uid'] ?>"
                            readonly /></td>
                </tr>
                <tr>
                    <td>Điểm chuyên cần</td>
                    <td><input type="text" name="diemchuyencan" id="diemchuyencan" class="form-control"
                            value="<?php echo $query['diemchuyencan'] ?>" /></td>
                </tr>
                <tr>
                    <td>Điểm giữa kỳ</td>
                    <td><input type="text" name="diemgiuaky" id="diemgiuaky" class="form-control"
                            value="<?php echo $query['diemgiuaky'] ?>" /></td>
                </tr>
                <tr>
                    <td>Điểm cuối kỳ</td>
                    <td><input type="text" name="diemcuoiky" id="diemcuoiky" class="form-control"
                            value="<?php echo $query['diemcuoiky'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tổng điểm</td>
                    <td><input type="text" name="diemtong" id="diemtong" class="form-control" value="<?php
                                                                                                        $sqlS = "SELECT ((diemchuyencan * 10)/100 + 
                    (diemgiuaky *20)/100 + (diemcuoiky *70)/100) AS diemtong FROM grades WHERE uid='$uid';";
                                                                                                        $result = mysqli_query($conn, $sqlS);
                                                                                                        if ($result->num_rows > 0) {
                                                                                                            while ($row = $result->fetch_assoc()) {
                                                                                                                echo $row['diemtong'];
                                                                                                            }
                                                                                                        } else {
                                                                                                            echo "k co ";
                                                                                                        }
                                                                                                        ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td>Lần thi</td>
                    <td><input type="text" name="lanthi" id="lanthi" class="form-control"
                            value="<?php echo $query['lanthi'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                        <a href="list-grades.php" class="btn btn-primary">
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
        $id = $_POST['id'];
        $uid = $_POST['uid'];
        $diemchuyencan = $_POST['diemchuyencan'];
        $diemgiuaky = $_POST['diemgiuaky'];
        $diemcuoiky = $_POST['diemcuoiky'];
        $diemtong = $_POST['diemtong'];
        $lanthi = $_POST['lanthi'];
        // $updated_at = date('Y-m-d H:i:s'); 
        // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        // Câu lệnh UPDATE
        $sql = "UPDATE `grades` SET `id`='$id', `uid`='$uid', `diemchuyencan`='$diemchuyencan', `diemgiuaky`='$diemgiuaky', `diemcuoiky`='$diemcuoiky', 
        `diemtong`='$diemtong', `lanthi`='$lanthi' WHERE `uid`=$uid";
        // Thực thi UPDATE
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>location.replace('grades.php')</script>";
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