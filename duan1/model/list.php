<?php 
    function load_all_list () {
        $sql = "SELECT * FROM category";
        return pdo_query($sql); 
    }


    function load_all () {
        $sql = "SELECT * FROM pro_pub";
        return pdo_query($sql); 
    }

    function load_all_cate () {
        $sql = "SELECT * FROM cate_sup";
        return pdo_query($sql); 
    }

    function addsp($name,$img,$startDay,$endDay,$nhapkhau) {
        $sql= "INSERT INTO `category` (`id_cate`, `name_cate`, `img_cate`, `starday_cate`, `endday_cate`, `from_cate`) 
        VALUES (NULL, '$name', '$img', '$startDay', '$endDay', '$nhapkhau')";
        pdo_execute($sql);
    }

    function delete_product($id_cate) {
        $sql = "DELETE FROM category WHERE `id_cate` = '$id_cate'";
        pdo_execute($sql);
    }


    function chitiet($id) {
        $sql = "SELECT * FROM `pro_pub` WHERE `id` = '$id'";
         return pdo_query_one($sql);
    }

    function load_one_cate($id_cate) {   
        $sql = "SELECT * FROM  `category` WHERE `id_cate` = '$id_cate'";
        return pdo_query_one($sql);

    }
 
    function update_cate($id_cate, $name, $img, $startday, $endday, $from_cate) {
        $sql="UPDATE `category` SET `name_cate` = '$name', `img_cate` = '$img', `starday_cate` = '$startday', `endday_cate` = '$endday', `from_cate` = '$from_cate' 
        WHERE `id_cate` = '$id_cate';";
        pdo_execute($sql);
    }

?>