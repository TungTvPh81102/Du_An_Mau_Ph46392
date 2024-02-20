<div class="col-3">
    <div class="row mb-3">
        <div class="box-title">Tài khoản</div>
        <div class="box-content">
            <?php if (isset($_SESSION['user'])) { ?>
                <p>Xin chào: <strong><?= $_SESSION['user']['ho_ten'] ?></strong></p>
                <img style="width: 60px;" src="../../upload/<?= $_SESSION['user']['hinh'] ?>" alt="">
                <li>
                    <a href="index.php?act=quen-mk">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=doi-mk">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=cap-nhat-tk">Cập nhật tài khoản</a>
                </li>
                <li>
                    <a href="index.php?act=don-hang&ma_kh=<?= $_SESSION['user']['ma_kh'] ?>">Đơn hàng của tôi</a>
                </li>
                <?php if (($_SESSION['user']['vai_tro']) == 2) { ?>
                    <li>
                        <a href=" ../../view/admin/index.php">Đăng nhập quản trị</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="index.php?act=thoat">Thoát</a>
                </li>
            <?php } else { ?>
                <form action="index.php?act=dang-nhap" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                        <input name="email" type="text" class="form-control mb-3">
                        <span class="text-danger">
                            <?php echo (isset($errors['email'])) ? $errors['email'] : '' ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input name="mat_khau" type="password" class="form-control mb-3" id="exampleInputPassword1">
                        <span class="text-danger">
                            <?php echo (isset($errors['mat_khau'])) ? $errors['mat_khau'] : '' ?>
                        </span>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản?</label>
                    </div>
                    <input type="submit" name="login" class="btn btn-primary" value="Đăng nhập">
                </form>
                <li>
                    <a href="index.php?act=quen-mk">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=dang-ky">Đăng ký thành viên</a>
                </li>
            <?php } ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="box-title">Danh mục</div>
        <div class="box-content menu">
            <ul class="menu-item">
                <?php foreach ($loadAllDanhMuc as $danhMuc) : ?>
                    <li class="menu-list">
                        <a class="menu-links" href="index.php?act=san-pham&ma_loai=<?= $danhMuc['ma_loai'] ?>"><?= $danhMuc['ten_loai'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="box-footer searbox">
                <form action="index.php?act=san-pham" method="post">
                    <input type="text" name="keyword" id="" class="form-control mt-2">
                    <input style="margin-top: 5px; width: 100%; cursor: pointer; padding: 5px 10px;" type="submit" value="Tìm kiếm" name="search">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box-title">Top 10 yêu thích</div>
        <div class="box-content cardz">
            <?php foreach ($topSanPham as $sanPham) : ?>
                <div class="product">
                    <img src="../../upload/<?= $sanPham['hinh'] ?>" alt="">
                    <a href="index.php?act=sp-chi-tiet&ma_sp=<?= $sanPham['ma_sp'] ?>"><?= $sanPham['ten_sp'] ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>