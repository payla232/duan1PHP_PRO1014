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
    <div class="phphere">
        <?php foreach ($list as $pro_pub):
            extract($pro_pub);
            ?>
            <div class="product">
                <a href="?act=chitietsanpham&id=<?= $id ?> " class="connect">
                <div class="imgg">
                    <img src="./img/<?= $img?>" alt="" /> 
                </div>
                <h3><?= $name ?></h3>
                <p class="p1"><?= $price_old ?></p>
                <p class="p2"><?= $price_now ?></p>
                <span class="freeship">freeship</span>
            </a>
            </div>
        <?php endforeach; ?>
        
    </div>
</aside>
