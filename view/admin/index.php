<?php
session_start();
require_once('../../model/pdo.php');
require_once('../../model/loai.php');
require_once('../../model/SanPham.php');
require_once('../../model/KhachHang.php');
require_once('../../model/BinhLuan.php');
require_once('../../model/ThongKe.php');
require_once('../../model/cart.php');
include "layout/HeaderAdmin.php";
include "layout/MenuAdmin.php";
$error = [];
if (isset($_SESSION['user'])) {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
                // ================================== CONTROLLER LOẠI HÀNG ==================================
            case 'quan-ly-loai':
                if (isset($_POST['search']) && ($_POST['search'])) {
                    $keyWord = $_POST['keyword'];
                } else {
                    $keyWord = '';
                }
                $loadAllLoai = loadAllLoai($keyWord);
                include "loai/ListLoai.php";
                break;
            case 'them-loai-hang':
                if (isset($_POST['them-loai']) && ($_POST['them-loai'])) {
                    $tenLoai = $_POST['ten_loai'];
                    if (empty(trim($tenLoai))) {
                        $error['ten_loai'] = 'Tên loại hàng không được để trống';
                    } else {
                        if (strlen(trim($tenLoai)) < 6) {
                            $error['ten_loai'] = 'Tên loại phải lớn hơn 6 ký tự';
                        }
                    }

                    if (empty($error)) {
                        insertLoai($tenLoai);
                        echo '<script>alert("Thêm loại hàng thành công")</script>';
                        echo "<script>window.location.href='index.php?act=quan-ly-loai'</script>";
                    } else {
                        $_SESSION['error_mess'] = $error;
                    }
                }
                include "loai/AddLoai.php";
                break;
            case 'sua-loai-hang':
                if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                    $ma_loai = $_GET['ma_loai'];
                    $editLoai =  editLoai($ma_loai);
                }
                include "loai/EditLoai.php";
                break;
            case 'update-loai-hang':
                if (isset($_POST['update-loai']) && ($_POST['update-loai'])) {
                    $tenLoai = $_POST['ten_loai'];
                    $maLoai = $_POST['ma_loai'];
                    // if (empty(trim($tenLoai))) {
                    //     $error['ten_loai'] = 'Tên loại không được để trống';
                    // } else {
                    //     if (!ctype_alpha(trim($tenLoai))) { // hàm ctype_alpha kiểm tra xem giá trị vừa nhập có phải là chữ cãi không
                    //         $error['ten_loai'] = 'Tên loại phải nhập là chữ cái';
                    //     } else if (strlen(trim($tenLoai)) < 6) {
                    //         $error['ten_loai'] = 'Tên loại phải lớn hơn 6 ký tự';
                    //     }
                    // }

                    // if (empty($error)) {
                    updateLoai($maLoai, $tenLoai);
                    echo '<script>alert("Cập nhật loại hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-loai'</script>";
                    // } else {
                    //     $_SESSION['error_mess'] = $error;
                    // }
                }
                break;
            case 'xoa-loai-hang':
                if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                    $ma_loai = $_GET['ma_loai'];
                    deleteLoai($ma_loai);
                    echo '<script>alert("Xóa loại hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-loai'</script>";
                }
                break;
            case 'xoa-tat-ca':
                echo '<script>alert("Chọn thành công")</script>';
                break;
                // ================================== CONTROLLER SẢN PHẨM ==================================
            case 'quan-ly-sp':
                if (isset($_POST['search']) && ($_POST['search'])) {
                    $keyWord = $_POST['keyword'];
                    $maLoai = $_POST['ma_loai'];
                } else {
                    $keyWord = '';
                    $maLoai = 0;
                }
                $loadAllLoai = loadAllLoai($keyWord);
                $loadAllSp =  loadAllSanPham($keyWord, $maLoai);
                include "SanPham/ListSP.php";
                break;
            case 'them-san-pham':
                if (isset($_POST['them-sp']) && ($_POST['them-sp'])) {
                    $maLoai = $_POST['ma_loai'];
                    $tenSp = $_POST['ten_sp'];
                    $donGia = $_POST['don_gia'];
                    $giamGia = $_POST['giam_gia'];
                    $moTa = $_POST['mo_ta'];
                    $ngayNhap = date('Y/m/d');
                    if (empty(trim($maLoai))) {
                        $error['ma_loai'] = "Mã loại không được để trống";
                    }

                    if (empty(trim($tenSp))) {
                        $error['ten_sp'] = "Tên sản phẩm không được để trống";
                    } else {
                        if (strlen(trim($tenSp)) < 6) {
                            $error['ten_sp'] = "Tên sản phẩm phải lớn hơn 6 ký tự";
                        }
                    }

                    if (empty(trim($donGia))) {
                        $error['don_gia'] = "Đơn giả không được để trống";
                    } else {
                        if (!is_numeric($donGia)) {
                            $error['don_gia'] = "Sai định dạng giá, vui lòng nhập lại";
                        }
                    }

                    if (empty(trim($moTa))) {
                        $error['mo_ta'] = "Vui lòng nhập mô tả";
                    } else {
                        if (strlen(trim($moTa)) < 10) {
                            $error['mo_ta'] = "Mô tả phải lớn hơn 10 ký tự";
                        }
                    }

                    $fileName = $_FILES['hinh']['name'];
                    $formatImg = ['jpg', 'png', 'jpeg', 'gif'];
                    $imgType = pathinfo($fileName, PATHINFO_EXTENSION);
                    $targetDir = "../../upload/";

                    move_uploaded_file($_FILES['hinh']['tmp_name'], $targetDir . $fileName);

                    if (empty($error)) {
                        # code...
                        insertSanPham($tenSp, $donGia, $giamGia, $fileName, $ngayNhap, $moTa, $maLoai);
                        echo '<script>alert("Thêm sản phẩm thành công")</script>';
                        echo "<script>window.location.href='index.php?act=quan-ly-sp'</script>";
                    } else {
                        $_SESSION['error_mess'] = $error;
                    }
                }
                $loadAllLoai = loadAllLoai($keyWord = '');
                include "SanPham/AddSP.php";
                break;
            case 'edit-san-pham':
                if (isset($_GET['ma_sp']) && ($_GET['ma_sp'] > 0)) {
                    $maSp = $_GET['ma_sp'];
                    $editSp = loadOneSanPham($maSp);
                }
                $loadAllLoai = loadAllLoai($keyWord = '');
                include "SanPham/EditSP.php";
                break;
            case 'cap-nhat-sp':
                if (isset($_POST['update-sp']) && ($_POST['update-sp'])) {
                    $maSp = $_POST['ma_sp'];
                    $maLoai = $_POST['ma_loai'];
                    $tenSp = $_POST['ten_sp'];
                    $donGia = $_POST['don_gia'];
                    $giamGia = $_POST['giam_gia'];
                    $moTa = $_POST['mo_ta'];
                    $soLuotXem = $_POST['so_luot_xem'];
                    $targetDir = "../../upload/";
                    $fileName = $_FILES['hinh']['name'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $targetDir . $fileName);
                    updateSanPham($maSp, $tenSp, $donGia, $giamGia, $fileName, $moTa, $maLoai, $soLuotXem);
                    echo '<script>alert("Cập nhật sản phẩm thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-sp'</script>";
                }
                break;
            case 'xoa-san-pham':
                if (isset($_GET['ma_sp']) && ($_GET['ma_sp'] > 0)) {
                    $maSp = $_GET['ma_sp'];
                    deleteSanPham($maSp);
                    echo '<script>alert("Xóa sản phẩm thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-sp'</script>";
                }
                break;
            case 'xoa-sp-all':
                if (isset($_POST['btn_delete'])) {
                    $maSp = $_POST['ma_sp'];
                    foreach ($maSp as $sp) {
                        deleteSanPham($sp);
                    }
                    echo '<script>alert("Xóa các sản phẩm đã chọn thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-sp'</script>";
                }
                break;
                //  ================================== CONTROLLER KHÁCH HÀNG ==================================
            case 'quan-ly-kh':
                $loadAllKH = loadAllKhachHang();
                include "KhachHang/ListKH.php";
                break;
            case 'them-khach-hang':
                if (isset($_POST['them-kh']) && ($_POST['them-kh'])) {
                    $hoTen = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $matKhau = $_POST['mat_khau'];
                    $matKhau2 = $_POST['mat_khau2'];
                    $diaChi = $_POST['dia_chi'];
                    $soDT = $_POST['so_dt'];
                    $kichHoat = $_POST['kich_hoat'];
                    $vaiTro = $_POST['vai_tro'];

                    // var_dump($_POST);
                    // die();
                    // Kiểm tra họ tên
                    if (empty(trim($hoTen))) {
                        $error['ho_ten'] = "Vui lòng nhập họ tên";
                    } else {
                        if (strlen(trim($hoTen)) < 10) {
                            $error['ho_ten'] = "Họ tên phải lớn hơn 10 ký tự";
                        }
                    }

                    // Kiểm tra email
                    if (empty(trim($email))) {
                        $error['email'] = "Vui lòng nhập email";
                    }

                    // Kiểm tra mật khẩu
                    if (empty(trim($matKhau))) {
                        $error['mat_khau'] = "Vui lòng nhập mật khẩu";
                    } else {
                        if (strlen(trim($matKhau)) < 6) {
                            $error['mat_khau'] = "Mật khẩu phải lớn hơn 6 ký tự";
                        }
                    }

                    // Xác nhận mật khẩu
                    if (empty(trim($matKhau))) {
                        $error['mat_khau2'] = "Vui lòng nhập mật khẩu";
                    } else {
                        if ($matKhau !== $matKhau2) {
                            $error['mat_khau2'] = "Xác nhận mật khẩu không khớp, vui lòng kiểm tra lại";
                        }
                    }

                    // Kiểm tra hình ảnh

                    if (empty($_FILES['hinh']['size'] > 0)) {
                        $error['hinh'] = "Hình ảnh không được để trống";
                    }

                    if (empty($error)) {

                        $fileName = $_FILES['hinh']['name'];
                        $targetDir = "../../upload/";
                        move_uploaded_file($_FILES['hinh']['tmp_name'], $targetDir . $fileName);
                        insertKhachHang($hoTen, $email, $matKhau, $fileName, $diaChi, $soDT, $vaiTro, $kichHoat);
                        echo '<script>alert("Thêm khách hàng thành công")</script>';
                        echo "<script>window.location.href='index.php?act=quan-ly-kh'</script>";
                    } else {
                        $_SESSION['error_mess'] = $error;
                    }
                }
                include "KhachHang/AddKH.php";
                break;
            case 'edit-khach-hang':
                if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] > 0)) {
                    $mKH = $_GET['ma_kh'];
                    $editKH = editKhachHang($mKH);
                }
                include "KhachHang/EditKH.php";
                break;
            case 'update-khach-hang':
                if (isset($_POST['update-kh']) && ($_POST['update-kh'])) {
                    $maKH = $_POST['ma_kh'];
                    $hoTen = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $matKhau = $_POST['mat_khau'];
                    $diaChi = $_POST['dia_chi'];
                    $soDT = $_POST['so_dt'];
                    $kichHoat = $_POST['kich_hoat'];
                    $vaiTro = $_POST['vai_tro'];

                    $fileName = $_FILES['hinh']['name'];
                    $targetDir = "../../upload/";
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $targetDir . $fileName);
                    updateKhachHang($maKH, $hoTen, $email, $matKhau, $fileName, $diaChi, $soDT, $vaiTro, $kichHoat);
                    echo '<script>alert("Cập nhật hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-kh'</script>";
                    // var_dump($maKH, $hoTen, $email, $matKhau, $fileName, $diaChi, $soDT, $vaiTro, $kichHoat);
                }
                break;
            case 'xoa-khach-hang':
                if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] > 0)) {
                    $maKH = $_GET['ma_kh'];
                    deleteKhachHang($maKH);
                    echo '<script>alert("Xóa khách hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-kh'</script>";
                }
                break;
            case 'xoa-kh-all':
                if (isset($_POST['btn_delete'])) {
                    $maKh = $_POST['ma_kh'];
                    foreach ($maKh  as $key) {
                        deleteKhachHang($key);
                    }
                    echo '<script>alert("Xóa toàn bộ khách hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-kh'</script>";
                }
                break;
                //  ================================== CONTROLLER BÌNH LUẬN ==================================
            case 'quan-ly-bl':
                $thongKeBinhLuan = thongKeBinhLuan();
                include "BinhLuan/ListBL.php";
                break;
            case 'chi-tiet-bl':
                if (isset($_GET['ma_sp']) && ($_GET['ma_sp'] > 0)) {
                    $maSp = $_GET['ma_sp'];
                    $loadAllBinhLuan = loadAllBinhLuan($maSp);
                }
                include "BinhLuan/DetailsBinhLuan.php";
                break;
            case 'them-binh-luan':
                if (isset($_POST['them-bl']) && ($_POST['them-bl'])) {
                    $maSp = $_POST['ma_sp'];
                    $noiDung = $_POST['noi_dung'];
                    $ngayNhap = date('Y/m/d');
                    // $maKH = 32;

                    insertBinhLuan($noiDung, $maSp, $maKH = 32, $ngayNhap);
                    echo '<script>alert("Thêm bình luận thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-bl'</script>";
                }
                $loadAllSp = loadAllSanPham($keyWord = "", $maLoai = 0);
                include "BinhLuan/AddBL.php";
                break;
            case 'edit-binh-luan':
                if (isset($_GET['ma_bl']) && ($_GET['ma_bl']) > 0) {
                    $maBl = $_GET['ma_bl'];
                    $editBinhLuan = editBinhLuan($maBl);
                }
                $loadAllSp = loadAllSanPham($keyWord = "", $maLoai = 0);
                include "BinhLuan/EditBL.php";
                break;
            case 'update-binh-luan':
                if (isset($_POST['cap-nhat-bl']) && ($_POST['cap-nhat-bl'])) {
                    $maBL = $_POST['ma_bl'];
                    $maSp = $_POST['ma_sp'];
                    $noiDung = $_POST['noi_dung'];
                    $ngayNhap = date('Y/m/d');
                    updateBinhLuan($maBL, $noiDung, $maSp, $ngayNhap);
                    echo '<script>alert("Cập nhật bình luận thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-bl'</script>";
                }
                break;
            case 'xoa-binh-luan':
                if (isset($_GET['ma_bl']) && ($_GET['ma_bl'] > 0)) {
                    $maSp = $_GET['ma_bl'];
                    deleteBinhLuan($maSp);
                    echo '<script>alert("Xóa bình luận thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-kh'</script>";
                }
                break;
                //  ================================== CONTROLLER ĐƠN HÀNG ==================================

            case 'quan-ly-don-hang':
                $loadAllDonHang = loadAllDonHang();
                include "bill/ListBill.php";
                break;
            case 'chi-tiet-don-hang':
                if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] > 0)) {
                    $maKh = $_GET['ma_kh'];
                    $loadMyBill = loadMyBill($maKh);
                }

                include "bill/ChiTietBill.php";
                break;
            case 'sua-don-hang':
                if (isset($_GET['cart']) && ($_GET['cart'] > 0)) {
                    $cart = $_GET['cart'];
                    $myBill = loadOneCart($cart);
                }
                include "bill/SuaDonHang.php";
                break;
            case 'update-don-hang':
                if (isset($_POST['update-bill'])) {
                    $thanhTien = 0;
                    $idBill = $_POST['id_bill'];
                    $soLuong = $_POST['so_luong'];
                    $gia = $_POST['gia'];
                    $tongDon = $soLuong * $gia;

                    updateBill($idBill, $soLuong, $tongDon);
                    echo '<script>alert("Cập nhật đơn hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-don-hang'</script>";
                }
                break;
            case 'xoa-don-hang':
                if (isset($_GET['cart']) && ($_GET['cart'] > 0)) {

                    if ($_SESSION['my_cart'] < 0) {
                        echo '<script>alert("Đơn hàng phải có ít nhất 1 sản phẩm")</script>';
                    } else {
                        $cart = $_GET['cart'];
                        delBill($cart);
                    }
                    echo '<script>alert("Xóa đơn hàng thành công")</script>';
                    echo "<script>window.location.href='index.php?act=quan-ly-don-hang'</script>";
                }
                break;
            case 'them-sp-don-hang':
                if (isset($_POST['them-dh'])) {
                    $maSp = $_POST['ma_sp'];
                    $soLuong = $_POST['so_luong'];
                    $idBill = $_POST['id_bill'];
                    $maKh = $_POST['ma_kh'];
                    if (isset($maSp)) {
                        $hinh = loadOneSanPham($maSp)['hinh'];
                        $gia = loadOneSanPham($maSp)['don_gia'];
                        $tenSp = loadOneSanPham($maSp)['ten_sp'];
                        $thanhTien = $soLuong * $gia;
                        addBill($maSp, $hinh, $tenSp, $gia, $soLuong, $maKh, $idBill, $thanhTien);
                        echo '<script>alert("Thêm đơn hàng thành công")</script>';
                        echo "<script>window.location.href='index.php?act=quan-ly-don-hang'</script>";
                    }
                }

                $donHang =  loadAllDonHang();
                $loadAllSp = loadAllSanPham($keyWord = "", $ma_loai = 0);
                include "bill/them-sp-don-hang.php";
                break;
                //  ================================== CONTROLLER THỐNG KÊ ==================================
            case 'quan-ly-thong-ke':
                $thongKe = thongKeSanPham();
                include "ThongKe/ListThongKe.php";
                break;
            case 'bieu-do-thong-ke':
                $thongKe = thongKeSanPham();
                include "ThongKe/BieuDo.php";
                break;
            case 'dang-xuat':
                session_unset();
                echo '<script>window.location="login.php"</script>';
                break;
            default:
                include "layout/HomeAdmin.php";
                break;
        }
    } else {
        $sanPham = allSanPham();
        $danhMuc = allLoai();
        $khachHang = allKH();
        $binhLuan = allBL();
        include "layout/HomeAdmin.php";
    }
    include "layout/FooterAdmin.php";
} else {
    echo '<script>window.location="login.php"</script>';
}
