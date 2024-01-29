<?php
// LOAD DANH SÁCH LOẠI TỪ DB
function loadAllLoai($keyWord)
{
    $sql = "SELECT * FROM loai WHERE 1";
    if ($keyWord !== "") {
        $sql .= " AND ten_loai LIKE '%" . $keyWord . "%'";
    }
    $sql .= " ORDER BY ma_loai DESC";
    return pdo_query($sql);
}

// THÊM LOẠI HÀNG 
function insertLoai($tenLoai)
{
    $sql = "INSERT INTO loai(ten_loai) VALUES ('$tenLoai')";
    pdo_execute($sql);
}

// EDIT LOAI HÀNG
function editLoai($maLoai)
{
    $sql = "SELECT * FROM loai WHERE ma_loai = '$maLoai'";
    return pdo_query_one($sql);
}

// UPDATE LOẠI HÀNG
function updateLoai($maLoai, $tenLoai)
{
    $sql = "UPDATE loai SET ten_loai = '$tenLoai' WHERE ma_loai = '$maLoai'";
    pdo_execute($sql);
}

// DELETE LOẠI HÀNG
function deleteLoai($maLoai)
{
    $sql  = "DELETE FROM loai WHERE ma_loai = '$maLoai'";
    pdo_execute($sql);
}

// LOAD ALL DANH MỤC HOME
function loadAllDanhMucHome()
{
    $sql = "SELECT * FROM loai ORDER BY ma_loai DESC";
    return pdo_query($sql);
}
