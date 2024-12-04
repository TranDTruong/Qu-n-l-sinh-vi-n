<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <title>Thêm giảng viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Danh sách Giảng Viên</h1>

        <?php
        include("db/connect.php");
        $sql = "select * from `teacher` ORDER BY uid ASC";
        // Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'uid' => $row['uid'],
                'fullname' => $row['fullname'],
                'gender' => $row['gender'],
                'date' => $row['date'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'certificate' => $row['certificate'],
                'specialization' => $row['specialization'],
            );
            $rowNum++;
        }
        ?>

        <a href="add-teacher.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm mới
        </a>
        <a href="trangchu.php" class="btn btn-primary">
            <i class="fas fa-reply"></i> Quay lại
        </a>
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>Mã giảng viên</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Quê quán</th>
                    <th>Số điện thoại</th>
                    <th>Chứng chỉ</th>
                    <th>Chuyên ngành</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                <td><?php echo $row['uid']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['certificate']; ?></td>
                <td><?php echo $row['specialization']; ?></td>
                <td>
                    <a href="edit-teacher.php?uid=<?php echo $row['uid'] ?>" name="btnUpdate" id="btnUpdate"
                        class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="del-teacher.php?uid=<?php echo $row['uid']; ?>" name="btnDelete" id="btnDelete"
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