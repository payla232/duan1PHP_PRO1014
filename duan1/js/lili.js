document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector("form");

    var firstName = document.getElementById("firstName");
    var lastName = document.getElementById("lastName");
    var email = document.getElementById("email");
    var sdt = document.getElementById("sdt");
    var account = document.getElementById("account");
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirm_password");

    var fields = [
        firstName,
        lastName,
        email,
        sdt,
        account,
        password,
        confirmPassword,
    ];

    fields.forEach(function (field) {
        field.addEventListener("blur", function () {
            validateField(field);
        });
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Ngăn chặn form submit tự động

        var allValid = true;

        fields.forEach(function (field) {
            if (!validateField(field)) {
                allValid = false;
            }
        });

        if (allValid) {
            form.submit();
        }
    });

    function validateField(field) {
        var value = field.value.trim();
        var errorMessage = "";
        field.classList.remove("error_style");

        if (!value) {
            errorMessage = "Không được bỏ trống.";
            field.classList.add("error_style");
        } else if (
            field === email &&
            !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
        ) {
            errorMessage = "Vui lòng nhập đúng định dạng email.";
            field.classList.add("error_style");
        } else if (field === sdt && !/^\+?\d{10,15}$/.test(value)) {
            errorMessage = "Vui lòng nhập đúng định dạng số điện thoại.";
            field.classList.add("error_style");
        } else if (
            field === confirmPassword &&
            value !== password.value.trim()
        ) {
            errorMessage = "Mật khẩu và xác nhận mật khẩu không khớp.";
            field.classList.add("error_style");
        }

        var errorElement = field.nextElementSibling;

        if (!errorElement || !errorElement.classList.contains("error")) {
            errorElement = document.createElement("span");
            errorElement.classList.add("error");
            field.parentNode.appendChild(errorElement);
        }

        errorElement.textContent = errorMessage;

        return errorMessage === "";
    }
});
