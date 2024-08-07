<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/stylestc.css" />
        <!-- font-size -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="alll">
            <article>
                <a href="./index2.php"><h1>TDI</h1></a>
                <ul>
                    <li><a href="./index2.php">Danh mục</a></li>
                    <li><a href="./hanghoa.php">Hàng hóa</a></li>
                    <li><a href="./khachhang.php">Khách hàng</a></li>
                    <li><a href="./binhluan.php">Quản lý bình luận</a></li>
                    <li><a href="./quanly.php">Quản lý người dùng</a></li>
                </ul>
            </article>
            <section>
                <header>
                    <h1>QUẢN TRỊ WEBSITE</h1>
                    <div class="sreach">
                        <form action="">
                            <input type="text" placeholder="   Tìm kiếm..." />
                        </form>
                    </div>
                </header>
                <aside style="background-color: #4793af">
                    <div class="forall">
                        <h2>Thêm Sản Phẩm</h2>
                        <form
                            action=""
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            <input type="hidden" name="id_product" />
                            <div class="row">
                                <label>Tên sản phẩm:</label>
                                <input type="text" name="name" />
                            </div>
                            <div class="row">
                                <label>Ảnh:</label>
                                <div>
                                    <input type="file"  name="img_product" />
                                </div>
                            </div>
                            <div class="row"> 
                                <label>Ngày bắt đầu:</label>
                                <input type="date" name="start_day" />
                            </div>
                            <div class="row">
                                <label>Ngày kết thúc:</label>
                                <input type="date" name="end_day" />
                            </div>
                            <div class="row">
                                <label for="">Nơi nhập khẩu:</label>
                                <select name="nhapkhau" id="" >
                                    <?php foreach($ds as $cate_sup): ?>
                                        <option value="<?= $cate_sup["from_cate"] ?>"><?= $cate_sup["ten"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn" name="btn_gui">Gửi</button>
                            <input class="btn" type="reset"/>
                        </form>
                    </div>
                </aside>
            </section>
        </div>
    </body>
</html>
