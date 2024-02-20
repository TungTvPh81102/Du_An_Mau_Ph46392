<?php
function viewCart($del)
{
    if (isset($_SESSION['my_cart'])) {
        $tong = 0;
        $bienDem = 0;
        foreach ($_SESSION['my_cart'] as $cart) :
            $thanhTien = $cart[3] * $cart[4];
            $tong += $thanhTien;
?>
            <tr>
                <th scope="row"><?= $cart[0] ?></th>
                <td style="width: 200px;"><?= $cart[1] ?></td>
                <td>
                    <img style="width: 120px;" src="../../upload/<?= $cart[2] ?>" alt="">
                </td>
                <td><?= number_format($cart[3], 0) ?></td>
                <td>
                    <input class="text-center" style="width: 70px;" type="number" min="1" name="so_luong" id="" value="<?= $cart[4] ?>">
                </td>
                <td>
                    <?= number_format($thanhTien, 0) ?>
                </td>
                <td>
                    <?php if ($del == 1) { ?>
                        <a href="index.php?act=xoa-cart&id-cart=<?= $bienDem ?>" class="btn btn-danger">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
    <?php
            $bienDem += 1;
        endforeach;
    }
    ?>
    <?php ?>
    <tr>
        <td class="text-center" colspan="5">Thành tiền</td>
        <td colspan="7"><?= number_format($tong) ?></td>
    </tr>
    <?php ?>
<?php
}
?>

<?php

function tongDonHang()
{
    $tong = 0;
    if (isset($_SESSION['my_cart'])) {
        foreach ($_SESSION['my_cart'] as $cart) {
            $thanhTien = $cart[3] * $cart[4];
            $tong += $thanhTien;
        }
    }
    return $tong;
}


function taoDonHang($hoTen, $diaChi, $soDT, $email, $pttt, $tongDonHang, $ngayDatHang, $maKh)
{
    $sql = "INSERT INTO bill (bill_name,bill_address,bill_tel,bill_email,bill_pttt,total,ngay_dat,ma_kh) VALUES ('$hoTen','$diaChi','$soDT','$email','$pttt','$tongDonHang','$ngayDatHang','$maKh')";
    return pdo_execute_return_lastInsertId($sql);
}

function insertCart($maKh, $maSp, $hinh, $tenSp, $donGia, $soLuong, $thanhTien, $idDonHang)
{
    $sql = "INSERT INTO cart (ma_kh,ma_sp,hinh,ten_sp,gia,so_luong,thanh_tien,id_bill) VALUES ('$maKh','$maSp','$hinh','$tenSp','$donGia','$soLuong','$thanhTien','$idDonHang')";
    pdo_execute($sql);
}

// Load đơn hàng
function loadDonHang($idBill)
{
    $sql = "SELECT * FROM bill WHERE id_bill = '$idBill'";
    return pdo_query_one($sql);
}

// Load danh sách đơn hàng
function loadAllDonHang()
{
    $sql = "SELECT * FROM bill ORDER BY id_bill DESC";
    return pdo_query($sql);
}

// Load giỏ hàng
function loadCart($idBill)
{
    $sql = "SELECT * FROM cart WHERE id_bill = '$idBill'";
    return pdo_query($sql);
}

// Load đơn hàng của tôi
function loadMyCart($maKh, $idBill)
{
    $sql = "SELECT * FROM cart WHERE ma_kh = '$maKh' AND id_bill  = '$idBill'";
    return pdo_query($sql);
}

function loadMyBill($maKh)
{
    $sql = "SELECT b.*,c.* FROM bill b JOIN cart C on C.id_bill = b.id_bill WHERE b.ma_kh = '$maKh'";
    return pdo_query($sql);
}

// Trạng thái đơn hàng
function getTtdh($status)
{
    switch ($status) {
        case '0':
            $status = 'Đơn hàng mới';
            break;
        case '1':
            $status = 'Đang xử lý';
            break;
        case '2':
            $status = 'Đang giao hàng';
            break;
        case '3':
            $status = 'Đã giao hàng';
            break;

        default:
            $status = 'Đơn hàng mới';

            break;
    }
    return $status;
}

// Số lượng mặt hàng
function countCheck($idBill)
{
    $sql = "SELECT * FROM cart WHERE id_bill = '$idBill'";
    $bill = pdo_query($sql);
    return sizeof($bill);
}
