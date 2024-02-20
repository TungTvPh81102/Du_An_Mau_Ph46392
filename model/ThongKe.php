<?php
function thongKeBinhLuan()
{
    $sql = "SELECT b.*,s.ten_sp,s.ma_sp, COUNT(*) AS so_luong,
    MAX(b.ngay_bl) as moi_nhat,
    MIN(b.ngay_bl) as cu_nhat
    FROM binhluan b 
    JOIN sanpham s ON s.ma_sp = b.ma_sp
    GROUP BY s.ten_sp, s.ma_sp
    HAVING so_luong > 0;
    ";
    return pdo_query($sql);
}

function thongKeSanPham()
{
    $sql = "SELECT l.ten_loai,l.ma_loai,
    COUNT(*) as so_luong,
    MAX(s.don_gia) as gia_max,
    MIN(S.don_gia) as gia_min,
    AVG(s.don_gia) as gia_tb
    FROM sanpham s JOIN loai l
    ON l.ma_loai = s.ma_loai
    GROUP BY l.ten_loai,l.ma_loai
    ";
    return pdo_query($sql);
}

function allSanPham()
{
    $sql = "SELECT COUNT(*) as so_luong FROM sanpham";
    return pdo_query_one($sql);
}

function allLoai()
{
    $sql = "SELECT COUNT(*) as so_luong FROM loai";
    return pdo_query_one($sql);
}

function allKH()
{
    $sql = "SELECT COUNT(*) AS so_luong FROM khachhang";
    return pdo_query_one($sql);
}

function allBL()
{
    $sql = "SELECT COUNT(*) AS so_luong FROM binhluan";
    return pdo_query_one($sql);
}

function allDonHang()
{
    $sql = "SELECT COUNT(*) AS so_luong FROM bill";
    return pdo_query_one($sql);
}
