document.addEventListener('DOMContentLoaded', function () {
    // Get the age input element
    var ageInput = document.getElementById('age');

    // Set the minimum and maximum values
    ageInput.min = 18;
    ageInput.max = 45;

    // Set the default value to 20
    ageInput.value = 20;

    // Get the display element
    var ageDisplay = document.getElementById('age-display');

    // Update the display element with the initial value
    ageDisplay.textContent = ageInput.value;

    // Add an input event listener to update the display element dynamically
    ageInput.addEventListener('input', function () {
        ageDisplay.textContent = ageInput.value;
    });
});
function kiemtra() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var city = document.getElementById("city");
    var selectedIndexcity = city.selectedIndex;
    var regexpassword = /^(?=.*[A-Za-z])(?=.*\d).+$/;
    var regexemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (username.trim() === "") {
        document.getElementById("error-username").textContent = "Vui lòng nhập tên đăng nhập";
        username.classList.add("input-error");
        return false;
    } else if (username.trim().length < 8 || username.trim().length > 20) {
        document.getElementById("error-username").textContent = "Vui lòng nhập từ 8-20 ký tự";
        username.classList.add("input-error");
        return false;
    } else {
        document.getElementById("error-username").textContent = "";
    }

    if (password.trim() === "") {
        document.getElementById("error-password").textContent = "Vui lòng nhập mật khẩu";
        password.classList.add("input-error");
        return false;
    } else if (password.trim().length < 8) {
        document.getElementById("error-password").textContent = "Vui lòng nhập mật khẩu từ 8 ký tự trở lên";
        password.classList.add("input-error");
        return false;
    } else if (!regexpassword.test(password)) {
        document.getElementById("error-password").textContent = "Vui lòng nhập mật khẩu phải có cả chữ và số";
        password.classList.add("input-error");
        return false;
    } else {
        document.getElementById("error-password").textContent = "";
    }

    if (email.trim() === "") {
        document.getElementById("error-email").textContent = "Vui lòng nhập email";
        email.classList.add("input-error");
        return false;
    } else if (!regexemail.test(email)) {
        document.getElementById("error-email").textContent = "Vui lòng nhập đúng định dạng email";
        email.classList.add("input-error");
        return false;
    }
    else {
        document.getElementById("error-email").textContent = "";
    }

    if (selectedIndexcity === 0) {
        // var errorCity = city.nextElementSibling;
        document.getElementById("error-city").textContent = "Vui lòng chọn thành phố";
        city.classList.add("input-error");
        return false;
    } else {
        document.getElementById("error-city").textContent = "";
    }
    return true;
}


function lamLai() {
    // Lấy danh sách tất cả các thẻ input
    var inputs = document.querySelectorAll('input');

    // Đặt lại giá trị của các trường input về giá trị mặc định
    inputs.forEach(function (input) {
        input.value = '';
    });
}

