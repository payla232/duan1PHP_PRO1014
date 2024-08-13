<?php 
include '../../model/pdo.php';
include '../../model/list.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- css -->
    <link rel="stylesheet" href="../../css/login_signup.css?<?= time(); ?>">
    <!-- font-size -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="page">
        <div class="form">
            <div class="form_img">
                <img src="../../img/default.jpg" alt="" />
            </div>
            <div class="form_title">
                <h2>Đăng ký tài khoản</h2>
                <?php 
                if (isset($_POST['btn_signup'])) {
                    $username = $_POST['account'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];

                    $checkUser = pdo_query_one("SELECT * FROM `user` WHERE `user` = '$username' ");
                    $checkEmail = pdo_query_one("SELECT * FROM `user` WHERE `email` = '$email' ");

                    if (empty($username) || empty($password) || empty($email)) {
                        echo '<div class="alert-danger text-center">Vui lòng nhập đầy đủ thông tin</div>';
                    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert-danger text-center">Email không hợp lệ</div>';
                    } else if (strlen($password) <= 8) {
                        echo '<div class="alert-danger text-center">Mật khẩu phải lớn hơn 8 ký tự</div>';
                    } else if($checkUser) {
                        echo '<div class="alert-danger text-center">Tài khoản đã tồn tại</div>';
                    } else if($checkEmail) {
                        echo '<div class="alert-danger text-center">Email đã tồn tại</div>';
                    } else {
                        pdo_query("INSERT INTO `user`(`email`, `user`, `password`, `role`) VALUES ('$email','$username','$password','0')");
                        echo '<script>location.href= "/duan1/view/login/dangnhap.php"</script>';
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="column">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email..." value="<?=($_POST['email'] ?? '');?>" />
                        <span class="error"></span>
                    </div>
                    <div class="column">
                        <label for="account">Tài khoản</label>
                        <input type="text" id="account" name="account" placeholder="Tài khoản..." value="<?=($_POST['account'] ?? '');?>" />
                        <span class="error"></span>
                    </div>
                    <div class="column">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" placeholder="Mật khẩu..." value="<?=($_POST['password'] ?? '');?>" />
                        <span class="error"></span>
                    </div>
                    <button type="submit" class="btn_login" name="btn_signup">Đăng ký</button>
                </form>

                <div class="more_login">
                    <span>Đã có tài khoản?<a href="./dangnhap.php"> Đăng Nhập</a></span>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/lili.js"></script>
</body>

</html>
