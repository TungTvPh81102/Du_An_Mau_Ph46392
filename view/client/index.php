<?php
session_start();
include "layout/header.php";
include "../../global.php";
require_once "../../model/pdo.php";
require_once "../../email/phpmailer/Exception.php";
require_once "../../email/phpmailer/PHPMailer.php";
require_once "../../email/phpmailer/SMTP.php";
require_once "../../model/email.php";
require_once "../../model/loai.php";
require_once "../../model/SanPham.php";
require_once "../../model/KhachHang.php";
require_once "../../model/cart.php";
$loadAllSanPham =  timKiemSanPham($keyWord = "");
$loadAllDanhMuc  = loadAllDanhMucHome();
$topSanPham = topSanPham();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Kiểm tra xem mmagnr my_Cart tồn tại chưa
if (!isset($_SESSION['my_cart'])) {
    // $_SESSION['my_cart'];
    $_SESSION['my_cart'] = [];
}
$errors = [];
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'search':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $keyWord = $_POST['keyword'];
                $loadAllSanPham = timKiemSanPham($keyWord);
            }
            include "layout/home.php";
            break;
        case 'dang-nhap':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $email = $_POST['email'];
                $matKhau = $_POST['mat_khau'];
                $vaiTro = 1;
                $checkUser = checkUser($email, $matKhau, $vaiTro);
                var_dump($checkUser);
                var_dump($email);
                var_dump($matKhau);
                if (empty($email)) {
                    $errors['email'] = 'Vui lòng nhập địa chỉ email';
                } else {
                    $checkEmail = checkEmail($email);
                    if (!$checkEmail) {
                        $errors['email'] = 'Tài khoản mật khẩu không đúng';
                    }
                }

                if (empty($matKhau)) {
                    $errors['mat_khau'] = 'Vui lòng nhập mật khẩu';
                } else {
                    $checkPass = checkPass($matKhau);
                    if (!$checkPass) {
                        $errors['mat_khau'] = 'Tài khoản mật khẩu không đúng';
                    }
                }

                if (empty($errors)) {
                    if (is_array($checkUser)) {
                        $_SESSION['user'] = $checkUser;
                        var_dump($_SESSION['user']);
                        echo '<script>alert("Đăng nhập thành công")</script>';
                        echo '<script>window.location.href="index.php"</script>';
                        // header('Location: index.php');
                        exit();
                    } else {
                        echo '<script>alert("Tài khoản mật khẩu chưa đúng")</script>';
                    }
                } else {
                    echo '<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
                }
            } else {
                session_unset();
            }
            include "layout/home.php";
            break;
        case 'dang-ky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $hoTen = $_POST['ho_ten'];
                $diaChi = $_POST['dia_chi'];
                $soDT = $_POST['so_dt'];
                $email = $_POST['email'];
                $matKhau = $_POST['mat_khau'];
                $matKhau2 = $_POST['mat_khau2'];
                $checkAccount = checkTaiKhoanDangKy($email);
                if (empty($hoTen)) {
                    $errors['ho_ten'] = 'Vui lòng nhập thông tin';
                }

                if (empty($diaChi)) {
                    $errors['dia_chi'] = 'Vui lòng nhập thông tin';
                }

                if (empty($soDT)) {
                    $errors['so_dt'] = 'Vui lòng nhập thông tin';
                } else {
                    if (!is_numeric($soDT) && !strlen($soDT) <= 11) {
                        $errors['so_dt'] = 'Vui lòng kiểm tra lại số điện thoại';
                    }
                }

                if (empty($email)) {
                    $errors['email'] = 'Vui lòng nhập thông tin';
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = 'Sai định dạng email, vui lòng nhập lại';
                    } else {
                        if ($checkAccount) {
                            $errors['email'] = 'Địa chỉ email đã tồn tại, vui lòng nhập địa chỉ khác';
                        }
                    }
                }

                if (empty($matKhau)) {
                    $errors['mat_khau'] = 'Vui lòng nhập thông tin';
                }

                if (empty($matKhau2)) {
                    $errors['mat_khau2'] = 'Vui lòng nhập thông tin';
                }

                if ($matKhau !== $matKhau2) {
                    $errors['mat_khau2'] = 'Xác nhận mật khẩu không khớp, vui lòng nhập lại';
                }

                if (empty($errors)) {
                    $hashedPassword = password_hash($matKhau, PASSWORD_DEFAULT);
                    $nameFile = $_FILES['hinh']['name'];
                    $targetDir = "../../upload/";
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $targetDir . $nameFile);
                    if (!$checkAccount) {
                        dangKyTaiKhoan($hoTen, $email, $matKhau, $nameFile, $diaChi, $soDT);
                        echo '<script>alert("Đăng ký tài khoản thành công")</script>';
                        echo '<script>window.location.href="index.php"</script>';
                    } else {
                        echo '<script>alert("Tài khoản đã tồn tại, vui lòng nhập tài khoản khác")</script>';
                        echo '<script>window.location.href="index.php?act=dang-ky"</script>';
                    }
                } else {
                    echo '<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
                }
            }
            include "TaiKhoan/DangKy.php";
            break;
        case 'cap-nhat-tk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $maKh = $_POST['ma_kh'];
                $hoTen = $_POST['ho_ten'];
                $diaChi = $_POST['dia_chi'];
                $soDT = $_POST['so_dt'];
                $email = $_POST['email'];
                $nameFile = $_FILES['hinh']['name'];
                $targetDir = "../../upload/";
                move_uploaded_file($_FILES['hinh']['tmp_name'], $targetDir . $nameFile);
                capNhatTaiKhoan($maKh, $hoTen, $email, $nameFile, $diaChi, $soDT);
                $_SESSION['user'] = checkEmail($email);
                echo '<script>alert("Cập nhật tài khoản thành công")</script>';
                // echo '<script>window.location.href="index.php"</script>';
            }
            include "TaiKhoan/CapNhatTK.php";
            break;
        case 'doi-mk':
            if (isset($_POST['doimk']) && ($_POST['doimk'])) {
                $matKhau1 = $_POST['mat_khau1'];
                $matKhau2 = $_POST['mat_khau2'];
                $matKhau3 = $_POST['mat_khau3'];
                $checkPass = checkPass($matKhau3);
                $maKh = $_SESSION['user']['ma_kh'];

                if (empty($matKhau1)) {
                    $errors['mat_khau1'] = 'Vui lòng nhập thông tin';
                }
                if (empty($matKhau2)) {
                    $errors['mat_khau2'] = 'Vui lòng nhập thông tin';
                }
                if (empty($matKhau3)) {
                    $errors['mat_khau3'] = 'Vui lòng nhập thông tin';
                } else {
                    if (!$checkPass) {
                        $errors['mat_khau1'] = 'Mật khẩu chưa chính xác';
                    }
                }

                if ($matKhau1 !== $matKhau2) {
                    $errors['mat_khau2'] = 'Xác nhận mật khẩu chưa đúng, vui lòng kiểm tra lại';
                }

                if (!empty($errors)) {
                    echo '<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
                } else {
                    updatePass($maKh, $matKhau2);
                    $thongBao = "Thay đổi mật khẩu thành công";
                }
            }
            include "TaiKhoan/DoiMk.php";
            break;
        case 'quen-mk':
            if (isset($_POST['quenmk']) && ($_POST['quenmk'])) {
                $email = $_POST['email'];
                $checkEmail = checkEmail($email);
                if (!$checkEmail) {
                    $thongBao = "Email không tồn tại, vui lòng kiểm tra lại";
                } else {
                    // $thongBao = "Mật khẩu của bạn là: " . '<strong>' . $checkEmail['mat_khau'] . '</strong>';
                    $subject = 'Yêu cầu thay đổi mật khẩu của bạn';
                    $content = 'Chào bạn' . '<br>';
                    $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn, vui lòng kiểm tra lại thông tin mật khẩu dưới đây' . '<br>';
                    $content .= "Mật khẩu của bạn là: " . '<strong>' . $checkEmail['mat_khau'] . '</strong>' . '<br>';
                    $content .= 'Trận trọng cảm ơn!!!';

                    $sendEmail = sendEmail($email, $subject, $content);
                    if ($sendEmail) {
                        $thongBao = 'Yêu cầu đã được gửi, vui lòng kiểm tra email để lấy mật khẩu';
                    } else {
                        $thongBao = 'Gửi email thất bại, vui lòng kiểm tra lại thông tin';
                    }
                }
            }
            include "TaiKhoan/QuenMk.php";
            break;
        case 'thoat':
            session_unset();
            header('location: index.php');
            break;
        case 'san-pham':
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai']) > 0) {
                $maLoai = $_GET['ma_loai'];
            } else {
                $maLoai = 0;
            }
            if (isset($_POST['search']) && ($_POST['search'])) {
                $keyWord = $_POST['keyword'];
            } else {
                $keyWord = "";
            }
            $tenLoai = editLoai($maLoai);
            $loadAllSanPham = loadAllSanPham($keyWord, $maLoai);
            include "layout/sanPham.php";
            break;
        case 'sp-chi-tiet':
            if (isset($_GET['ma_sp']) && ($_GET['ma_sp'] > 0)) {
                $maSanPham = $_GET['ma_sp'];
                $sanPhamChiTiet = loadOneSanPham($maSanPham);
                $sanPhamCungLoai = sanPhamCungLoai($maSanPham, $sanPhamChiTiet['ma_loai']);
                updateView($maSanPham, $sanPhamChiTiet['so_luot_xem']);
                include "layout/sanPhamCT.php";
            } else {
                include "layout/home.php";
            }
            break;
        case 'them-gio-hang':
            if (isset($_POST['add-cart']) && ($_POST['add-cart'])) {
                $maSp = $_POST['ma_sp'];
                $tenSp = $_POST['ten_sp'];
                $donGia = $_POST['don_gia'];
                $hinh = $_POST['hinh'];
                $soLuong = $_POST['so_luong'];
                $thanhTien = $soLuong * $donGia;
                $addSanPham = [$maSp, $tenSp, $hinh, $donGia, $soLuong, $thanhTien];
                var_dump($maSp, $tenSp, $donGia, $hinh);
                // $_SESSION['my_cart'];
                array_push($_SESSION['my_cart'], $addSanPham); // đẩy 1 mảng con vào 1 mảng cha là session['my_cart']
                $thongBao = "Thêm sản phẩm thành công";
            }
            include "cart/ListCart.php";
            break;
        case 'view-cart':
            include "cart/ListCart.php";
            break;
        case 'xoa-cart':
            if (isset($_GET['id-cart'])) {
                array_splice($_SESSION['my_cart'], $_GET['id-cart'], 1); // xóa mảng nào, định vị thứ mấy, xóa bao nhiêu phần tử: 1 là xóa ngay vị trí đó
                $thongBao = "Xóa sản phẩm thành công";
            } else {
                $_SESSION['my_cart'] = [];
            }
            // header("location: index.php?act=them-gio-hang");
            include "cart/ListCart.php";
            break;
        case 'xoa-all-cart':
            if (isset($_SESSION['my_cart'])) {
                unset($_SESSION['my_cart']); // xóa toàn bộ giỏ hàng
            } else {
                $_SESSION['my_cart'] = [];
            }
            include "cart/ListCart.php";
            break;
        case 'bill':
            if (!isset($_SESSION['user'])) {
                echo '<script>alert("Vui lòng đăng nhập để đặt hàng")</script>';
                echo '<script>window.location.href="index.php?act=view-cart"</script>';
            } else {
                include "cart/bill.php";
            }
            break;
        case 'bill-confirm':
            if (isset($_POST['dat-hang'])) {
                // Tạo đơn hàng
                // if (isset($_SESSION['my_cart'])) {\
                $maKh = $_POST['ma_kh'];
                $hoTen = $_POST['ho_ten'];
                $diaChi = $_POST['dia_chi'];
                $email = $_POST['email'];
                $soDt = $_POST['so_dt'];
                $pttt = $_POST['pttt'];
                $ngayDatHang = date('h:i:sa d/m/Y');
                $tongDonHang = tongDonHang();
                var_dump($hoTen, $diaChi, $soDt, $email, $pttt, $tongDonHang, $ngayDatHang, $maKh);
                if ($pttt == 1) {
                    $pttt = 'Trả tiền khi nhận hàng';
                } elseif ($pttt == 2) {
                    $pttt = 'Chuyển khoản ngân hàng';
                } else {
                    $pttt = 'Thanh toán khác';
                }

                $idDonHang = taoDonHang($hoTen, $diaChi, $soDt, $email, $pttt, $tongDonHang, $ngayDatHang, $maKh);
                // Inssert into bảng cart với $_Session['my_cart] và idDonHang;
                // Tạo giỏ hàng
                foreach ($_SESSION['my_cart'] as $cart) {
                    insertCart($_SESSION['user']['ma_kh'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idDonHang);
                }

                // } else {
                $_SESSION['my_cart'] = [];
                // }
                if (isset($idDonHang)) {
                    $donHang = loadDonHang($idDonHang);
                    $chiTietDonHang = loadCart($idDonHang);
                }
            }
            include "cart/billConfirm.php";
            break;
        case 'don-hang':
            // if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] > 0)) {
            //     $maKh = $_GET['ma_kh'];
            //     $loadMyBill = loadMyBill($maKh);
            // }
            if (isset($_SESSION['user'])) {
                $maKh = $_SESSION['user']['ma_kh'];

                $loadMyBill = loadMyBill($maKh);
            }
            include "cart/MyBill.php";
            break;
        case 'gioi-thieu':
            include "layout/GioiThieu.php";
            break;
        case 'bai-viet':
            include "layout/BaiViet.php";
            break;
        case 'lien-he':
            include "layout/LienHe.php";
            break;
        case 'email':
            if (isset($_POST['email']) && ($_POST['email'])) {
                $email = $_POST['email'];
                $content = $_POST['content'];
                $content .= 'Chào bạn chúng tôi đã nhận được thông tin liên hệ từ bạn';
                sendEmail($email, 'PHP BackEnd Developer', $content);
            }
            break;
        default:
            include "layout/home.php";
            break;
    }
} else {
    include "layout/home.php";
}



include "layout/footer.php";
// session_unset();