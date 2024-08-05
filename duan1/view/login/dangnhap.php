<!DOCTYPE html>
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
                    <form action="">
                        <div class="column">
                            <label for="account">Tài khoản</label>
                            <input type="text" id="account" placeholder="Tài khoản..."/>
                        </div>
                        <div class="column">
                            <label for="password">Mật khẩu</label>
                            <input type="text" id="password" placeholder="Mật khẩu..."/>
                        </div>
                        <button type="submit" class="btn_login">
                            Đăng nhập
                        </button>
                    </form>
                    <div class="more_login">
                        <span><a href="#!">Quên mật khẩu?</a></span>
                        <span>Chưa có tài khoản?<a href="./signup.php"> Đăng ký</a></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
