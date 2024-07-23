<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../css/login_signup.css?<?=time();?>" />
        <title>Document</title>
    </head>
    <body>
        <div class="page">
            <div class="form_signup">
                <h2>Welcome to TDI</h2>
                <form action="">
                    <div class="row">
                        <div class="column">
                            <label for="">Họ</label>
                            <input type="text" />
                        </div>
                        <div class="column">
                            <label for="">Tên</label>
                            <input type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="">Email</label>
                            <input type="email" />
                        </div>
                        <div class="column">
                            <label for="">SĐT</label>
                            <input type="number" />
                        </div>
                    </div>
                    <div class="column">
                        <label for="">Tài khoản</label>
                        <input type="text" />
                    </div>
                    <div class="column">
                        <label for="">Mật khẩu</label>
                        <input type="text" />
                    </div>
                    <div class="column">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="text" />
                    </div>
                    <button type="submit" class="btn_login">Đăng ký</button>
                    <span class="more_signup"
                        >Đã có tài khoản?<a href="./dangnhap.php">Đăng nhập</a></span
                    >
                </form>
            </div>
        </div>
    </body>
</html>
