<?php
include '../../model/pdo.php';
include '../../model/list.php';
include '../header.php';
?>
    <body>
        <div class="width_body">
            <section class="table">
                <div class="table-l">Sản phẩm</div>
                <div class="table-r">Số lượng</div>
                <div class="table-r">Đơn giá</div>
                <div class="table-r">Thao tác</div>
            </section>
            <div class="box">
                <?php foreach(loadCart() as $row): ?>
                    <?=$row;?>
                <?php endforeach; ?>
                <section class="product">
                    <div class="left">
                        <div class="left_img"><img src="../../img/default.jpg" alt="" /></div>
                        <div class="name"><p>Tên sản phẩm</p></div>
                    </div>
                    <div class="right">số lượng</div>
                    <div class="right price">Giá tiền</div>
                    <div class="right"><button class="delete">Xóa</button></div>
                </section>
                
            </div>
            <section class="order">
                <div class="order_price">
                    <p>Tổng thanh toán:</p>
                    <span>1000</span>
                </div>
                <div class="order_buy">
                    <a href="./muangay.php">Mua ngay</a>
                </div>
            </section>
            <div class="more_product">
                <h3 class="like_that">Các sản phẩm tương tự</h3>
                <div class="more_img">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                    <img src="../../img/anh12.jpg" alt="">
                </div>
            </div>
        </div>
        <footer>
            <div class="alll">
                <div class="small">
                    <p>Công ty TDI Việt Nam</p>
                    <ul>
                        <li><a href="#!">Số GCNĐKDN: 2500150543</a></li>
                        <li>
                            <a href="#!">Đăng ký lần đầu: Ngày 10/3/2023</a>
                        </li>
                        <li>
                            <a href="#!">Đăng ký thay đổi lần thứ 14: Ngày 11/3/2024</a>
                        </li>
                        <li>
                            <a href="#!"
                                >Cơ quan cấp: Phòng Đăng ký kinh doanh - Sở kế hoạch và
                                Đầu tư Vĩnh Phúc</a
                            >
                        </li>
                        <li>
                            <a href="#!"
                                >Địa chỉ: Tòa nhà FPT Polytechnic., Cổng số 2, 13 P.
                                Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="small">
                    <p>ĐƯỜNG DÂY NÓNG</p>
                    <ul>
                        <li>
                            <a href="#!"
                                >Hotline: <strong class="hl">096 490 7815 </strong>(Miễn
                                phí cho tất cả thuê bao)</a
                            >
                        </li>
                        <li>
                            Email:
                            <a href="#!" style="text-decoration: underline; color: red"
                                >daominhkhanh2020@gmail.com</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="license">
                <p>© 2019. Copyright by TDI VietNam</p>
                <p><a href="#!">Terms and Conditions</a></p>
                <p><a href="#!">Privacy Policy</a></p>
                <p><a href="#!">Cookie Policy</a></p>
            </div>
        </footer>
        
    </body>
</html>
