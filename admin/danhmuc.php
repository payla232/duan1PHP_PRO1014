<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/curd.css" />
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
                    <li><a href="index2.php">Danh mục</a></li>
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
                    <button class="btn_add"><a href="?act=them">Nhập thêm sản phẩm</a></button>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="th" colspan="7">Danh mục</th>
                                </tr>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Nơi nhập khẩu</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($listall as $category):
                                    extract($category);    
                                ?>
                                <tr>
                                    <td><?= $id_cate ?></td>
                                    <td><?= $name_cate ?></td>
                                    <td><img src="../img/<?= $img_cate?>" style="width:80px; height:80px;" alt=""></td>
                                    <td><?= $starday_cate ?></td>
                                    <td><?= $endday_cate ?></td>
                                    <td><?= $from_cate ?></td>
                                    <td class="tdd">
                                        <button><a href="?act=sua&id_cate=<?= $id_cate ?>">Sửa</a></button>
                                        <button><a href="?act=xoa&id_cate=<?= $id_cate ?>" onclick="return confirm('Bạn muốn xóa')" >Xóa</a></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </aside>
            </section>
        </div>
    </body>
</html>