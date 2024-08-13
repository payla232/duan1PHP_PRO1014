<?php
include '../model/pdo.php';
include '../model/list.php';
$user = pdo_query_one("SELECT * FROM `orders` WHERE `id` = '" . $_GET['id'] . "' ");
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
                    <h4 style="text-align: center">Sửa Đơn Hàng: <?= $username; ?></h4>
                    <form
                        action=""
                        method="POST"
                        enctype="multipart/form-data">
                        <?php
                        if(isset($_POST['btn_update'])) {
                            pdo_query("UPDATE `orders` SET `status`='".$_POST['status']."' WHERE `id` = '$id' ");
                            echo '<script>location.href=""</script>';
                        }
                        ?>
                        <div class="row">
                            <label>Trạng thái:</label>
                            <select class="from-control" name="status">
                                <option value="pending" <?php if($status == "pending") { echo 'selected'; } ?>>Chờ Giao Hàng</option>
                                <option value="delivery" <?php if($status == "delivery") { echo 'selected'; } ?>>Đang Giao Hàng</option>
                                <option value="done" <?php if($status == "done") { echo 'selected'; } ?>>Đã Giao Hàng</option>
                                <option value="cancelOrder" <?php if($status == "cancelOrder") { echo 'selected'; } ?>>Hủy Đơn Hàng</option>
                            </select>
                        </div>
                        <button class="btn" type="submit" name="btn_update">Cập nhật</button>
                    </form>
                </div>
            </aside>
        </section>
    </div>
</body>
</html>