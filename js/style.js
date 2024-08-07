function addCart(id) {
    var formData = {
        'type': 'addCart',
        'id': id,
    };
    $.post("/duan1/model/api.php", formData,
        function (data) {
            if (data.status == 'error') {
                alert("Lỗi");
            } else {
                $("#addCart").html("ĐÃ THÊM VÀO GIỎ");
                document.getElementById("addCart").style.background = "#b0b7bd"
            }
        }, "json");
}

function updateAmount(id, type) {
    var formData = {
        'type': 'updateAmount',
        'id': id,
        'status': type
    };
    $.post("/duan1/model/api.php", formData,
        function (data) {
            if (data.status == 'error') {
                document.getElementById("cartId_" + id).style.display = "none";
                $("#tongThanhToan").html(0);
            } else {
                loadAmountID(id);
            }
        }, "json");
}

function loadAmountID(id) {
    var formData = {
        'type': 'loadAmountCartId',
        'id': id
    };
    $.post("/duan1/model/api.php", formData,
        function (data) {
            if (data.status == 'error') {
                document.getElementById("cartId_" + id).style.display = "none";
                $("#tongThanhToan").html(0);
            } else {
                $("[name=amountCartttt_" + id + "]").val(data.msg);
                $("#total_price_" + id).html(data.tongTien);
                $("#tongThanhToan").html(data.tongThanhToan);
            }
    }, "json");
}