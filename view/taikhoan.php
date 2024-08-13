<link rel="stylesheet" href="css/taikhoan.css?<?= time(); ?>" />
<?php
if(empty($_SESSION['username'])) {
    die('<script>location.href="/duan1/view/login/dangnhap.php"</script>');
}
?>
<div class="form-account">
    <div class="row">
        <div class="chia-2">
            <ul>
                <li class="active" onclick="href('?act=taikhoan')">
                    <div class="icon"><i class="fas fa-user-circle"></i> <span>Thông tin tài khoản</span></div>
                </li>

                <li onclick="href('?act=baomat')">
                    <div class="icon"><i class="fas fa-lock"></i> <span>Bảo mật</span></div>
                </li>

                <li onclick="href('?act=diachi')">
                    <div class="icon"><i class="fas fa-map"></i> <span>Địa chỉ</span></div>
                </li>

                <li onclick="href('?act=donhang')">
                    <div class="icon"><i class="fas fa-file"></i> <span>Đơn hàng</span></div>
                </li>

            </ul>
        </div>
        <?php $infoUser = pdo_query_one("SELECT * FROM `user` WHERE `user` = '" . $_SESSION['username'] . "' ") ?>
        <div class="chia-2">
            <h5 class="title">Thông tin tài khoản</h5>
            <form action="" method="POST">
                <?php
                if(isset($_POST['submit'])) {
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $phone = $_POST['sdt'];

                    if(empty($first_name) || empty($last_name) || empty($phone)) {
                        echo '<div class="alert-danger text-center">Vui lòng nhập đầy đủ thông tin</div>';
                    } else if(!is_numeric($phone)) {
                        echo '<div class="alert-danger text-center">Số điện thoại không đúng định dạng</div>';
                    } else if(strlen($phone) !== 10) {
                        echo '<div class="alert-danger text-center">Số điện thoại không đúng định dạng</div>';
                    } else {

                        pdo_query("UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',`sdt`='$phone' WHERE `user` = '".$_SESSION['username']."' ");

                        echo '<script>location.href= ""</script>';
                    }
                }
                ?>
                <div class="row">
                    <div class="from-group">
                        <label for="">Tài khoản</label>
                        <input type="text" class="from-control" value="<?= $_SESSION['username']; ?>" readonly>
                    </div>

                    <div class="from-group">
                        <label for="">Họ <span>*</span></label>
                        <input type="text" class="from-control" name="first_name" placeholder="Cập nhật họ tên đệm của bạn" value="<?= ($infoUser['first_name'] ?? $_POST['first_name']); ?>">
                    </div>

                    <div class="from-group">
                        <label for="">Tên <span>*</span></label>
                        <input type="text" class="from-control" name="last_name" value="<?= ($infoUser['last_name'] ?? $_POST['last_name']); ?>" placeholder="Cập nhật tên của bạn">
                    </div>

                    <div class="from-group">
                        <label for="">Số điện thoại <span>*</span></label>
                        <input type="text" class="from-control" name="sdt" value="<?= ($infoUser['sdt'] ?? $_POST['sdt']); ?>" placeholder="Cập nhật số điện thoại của bạn">
                    </div>

                    <div class="from-group">&nbsp;</div>

                    <div class="from-group right">
                        <button type="submit" class="btn-vip" name="submit"><i class="fa-solid fa-repeat"></i> Lưu lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function href(link) {
        location.href = link;
    }
</script>