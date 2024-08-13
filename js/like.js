function addToWishlist(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_wishlist.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert("Sản phẩm đã được thêm vào danh sách yêu thích!");
        }
    };
    xhr.send("product_id=" + productId);
}
