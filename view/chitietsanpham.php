

<aside>
    <div class="asidte">
        <ul class="ulll">
            <li><a href="#!">Bình gốm</a></li>
            <li><a href="#!">Lọ</a></li>
            <li><a href="#!">Ấm</a></li>
            <li><a href="#!">Bình hoa</a></li>
            <li><a href="#!">Bình giữ nhiệt</a></li>
            <li><a href="#!">Gốm cổ</a></li>
        </ul>
        <ul class="ulll">
            <li>
                <a href="#!">Bài viết</a>
            </li>
            <li>
                <a href="#!">Bình luận</a>
            </li>
            <li>
                <a href="#!">Blog</a>
            </li>
        </ul>
    </div>
    <div class="spct">
        <div class="ct">
            <div class="img-title">
                <div class="img-sup">
                    <img src="./img/<?= $img ?>" alt="" />
                    <img src="./img/default.jpg" alt="" />
                    <img src="./img/default.jpg" alt="" />
                </div>
                <div class="img-main">
                    <img src="./img/<?= $img ?>" alt="" />
                </div>
            </div>
            <div class="title">
                <h1><?= $name ?></h1>
                <p class="price"><?= $price_now ?></p>
                <p class="status">Trạng thái: Còn hàng</p>
                <div class="btn_link">
                    <button class="btn_spct" onclick="addCart('<?= $id; ?>')" id="addCart">THÊM VÀO GIỎ</button>
                    <button class="btn_spct">MUA NGAY</button>
                </div>
                <form action="" method="POST">
                <?php 
                if(isset($_POST['addWishlist'])) {
                    $checkWish = pdo_query_one("SELECT * FROM `wishlist` WHERE `id_pro` = '$id' AND `username` = '".$_SESSION['username']."' ");
                    if($checkWish) {
                        pdo_query("UPDATE `wishlist` SET `amount` = '" . $checkWish['amount'] + 1 ."' WHERE `id_pro` = '$id' AND `username` = '".$_SESSION['username']."'  ");
                    } else {
                        pdo_query("INSERT INTO `wishlist`(`id_pro`, `username`, `amount`) VALUES ('$id','".$_SESSION['username']."', '1')");
                    }
                    echo '<script>alert("Thêm vào yêu thích thành công");location.href=""</script>';
                }
                ?>
                <div class="yt">
                    <button type="submit" name="addWishlist" class="like">
                        <i class="fa-regular fa-heart"></i>
                        <span class="like_sub" >Thêm vào yêu thích</span>
                    </button>
                </div>
                </form>
                <ul class="wrapper anime">
                    <li class="icon facebook">
                        <span class="tooltip">facebook</span>
                        <span><i class="fab fa-facebook-f"></i></span>
                    </li>
                    <li class="icon twitter">
                        <span class="tooltip">twitter</span>
                        <span><i class="fab fa-twitter"></i></span>
                    </li>
                    <li class="icon instagram">
                        <span class="tooltip">instagram</span>
                        <span><i class="fab fa-instagram"></i></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sub">
            <div class="btn_sub">
                <button class="btnup">Mô tả</button>
                <button class="btndown">Liên hệ</button>
            </div>
            <p>
                <span><?= $name ?></span> được nghệ nhân chế tác phỏng theo chiếc bình gốm
                cổ có thiên hướng cách tân. Phiên bản cổ năm cao 54cm được sản
                xuất vào năm 1450 hiện đang là một trong bốn quốc bảo của Thổ
                Nhĩ Kỳ, được mua bảo hiểm hàng triệu đô la Mỹ và lưu giữ trang
                trọng tại Bảo tàng hoàng gia Topkapi Saray, Istanbul, Thổ Nhĩ
                Kỳ. Hay còn gọi là Bình Ông, bình Dương mang dáng tròn khỏe
                khoắn tượng trưng cho trời, cho người đàn ông, người cha và
                người chồng trong gia đình.
            </p>
            <div class="more_product">
                <h3 class="like_that">Các sản phẩm tương tự</h3>
                <div class="phphere">
                <?php foreach (load_all() as $pro_pub) :
                        extract($pro_pub);
                    ?>
                        <div class="product "
                        style="height: 250px"
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

            <a href="./index.php" class="callback">Back ></a>
        </div>
    </div>
</aside>
