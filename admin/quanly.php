<?php
include '../model/pdo.php';
include '../model/list.php';

if(isset($_GET['xoa'])) {
    pdo_query("DELETE FROM `user` WHERE `id` = '".$_GET['xoa']."' ");
    echo '<script>location.href="/duan1/admin/quanly.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/curd.css?<?= time(); ?>" />
        <!-- font-size -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
        <!-- icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="alll">
            <article>
                <a href="./index.php"><h1>TDI</h1></a>
                <ul>
                    <li><a href="index.php">Danh mục</a></li>
                    <li><a href="./khachhang.php">Quản lý đơn hàng</a></li>
                    <li><a href="./quanly.php">Quản lý người dùng</a></li>
                    <li><a href="./binhluan.php">Quản lý bình luận</a></li>
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
                <aside style="background-color: #4793af; padding-top: 20px; width: 100%">
                    <div class="table" style="width: 100%">
                        <table>
                            <thead>
                                <tr>
                                    <th class="th" colspan="7">Quản lý người dùng</th>
                                </tr>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach (pdo_query("SELECT * FROM `user` ORDER BY `id` DESC ") as $user):
                                    extract($user);    
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $user ?></td>
                                    <td><?= ($last_name ? $first_name."".$last_name :'Chưa cập nhật') ?></td>
                                    <td><?= $sdt ?></td>
                                    <td><?= $email ?></td>
                                    <td class="tdd">
                                        <button class="btn_sua">
                                            <a href="suaTk.php?id=<?= $id?>">
                                                <i class="fa-solid fa-pen-to-square"></i>Sửa
                                            </a>
                                        </button>
                                        <button class="btn_xoa">
                                            <a href="?xoa=<?= $id ?>" onclick="return confirm('Bạn muốn xóa')" >
                                                <i class="fa-solid fa-trash"></i>Xóa
                                            </a>
                                        </button>
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