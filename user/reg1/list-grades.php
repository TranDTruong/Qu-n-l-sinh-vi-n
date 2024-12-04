<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <title>Danh sách điểm sinh viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Danh sách Điểm sinh viên</h1>

        <?php
        include('db/connect.php');

        $sql = "select * from `grades` ORDER BY uid ASC";
        // Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'id' => $row['id'], //Ma mon hoc
                'uid' => $row['uid'], // Ma sinh vien
                'diemchuyencan' => $row['diemchuyencan'],
                'diemgiuaky' => $row['diemgiuaky'],
                'diemcuoiky' => $row['diemcuoiky'],
                'diemtong' => $row['diemtong'],
                'lanthi' => $row['lanthi'],
            );
            $rowNum++;
        }
        ?>

        <a href="add-grades.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm mới
        </a>
        <a href="trangchu.php" class="btn btn-primary">
            <i class="fas fa-reply"></i> Quay lại
        </a>
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>Mã môn học</th>
                    <th>Mã sinh viên</th>
                    <th>Điểm chuyên cần</th>
                    <th>Điểm giữa kỳ</th>
                    <th>Điểm cuối kỳ</th>
                    <th>Điểm tổng kết</th>
                    <th>Lần thi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                <tr>
                    <!-- <td><?php //echo $row['rowNum']; 
                                    ?></td> -->
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['diemchuyencan']; ?></td>
                    <td><?php echo $row['diemgiuaky']; ?></td>
                    <td><?php echo $row['diemcuoiky']; ?></td>
                    <td><?php echo $row['diemtong']; ?></td>
                    <td><?php echo $row['lanthi']; ?></td>
                    <td>
                        <a href="edit-grades.php?uid=<?php echo $row['uid'] ?>" name="btnUpdate" id="btnUpdate"
                            class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="del-grades.php?uid=<?php echo $row['uid'] ?>" name="btnDelete" id="btnDelete"
                            class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

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