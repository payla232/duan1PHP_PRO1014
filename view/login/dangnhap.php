<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../model/pdo.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['account'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            echo "Đăng nhập thành công!";
        } else {
            echo "Mật khẩu không đúng.";
        }
    } else {
        echo "Không tìm thấy người dùng với tên đăng nhập này.";
    }

    $stmt->close();
}

$conn->close();
?>


<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- css -->
        <link rel="stylesheet" href="../../css/login_signup.css?<?=time();?>">
        <!-- font-size -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
        <title>Document</title>
    </head>
    <body>
    <div class="page">
            <div class="form">
                <div class="form_img">
                    <img src="../../img/default.jpg" alt="" />
                </div>
                <div class="form_title">
                    <h2>Welcome to TDI</h2>
                    <form action="login.php" method="POST">
                        <div class="column">
                            <label for="account">Tài khoản</label>
                            <input type="text" id="account" name="account" placeholder="Tài khoản..."/>
                            <span class="error"></span>
                        </div>
                        <div class="column">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" placeholder="Mật khẩu..."/>
                            <span class="error"></span>
                        </div>
                        <button type="submit" class="btn_login">Đăng nhập</button>
                    </form>

                    <div class="more_login">
                        <span><a href="#!">Quên mật khẩu?</a></span>
                        <span>Chưa có tài khoản?<a href="./signup.php"> Đăng ký</a></span>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../js/lili.js"></script>
    </body>
</html>
