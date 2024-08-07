<!DOCTYPE html>
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
                <form action="">
                    <div class="row">
                        <div class="column">
                            <label for="firstName">Họ</label>
                            <input type="text" id="firstName" placeholder="Họ"/>  
                            <span class="error"></span>
                        </div>
                        <div class="column">
                            <label for="lastName">Tên</label>
                            <input type="text" id="lastName" placeholder="Tên"/>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="abc@domain.com"/>
                            <span class="error"></span>
                        </div>
                        <div class="column">
                            <label for="sdt">SĐT</label>
                            <input type="text" id="sdt" placeholder="+8189898989"/>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="column">
                        <label for="account">Tài khoản</label>
                        <input type="text" id="account" placeholder="Tài khoản..."/>
                        <span class="error"></span>
                    </div>
                    <div class="column">
                        <label for="password">Mật khẩu</label>
                        <input type="text" id="password" placeholder="Mật khẩu..."/>
                        <span class="error"></span>
                    </div>
                    <div class="column">
                        <label for="confirm_password">Nhập lại mật khẩu</label>
                        <input type="text" id="confirm_password" placeholder="Mật khẩu..."/>
                        <span class="error"></span>
                    </div>
                    <button type="submit" class=" btn_signup">Đăng ký</button>
                    <span class="more_signup"
                        >Đã có tài khoản?<a href="./dangnhap.php">Đăng nhập</a></span
                    >
                </form>
            </div>
        </div>
        <script src="../../js/lili.js"></script>
    </body>
</html>
