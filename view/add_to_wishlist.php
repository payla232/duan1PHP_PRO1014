
<?php if($_GET['act'] == "add_to_wishlist" || $_GET['act'] == "") { ?>
    <section class="banner">
        <img src="./img/banner-gia-dung1.jpg" alt="" />
    </section>
    <?php } ?>
    <link rel="stylesheet" href="css/cart.css?<?=time();?>" />
<div class="width_body">
            <section class="table">
                <div class="table-l">Sản phẩm</div>
                <div class="table-r">Số lượng</div>
                <div class="table-r">Thao tác</div>
            </section>
            <div class="box">
                <?php foreach(pdo_query("SELECT * FROM `wishlist` WHERE `username` = '".$_SESSION['username']."' ") as $row): 
                $getProduct = pdo_query_one("SELECT * FROM  `pro_pub` WHERE `id` = '".$row['id_pro']."'");
                ?>
                <section class="product">
                    <div class="left">
                        <div class="left_img"><img src="img/<?=$getProduct['img'];?>" alt="" /></div>
                        <div class="name"><p><?=$getProduct['name'];?> x <?=number_format($row['amount']);?></p></div>
                    </div>
                    <div class="right" style="display: flex">
                        <button style="background: blue; color: white; padding: 10px 20px; border-radius: 5px; border: none" onclick="href('index.php?act=chitietsanpham&id=<?=$getProduct['id'];?>')">Xem</button>
                        <form action="" method="POST">
                        <button class="delete" type="submit" name="xoa_<?=$row['id'];?>" style="margin-right: 10px">Xóa</button>
                        </form>
                    </div>
                </section>
                <?php if(isset($_POST['xoa_'.$row['id']])) {
                    pdo_query("DELETE FROM `wishlist` WHERE `id` = '{$row['id']}' ");
                    echo '<script>location.href=""</script>';
                }
            endforeach; ?>
            </div>
        </div>
<script>
    function href(link) {
        location.href = link;
    }
</script>