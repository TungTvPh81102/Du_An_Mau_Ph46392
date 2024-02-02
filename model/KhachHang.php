<?php
// DANH SÁCH KHÁCH HÀNG TỪ DB
function loadAllKhachHang()
{
    $sql = "SELECT * FROM khachhang ORDER BY ma_kh DESC";
    return pdo_query($sql);
}

// THÊM KHÁCH HÀNG 
// function insertKhachHang($hoTen, $email, $matKhau, $hinh, $diaChi, $soDT, $vaiTro, $kichHoat)
// {
//     $sql = "INSERT INTO khachhang(ho_ten,email,mat_khau,hinh,dia_chi,so_dt,vai_tro,kich_hoat) VALUES ('$hoTen','$email','$matKhau','$hinh','$diaChi','$soDT','$vaiTro','$kichHoat')";
//     pdo_execute($sql);
// }

function insertKhachHang($hoTen, $email, $matKhau, $hinh, $diaChi, $soDT, $vaiTro, $kichHoat)
{
    $sql = "INSERT INTO khachhang(ho_ten,email,mat_khau,hinh,dia_chi,so_dt,vai_tro,kich_hoat) VALUES ('$hoTen','$email','$matKhau','$hinh','$diaChi','$soDT','$vaiTro','$kichHoat')";

    pdo_execute($sql);
}

// EDIT KHÁCH HÀNG
function editKhachHang($maKH)
{
    $sql = "SELECT * FROM khachhang WHERE ma_kh = '$maKH'";
    return pdo_query_one($sql);
}

// UPDATE KHÁCH HÀNG
function updateKhachHang($maKH, $hoTen, $email, $matKhau, $hinh, $diaChi, $soDT, $vaiTro, $kichHoat)
{
    if ($hinh !== "") {
        $sql = "UPDATE khachhang SET ho_ten = '$hoTen' , email = '$email' , mat_khau = '$matKhau' , hinh = '$hinh' , dia_chi = '$diaChi' , so_dt = '$soDT' , vai_tro = '$vaiTro' , kich_hoat = '$kichHoat' WHERE ma_kh = '$maKH'";
        pdo_execute($sql);
    } else {
        $sql = "UPDATE khachhang SET ho_ten = '$hoTen' , email = '$email' , mat_khau = '$matKhau' , dia_chi = '$diaChi' , so_dt = '$soDT' , vai_tro = '$vaiTro' , kich_hoat = '$kichHoat' WHERE ma_kh = '$maKH'";
        pdo_execute($sql);
    }
}

// DELETE KHÁCH HÀNG
function deleteKhachHang($maKH)
{
    $sql = "DELETE FROM khachhang WHERE ma_kh = '$maKH'";
    pdo_execute($sql);
}

// ĐĂNG KÝ TÀI KHOẢN
function dangKyTaiKhoan($hoTen, $email, $matKhau, $hinh, $diaChi, $soDT)
{
    $sql = "INSERT INTO khachhang(ho_ten,email,mat_khau,hinh,dia_chi,so_dt) VALUES ('$hoTen','$email','$matKhau','$hinh','$diaChi','$soDT')";
    pdo_execute($sql);
}

// CẬP NHẬT TÀI KHOẢN
function capNhatTaiKhoan($maKH, $hoTen, $email, $hinh, $diaChi, $soDT)
{
    if ($hinh != "") {
        $sql = "UPDATE khachhang SET ho_ten = '$hoTen', email = '$email', hinh ='$hinh',dia_chi = '$diaChi' , so_dt = '$soDT' WHERE ma_kh = '$maKH'";
    } else {
        $sql = "UPDATE khachhang SET ho_ten = '$hoTen', email = '$email',dia_chi = '$diaChi' , so_dt = '$soDT' WHERE ma_kh = '$maKH'";
    }
    pdo_execute($sql);
}

// CHECK TÀI KHOẢN
function checkUser($email, $matKhau, $vaiTro)
{
    if ($vaiTro == 2) {
        $sql = "SELECT * FROM khachhang WHERE email = '$email' AND mat_khau = '$matKhau' AND vai_tro = '$vaiTro'";
    } else {
        $sql = "SELECT * FROM khachhang WHERE email = '$email' AND mat_khau = '$matKhau'";
    }
    return pdo_query_one($sql);
}

// Kiểm tra email quên mật khẩu
function checkEmail($email)
{
    $sql = "SELECT * FROM khachhang WHERE email = '$email'";
    return pdo_query_one($sql);
}

// CHECK XEM TÀI KHOẢN ĐÃ TỒN TẠI HAY CHƯA
function checkTaiKhoanDangKy($email)
{
    $sql = "SELECT * FROM khachhang WHERE email = '$email'";
    return pdo_query($sql);
}

// Kiểm tra mật khẩu
function checkPass($matKhau)
{
    $sql = "SELECT * FROM khachhang WHERE mat_khau = '$matKhau'";
    return pdo_query_one($sql);
}

function updatePass($maKh, $matKhau)
{
    $sql = "UPDATE khachhang SET mat_khau = '$matKhau' WHERE ma_kh = '$maKh'";
    pdo_execute($sql);
}
