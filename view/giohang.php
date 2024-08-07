<link rel="stylesheet" href="css/cart.css?<?=time();?>" />
<div class="width_body">
            <section class="table">
                <div class="table-l">Sản phẩm</div>
                <div class="table-r">Số lượng</div>
                <div class="table-r">Đơn giá</div>
                <div class="table-r">Tổng Tiền</div>
                <div class="table-r">Thao tác</div>
            </section>
            <div class="box">
                <?php foreach(loadCart() as $row): 
                $getProduct = pdo_query_one("SELECT * FROM  `pro_pub` WHERE `id` = '".$row['id_pro']."'");
                $tongTien = locTien($getProduct['price_now']) * $row['amount'];
                $tinhTien += $tongTien;
                ?>
                <section class="product" id="cartId_<?=$row['id'];?>">
                    <div class="left">
                        <div class="left_img"><img src="img/<?=$getProduct['img'];?>" alt="" /></div>
                        <div class="name"><p><?=$getProduct['name'];?></p></div>
                    </div>
                    <div class="right from-amount"><span class="down_number" onclick="updateAmount('<?=$row['id'];?>', 'down')"><i class="fas fa-minus"></i></span> <span><input type="number" name="amountCartttt_<?=$row['id'];?>" value="<?=number_format($row['amount']);?>"></span> <span class="up_number" onclick="updateAmount('<?=$row['id'];?>', 'up')"><i class="fas fa-plus"></i></span></div>
                    <div class="right text-center price"><?=number_format(locTien($getProduct['price_now']));?>đ</div>
                    <div class="right text-center price"><span id="total_price_<?=$row['id'];?>"><?=number_format($tongTien);?></span>đ</div>
                    <div class="right"><button class="delete">Xóa</button></div>
                </section>
                <?php endforeach; ?>
            </div>
            <section class="order">
                <div class="order_price">
                    <p>Tổng thanh toán:</p>
                    <span id="tongThanhToan"><?=number_format($tinhTien);?></span>đ
                </div>
                <div class="order_buy">
                    <a href="./view/muangay.php">Mua ngay</a>
                </div>
            </section>
            <div class="more_product">
                <h3 class="like_that">Các sản phẩm tương tự</h3>
                <div class="more_img">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                    <img src="../img/anh12.jpg" alt="">
                </div>
            </div>
            
        </div>