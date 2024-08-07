<!DOCTYPE html>
<?php
include '../../model/pdo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['account'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra nếu mật khẩu khớp
    if ($password != $confirm_password) {
        die("Mật khẩu không khớp.");
    }

    // Hash mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
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
        <link rel="stylesheet" href="../../css/login_signup.css?<?=time();?>" />
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
            <div class="form_signup">
                <h2>Welcome to TDI</h2>
                <form action="signup.php" method="POST">
                    <div class="row">
                        <div class="column">
                            <label for="firstName">Họ</label>
                            <input type="text" id="firstName" name="firstName" placeholder="Họ"/>  
                            <span class="error"></span>
                        </div>
                        <div class="column">
                            <label for="lastName">Tên</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Tên"/>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="abc@domain.com"/>
                            <span class="error"></span>
                        </div>
                        <div class="column">
                            <label for="sdt">SĐT</label>
                            <input type="text" id="sdt" name="phone" placeholder="+8189898989"/>
                            <span class="error"></span>
                        </div>
                    </div>
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
                    <div class="column">
                        <label for="confirm_password">Nhập lại mật khẩu</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Mật khẩu..."/>
                        <span class="error"></span>
                    </div>
                    <button type="submit" class="btn_signup">Đăng ký</button>
                    <span class="more_signup">Đã có tài khoản?<a href="./dangnhap.php">Đăng nhập</a></span>
                </form>

            </div>
        </div>
        <script src="../../js/lili.js"></script>
    </body>
</html>
