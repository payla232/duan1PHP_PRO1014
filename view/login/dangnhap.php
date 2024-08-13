<?php include '../../model/pdo.php';
include '../../model/list.php'; ?>
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
                <h2>Welcome to TDI</h2>
                <?php if (isset($_POST['btn_login'])) {
                    $username = $_POST['account'];
                    $password = $_POST['password'];

                    $checkUser = pdo_query_one("SELECT * FROM `user` WHERE `user` = '$username' ");

                    if (empty($username) || empty($password)) {
                        echo '<div class="alert-danger text-center">Vui lòng nhập đầy đủ thông tin</div>';
                    } else if(!$checkUser) {
                        echo '<div class="alert-danger text-center">Tài khoản không chính xác</div>';
                    } else if($password !== $checkUser['password']) {
                        echo '<div class="alert-danger text-center">Mật khẩu không chính xác</div>';
                    } else {
                        $_SESSION['username'] = $username;

                        echo '<script>location.href= "/duan1"</script>';
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="column">
                        <label for="account">Tài khoản</label>
                        <input type="text" id="account" name="account" placeholder="Tài khoản..." value="<?=($_POST['account'] ?? '');?>"/>
                        <span class="error"></span>
                    </div>
                    <div class="column">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" placeholder="Mật khẩu..."  value="<?=($_POST['password'] ?? '');?>"/>
                        <span class="error"></span>
                    </div>
                    <button type="submit" class="btn_login" name="btn_login">Đăng nhập</button>
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