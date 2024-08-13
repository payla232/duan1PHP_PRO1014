<?php
// include các file trong model
include '../model/pdo.php';
include '../model/list.php';
// include file header.php để hiển thị phần đầu trang
// dùng switch case và biến act trên URL để phân biệt yêu cầu muốn truy cập đến trang nào
// nhúng code file tương đương vào nội dung chính
if((isset($_GET['act']))&&($_GET['act']!="")){
    $act = $_GET['act'];
    switch($act) {
        case "sua":
            $ds = load_all_cate();  
            if (isset($_GET["id_cate"]) && $_GET["id_cate"] > 0 ) {
                $one_cate = load_one_cate($_GET["id_cate"]);
                extract($one_cate);
                 
                if (isset($_POST["btn_update"])) {
                    $id = $_POST["id_product"];
                    $name = $_POST["name"];
                    $startDay = $_POST["start_day"]; 
                    $endDay = $_POST["end_day"]; 
                    $nhapkhau = $_POST["nhapkhau"];
    
                    $img = $_FILES["img_product"]["tmp_name"];
                    $vi_tri_luu = "../img/" . $_FILES["img_product"]["name"];
                    if (move_uploaded_file($img, $vi_tri_luu)) {
                    }  
                    update_cate($id,$name, $_FILES["img_product"]["name"], $startDay, $endDay, $nhapkhau);
                
            }
        }
            include "sua.php";
            break;
        case "xoa":
            if(isset($_GET["id_cate"]) && $_GET["id_cate"] > 0) {
                delete_product($_GET["id_cate"]);
            }
            header("location: ./index.php");
            break;   
        case "them":
            if (isset($_POST["btn_gui"])) {
                $name = $_POST["name"];
                $startDay = $_POST["start_day"]; 
                $endDay = $_POST["end_day"]; 
                $nhapkhau = $_POST["nhapkhau"];


                $img = $_FILES["img_product"]["tmp_name"];
                $vi_tri_luu = "../img/" . $_FILES["img_product"]["name"];
                if (move_uploaded_file($img, $vi_tri_luu)) {
                }  
                addsp($name,$_FILES["img_product"]["name"],$startDay,$endDay,$nhapkhau);
                }
            $ds = load_all_cate();  
            include "them.php";
            break; 
                }
        
}else{
    $listall = load_all_list();
    $ds = load_all_cate ();  
    include "./danhmuc.php";
            
}

?>