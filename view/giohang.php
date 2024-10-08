

<link rel="stylesheet" href="css/cart.css?<?=time();?>" />
<style>
    .product + .product{
        margin-top: 35px;
    }
</style>
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
                    <div class="right from-amount"><span onclick="updateAmount('<?=$row['id'];?>', 'down')"><i class="fas fa-minus"></i></span> <span><input type="number" name="amountCartttt_<?=$row['id'];?>" value="<?=number_format($row['amount']);?>"></span> <span onclick="updateAmount('<?=$row['id'];?>', 'up')"><i class="fas fa-plus"></i></span></div>
                    <div class="right text-center price"><?=number_format(locTien($getProduct['price_now']));?>đ</div>
                    <div class="right text-center price"><span id="total_price_<?=$row['id'];?>"><?=number_format($tongTien);?></span>đ</div>
                    <div class="right"><button class="delete" onclick="delCart(<?=$row['id'];?>)">Xóa</button></div>
                </section>
                <?php endforeach; ?>
            </div>
            <section class="order">
                <div class="order_price">
                    <p>Tổng thanh toán:</p>
                    <span id="tongThanhToan"><?=number_format($tinhTien);?></span>đ
                </div>
                <div class="order_buy">
                    <a href="?act=muangay">Mua ngay</a>
                </div>
            </section>
            <div class="more_product">
                <h3 class="like_that">Các sản phẩm tương tự</h3>
                <div class="phphere">
                <?php foreach (load_all() as $pro_pub) :
                        extract($pro_pub);
                    ?>
                        <div class="product "
                        style="height: 260px"
                        >
                            <a href="?act=chitietsanpham&id=<?= $id ?> " class="connect">
                                <div class="imgg imggg">
                                    <img src="./img/<?= $img ?>" alt="" />
                                </div>
                                
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>