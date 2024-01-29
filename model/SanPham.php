<?php
// LẤY DANH SÁCH SẢN PHẨM TỪ DB
function loadAllSanPham($keyWord, $maLoai = 0)
{
    $sql = "SELECT s.*, l.ten_loai FROM sanpham s JOIN loai l ON l.ma_loai = s.ma_loai WHERE 1  ";
    if ($keyWord !== "") {
        $sql .= " AND s.ten_sp like '%" . $keyWord . "%'";
    }
    if ($maLoai > 0) {
        $sql .= " AND l.ma_loai like '%" . $maLoai . "%'";
    }
    $sql .= "ORDER BY s.ma_sp DESC";
    return pdo_query($sql);
}

// THÊM SẢN PHẨM 
function insertSanPham($tenSP, $donGia, $giamGia, $hinh, $ngayNhap, $moTa, $maLoai)
{
    $sql = "INSERT INTO sanpham(ten_sp,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,ma_loai) VALUES ('$tenSP','$donGia','$giamGia','$hinh','$ngayNhap','$moTa','$maLoai')";
    pdo_execute($sql);
}

// EDIT SẢN PHẨM 
function loadOneSanPham($maSP)
{
    $sql = "SELECT * FROM sanpham WHERE ma_sp = '$maSP'";
    return pdo_query_one($sql);
}

// UPDATE SẢN PHẨM
function updateSanPham($maSP, $tenSP, $donGia, $giamGia, $hinh, $moTa, $maLoai, $soLuotXem)
{
    if ($hinh !== "") {

        $sql = "UPDATE sanpham SET ten_sp = '$tenSP', don_gia = '$donGia', giam_gia = '$giamGia', hinh = '$hinh',mo_ta='$moTa',ma_loai = '$maLoai',so_luot_xem = '$soLuotXem' WHERE ma_sp = '$maSP' ";
    } else {
        $sql = "UPDATE sanpham SET ten_sp = '$tenSP', don_gia = '$donGia', giam_gia = '$giamGia',mo_ta='$moTa',ma_loai = '$maLoai',so_luot_xem = '$soLuotXem' WHERE ma_sp = '$maSP' ";
    }
    pdo_execute($sql);
}

// DELETE SẢN PHẨM
function deleteSanPham($maSP)
{
    $sql = "DELETE FROM sanpham WHERE ma_sp = '$maSP'";
    pdo_execute($sql);
}

// LOAD SẢN PHẨM HOME
function loadAllSanPhamHome()
{
    $sql = "SELECT * FROM sanpham ORDER BY ma_sp DESC";
    return pdo_query($sql);
}

// TOP SẢN PHÂM YÊU THÍCH
function topSanPham()
{
    $sql = "SELECT * FROM sanpham ORDER BY so_luot_xem DESC LIMIT 0,10";
    return pdo_query($sql);
}

// SẢN PHẨM LIÊN QUAN

function sanPhamCungLoai($maSp, $maLoai)
{
    $sql = "SELECT * FROM sanpham WHERE ma_loai = '$maLoai' AND ma_sp <> '$maSp'";
    return pdo_query($sql);
}
