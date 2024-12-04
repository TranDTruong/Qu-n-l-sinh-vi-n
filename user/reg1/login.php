<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="icon" href="image/LogoUser.jpg" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Login</h2>
                <p>Please fill in your username and password.</p>
                <form action="log.php" method="post">
                    <div class="form-group">
                        <label for="">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn-log" class="btn btn-outline-primary mt-0">
                    </div>
                    <p>Don't have an accout?<a href="register.php">Register here</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>