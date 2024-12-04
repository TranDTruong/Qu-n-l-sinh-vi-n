<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="icon" href="image/LogoUser.jpg">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Register</h2>
                <p>Please fill this form to create an account.</p>
                <form action="reg.php" method="post">
                    <div class="form-group">
                        <label for="">Username:</label>
                        <input type="text" name="username" size="30" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" name="password" size="30" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Comfirm password:</label>
                        <input type="password" name="confirm_password" size="30" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" name="email" size="30" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Date:</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sex:</label> &emsp;&emsp;
                        <input type="radio" name="gender" id="male" class="form-check-label " value="male"><label for=""
                            name="male">Nam</label>
                        &emsp;&emsp;
                        <input type="radio" name="gender" id="female" class="form-check-label" value="female"><label
                            for="" name="female">Nữ</label> &emsp;&emsp;
                        <input type="radio" name="gender" id="other" class="form-check-label" value="other"><label
                            for="" name="other">Khác</label>
                    </div>
                    <div class="form-group">
                        <label for="">Province/City:</label>&emsp;
                        <select name="city" id="city" required>
                            <option value=""></option>
                            <optgroup label="Miền Bắc">
                                <option value="Ha Noi">Hà Nội</option>
                                <option value="Bac Ninh">Bắc Ninh</option>
                                <option value="Bac Giang">Bắc Giang</option>
                                <option value="Thai Nguyen">Thái Nguyên</option>
                            </optgroup>
                            <optgroup label="Miền Trung">
                                <option value="Nghe An">Nghệ An</option>
                                <option value="Bac Giang">Thanh Hoá</option>
                            </optgroup>
                            <optgroup label="Miền Nam">
                                <option value="Ho Chi Minh">Hồ Chí Minh</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Hobby:</label>&emsp;
                        <input type="checkbox" name="hobby" class="form-check-label" value="Music"> Music &emsp;
                        <input type="checkbox" name="hobby" class="form-check-label" value="Sport"> Sport &emsp;
                        <input type="checkbox" name="hobby" class="form-check-label" value="Shopping"> Shopping &emsp;
                        <input type="checkbox" name="hobby" class="form-check-label" value="Travel"> Travel &emsp;
                    </div>
                    <div class="form-group">
                        <label for="">Describe yourself (if any): </label>
                        <textarea name="yourself" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn-reg" class="btn btn-outline-primary mt-0" onclick="myFunction()">
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>