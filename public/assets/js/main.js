$(document).ready(function () {
  $("#check-all").click(function () {
    $("input[type='checkbox']").prop("checked", true);
  });
  $("#clear-all").click(function () {
    $("input[type='checkbox']").prop("checked", false);
  });
  $("#btn-delete").click(function () {
    if ($("input[type='checkbox']").length === 0) {
      alert("Vui lòng chọn ít nhất một mục!");
      return false;
    }
  });
});

function validateClient(event) {
  // event.preventDefault();
  var hoTen = document.getElementById("ho_ten");
  var diaChi = document.getElementById("dia_chi");
  var soDt = document.getElementById("so_dt");
  var email = document.getElementById("email");
  var matKhau = document.getElementById("mat_khau");
  var matKhau2 = document.getElementById("mat_khau2");

  var errorHoTen = document.getElementById("error-hoTen");
  var isValidate = true;

  if (hoTen.value.trim() === "") {
    errorHoTen.innerHTML = "Vui lòng nhập thông tin ";
    isValidate = false;
  } else {
    errorHoTen.innerHTML = "";
    isValidate = true;
  }

  if (diaChi.value.trim() === "") {
    document.getElementById("error-diaChi").innerHTML =
      "Vui lòng nhập thông tin ";
    isValidate = false;
  } else {
    document.getElementById("error-diaChi").innerHTML = "";
    isValidate = true;
  }

  if (soDt.value.trim() === "") {
    document.getElementById("error-soDt").innerHTML =
      "Vui lòng nhập thông tin ";
    isValidate = false;
  } else {
    document.getElementById("error-soDt").innerHTML = "";
    isValidate = true;
  }

  if (email.value.trim() === "") {
    document.getElementById("error-email").innerHTML =
      "Vui lòng nhập thông tin Email";
    isValidate = false;
  } else {
    document.getElementById("error-email").innerHTML = "";
    isValidate = true;
  }

  if (matKhau.value.trim() === "") {
    document.getElementById("error-matKhau").innerHTML =
      "Vui lòng nhập thông tin ";
    isValidate = false;
  } else {
    document.getElementById("error-matKhau").innerHTML = "";
    isValidate = true;
  }

  if (matKhau2.value.trim() === "") {
    document.getElementById("error-matKhau2").innerHTML =
      "Vui lòng nhập thông tin ";
    isValidate = false;
  } else {
    if (matKhau2.value != matKhau.value) {
      document.getElementById("error-matKhau2").innerHTML =
        "Xác nhận mật khẩu không khớp, vui lòng nhập lại";
      isValidate = false;
    } else {
      document.getElementById("error-matKhau2").innerHTML = "";
      isValidate = true;
    }
  }
  return isValidate;
}
