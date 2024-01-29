<?php
// DANH SÁCH BÌNH LUẬN TỪ DB
function loadAllBinhLuan($maSp)
{
    $sql = "SELECT b.*,s.ma_sp,k.ho_ten FROM binhluan b JOIN sanpham s ON s.ma_sp = b.ma_sp
    JOIN khachhang k ON k.ma_kh = b.ma_kh
    WHERE s.ma_sp = '$maSp'";
    return pdo_query($sql);
}

// THÊM BÌNH LUẬN 
function insertBinhLuan($noiDung, $maSP, $maKH, $ngayBl)
{
    $sql = "INSERT INTO binhluan(noi_dung,ma_sp,ma_kh,ngay_bl) VALUES ('$noiDung','$maSP','$maKH','$ngayBl')";
    pdo_execute($sql);
}

// EDIT BÌNH LUẬN
function editBinhLuan($maBL)
{
    $sql = "SELECT * FROM binhluan WHERE ma_bl = '$maBL'";
    return pdo_query_one($sql);
}

// UPDATE BÌNH LUẬN 
function updateBinhLuan($maBL, $noiDung, $maSP, $ngayBL)
{
    $sql = "UPDATE binhluan SET noi_dung = '$noiDung' , ma_sp = '$maSP' , ngay_bl = '$ngayBL' WHERE ma_bl = '$maBL' ";
    pdo_execute($sql);
}

// DELETE BÌNH LUẬN
function deleteBinhLuan($maBL)
{
    $sql = "DELETE FROM binhluan WHERE ma_bl = '$maBL'";
    pdo_execute($sql);
}
