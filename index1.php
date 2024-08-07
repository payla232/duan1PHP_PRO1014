<?php
// include các file trong model
include 'model/pdo.php';
include 'model/list.php';
// include file header.php để hiển thị phần đầu trang
require "view/header.php";
// dùng switch case và biến act trên URL để phân biệt yêu cầu muốn truy cập đến trang nào
// nhúng code file tương đương vào nội dung chính
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "danhmuc":
            $listall = load_all_list();
            include "./admin/danhmuc.php";
            break;
        case "chitietsanpham":
            $id = $_GET["id"];
            $chitiet = chitiet($id);
            extract($chitiet);
            include "./view/chitietsanpham.php";
            break;
        case "giohang":
            include "./view/giohang.php";
            break;
    }
} else {
    $list = load_all();
    include "view/home.php";
}
// include file footer.php để hiển thị phần chân trang
include "view/footer.php";
