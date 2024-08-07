<?php
include 'pdo.php';
include 'list.php';

if ($_POST['type'] == "addCart") {
    $id = $_POST['id'];

    if (empty($id)) {
        die(json_encode([
            "status" => "error",
            "msg" => "Dữ Liệu Sai"
        ]));
    } else {
        $checkCart = pdo_query_one("SELECT * FROM  `cart` WHERE `id_pro` = '$id' AND `username` = '" . ($_SESSION['username'] ?? $_SERVER['REMOTE_ADDR']) . "' ");
        if ($checkCart) {
            pdo_execute("UPDATE `cart` SET `amount` = '" . $checkCart['amount'] + 1 . "' WHERE `id` = '$id' ");
        } else {
            pdo_execute("INSERT INTO `cart` (`id_pro`, `username`, `amount`, `time`) VALUES ($id, '" . ($_SESSION['username'] ?? $_SERVER['REMOTE_ADDR']) . "', '1', '" . time() . "')");
        }
        die(json_encode([
            "status" => "success",
            "msg" => "Thành Công"
        ]));
    }
} else if($_POST['type'] == "updateAmount") {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $checkCart = pdo_query_one("SELECT * FROM  `cart` WHERE `id` = '$id' AND `username` = '" . ($_SESSION['username'] ?? $_SERVER['REMOTE_ADDR']) . "' ");

    if($checkCart['amount'] <= 0) {
        pdo_query("DELETE FROM `cart` WHERE `id` = '$id' ");
        die(json_encode([
            "status" => "error",
            "msg" => "Delete",
        ]));
    }
    if($status == "up") {
        pdo_execute("UPDATE `cart` SET `amount` = '" . $checkCart['amount'] + 1 . "' WHERE `id` = '$id' ");
    } else {
        pdo_execute("UPDATE `cart` SET `amount` = '" . $checkCart['amount'] - 1 . "' WHERE `id` = '$id' ");
    }

    die(json_encode([
        "status" => "success",
        "msg" => "Thành Công",
        "id" => $checkCart['id']
    ]));
} else if($_POST['type'] == "loadAmountCartId") {
    $id = $_POST['id'];

    $checkCart = pdo_query_one("SELECT * FROM  `cart` WHERE `id` = '$id' AND `username` = '" . ($_SESSION['username'] ?? $_SERVER['REMOTE_ADDR']) . "' ");
    $getProduct = pdo_query_one("SELECT * FROM  `pro_pub` WHERE `id` = '".$checkCart['id_pro']."'");

    if($checkCart['amount'] <= 0) {
        pdo_query("DELETE FROM `cart` WHERE `id` = '$id' ");
        die(json_encode([
            "status" => "error",
            "msg" => "Delete",
        ]));
    }


    $tongTien = $checkCart['amount'] * locTien($getProduct['price_now']);

    $tinhTien = 0;
    foreach(loadCart() as $row): 
        $getProduct2 = pdo_query_one("SELECT * FROM  `pro_pub` WHERE `id` = '".$row['id_pro']."'");
        $tongTien2 = locTien($getProduct2['price_now']) * $row['amount'];
        $tinhTien += $tongTien2;
    endforeach;

    die(json_encode([
            "status" => "success",
            "msg" => $checkCart['amount'],
            "tongTien" => number_format($tongTien),
            "tongThanhToan" => number_format($tinhTien),
        ]));
}

