<?php
include '../model/pdo.php';
include '../model/list.php';
$user = pdo_query_one("SELECT * FROM `user` WHERE `id` = '" . $_GET['id'] . "' ");
extract($user);
?>

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
        rel="stylesheet" />
</head>

<body>
    <div class="alll">
        <article>
            <a href="./index.php">
                <h1>TDI</h1>
            </a>
            <ul>
                <li><a href="./danhmuc.php">Danh mục</a></li>
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
            <aside style="background-color: #4793af">
                <div class="forall">
                    <h4 style="text-align: center">Sửa Khách Hàng: <?= $user; ?></h4>
                    <form
                        action=""
                        method="POST"
                        enctype="multipart/form-data">
                        <?php
                        if(isset($_POST['btn_update'])) {
                            pdo_query("UPDATE `user` SET `first_name`='".$_POST['first_name']."',`last_name`='".$_POST['last_name']."',`email`='".$_POST['email']."',`sdt`='".$_POST['sdt']."' WHERE `id` = '$id' ");
                            echo '<script>location.href=""</script>';
                        }
                        ?>
                        <div class="row">
                            <label>Họ:</label>
                            <input name="first_name" value="<?= $first_name ?>" placeholder="Cập nhật họ" />
                        </div>
                        <div class="row">
                            <label>Tên:</label>
                            <input name="last_name" value="<?= $last_name ?>" placeholder="Cập nhật tên" />
                        </div>
                        <div class="row">
                            <label>Số điện thoại:</label>
                            <input name="sdt" value="<?= $sdt ?>" placeholder="Cập nhật số điện thoại" />
                        </div>
                        <div class="row">
                            <label>Email:</label>
                            <input name="email" value="<?= $email ?>" placeholder="Cập nhật email" />
                        </div>
                        <button class="btn" type="submit" name="btn_update">Cập nhật</button>
                    </form>
                </div>
            </aside>
        </section>
    </div>
</body>
</html>