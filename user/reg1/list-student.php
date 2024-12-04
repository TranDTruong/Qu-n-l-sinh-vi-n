<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm học sinh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style>
* {
    font-family: Lato, sans-serif;
}

.header-logo {
    width: 100%;
    padding: 20px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    background-color: #0d6efd;

}

.name {
    position: relative;
    top: 20px;
}

.name h2 {
    color: #fff;
}

.name h3 {
    color: #fff;
}
</style>

<header>
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrap logo-home">
                <a class="header-logo" href="">
                    <img src="https://tmu.edu.vn/template_dhtm/images/logo-sm.png" width="120px" height="120px" alt=""
                        class="img-fluid logo-head">
                    <div class="name">
                        <h2>Trường đại học Thương Mại</h2>
                        <h3>Thuongmai University</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="container">
        <h1>Danh sách Sinh Viên</h1>

        <?php
        include('db/connect.php');

        $sql = "select * from `student` ORDER BY uid ASC";
        // Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                // 'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'uid' => $row['uid'],
                'fullname' => $row['fullname'],
                'date' => $row['date'],
                'gender' => $row['gender'],
                'address' => $row['address'],
                'malop' => $row['malop'],
            );
            $rowNum++;
        }
        ?>

        <a href="add-student.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm mới
        </a>
        <a href="trangchu.php" class="btn btn-primary">
            <i class="fas fa-reply"></i> Quay lại
        </a>
        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>Mã học sinh</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Quê quán</th>
                    <th>Mã lớp</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['malop']; ?></td>
                    <td>
                        <a href="edit-student.php?uid=<?php echo $row['uid'] ?>" name="btnUpdate" id="btnUpdate"
                            class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="del-student.php?uid=<?php echo $row['uid'] ?>" name="btnDelete" id="btnDelete"
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