<link rel="stylesheet" href="css/cart.css?<?= time(); ?>" />
<div class="width_body">
    <div class="khanh-flex">

        <div style="width: 100%; margin: 5px">
            <section class="table">
                <div class="table-l">Sản phẩm</div>
                <div class="table-r">Tổng Tiền</div>
            </section>
            <div class="box">
                <?php foreach (loadCart() as $row) :
                    $getProduct = pdo_query_one("SELECT * FROM  `pro_pub` WHERE `id` = '" . $row['id_pro'] . "'");
                    $tongTien = locTien($getProduct['price_now']) * $row['amount'];
                    $tinhTien += $tongTien;
                ?>
                    <section class="product" id="cartId_<?= $row['id']; ?>">
                        <div class="left">
                            <div class="left_img"><img src="img/<?= $getProduct['img']; ?>" alt="" /></div>
                            <div class="name" style="margin-top: 20px">
                                <p><?= $getProduct['name']; ?></p>
                            </div>
                        </div>
                        <div class="right text-center"><span><?= number_format($row['amount']); ?> x <?= number_format(locTien($getProduct['price_now'])); ?>đ</span></div>
                        <div class="right text-center price"><span id="total_price_<?= $row['id']; ?>"><?= number_format($tongTien); ?></span>đ</div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
        <section style="width: 50%; margin: 45px 5px 5px 5px; border-radius: 10px; text-align: left; background: #f8f6e3; padding: 20px;">
            <h4 style="margin-bottom: 5px; text-align: center">Địa Chỉ Nhận Hàng </h4>
            <form action="?act=muangay" method="POST">
                <div class="listAddress">
                    <div class="from-group">
                        <label for="">Họ Tên</label>
                        <input type="text" name="name" placeholder="Nhập Họ Tên" value="<?=($_POST['name'] ?? '');?>">
                    </div>
                    <div class="from-group">
                        <label for="">Số Điện Thoại</label>
                        <input type="number" name="phone" placeholder="Nhập Số Điện Thoại" value="<?=($_POST['phone'] ?? '');?>">
                    </div>
                    <div class="from-group">
                        <label for="">Địa Chỉ</label>
                        <input type="text" name="address" placeholder="Nhập Địa Chỉ" value="<?=($_POST['address'] ?? '');?>">
                    </div>
                </div>
                <br>
                <h5 style="margin-bottom: 5px">Phương Thức Thanh Toán: </h5>
                <div class="paymentMethod">
                    <label for="shipCod">
                        <input type="radio" name="paymentMethod" id="shipCod" value="Thanh Toán Khi Nhận Hàng" checked>
                        <span>Thanh Toán Khi Nhận Hàng</span>
                    </label>

                    <label for="banking">
                        <input type="radio" name="paymentMethod" id="banking" value="Chuyển Khoản Ngân Hàng">
                        <span>Chuyển Khoản Ngân Hàng</span>
                    </label>
                </div>
                <div class="text-right" style="margin: 20px 0px 5px 0px">Tổng Tiền: <b class="text-danger"><?= number_format($tinhTien); ?>đ</b></div>
                <?php if (isset($_POST['buyNow'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['paymentMethod'];

    if (empty($name) || empty($phone) || empty($address) || empty($paymentMethod)) {
        echo '<div class="alert alert-danger mb-3">Vui Lòng Nhập Đầy Đủ Thông Tin</div>';
    } else {

        
        foreach (loadCart() as $row) :
            pdo_execute("INSERT INTO `orders`(`trading`, `username`, `id_pro`, `amount`, `status`, `time`) VALUES ('" . rand(100000000, 999999999) . "','" . ($_SESSION['username'] ?? $_SERVER['REMOTE_ADDR']) . "','".$row['id_pro']."','".$row['amount']."','pending','".date("H:i d-m-Y")."') ");
        endforeach;
        
        pdo_query("DELETE FROM `cart` WHERE `username` = '" . ($_SESSION['username'] ?? $_SERVER['REMOTE_ADDR']) . "' ");

        echo '<div class="alert alert-success mb-3">Thành Công, Vui Lòng Tra Cứu Lịch Sử Đơn Hàng</div>';
    }
}
?>
                <div class="text-right">
                    <button type="submit" name="buyNow" class="buyNow">Thanh Toán Ngay</button>
                </div>
            </form>
        </section>
    </div>
</div>