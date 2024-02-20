<div class="col-10 box-right">
    <div class="head-top">
        <div class="menu-content d-flex justify-content-between">
            <ul class="head-menu d-flex ">
                <li class="menu-item active">
                    <a href="index.php" class="menu-link">Trang quản trị</a>
                </li>
                <li class="menu-item">
                    <a href="../../view/client/index.php" class="menu-link">Trang khách hàng</a>
                </li>
            </ul>
            <div class="admin-profile">
                <div class="admin-view">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    }
                    ?>
                    <h4 class="hi">Hi, <span class="name"><?= $ho_ten ?></span></h4>
                </div>
            </div>
        </div>
        <h3 class="menu-title">Tổng quan</h3>
    </div>
    <div class="head-between">
        <div class="list-statistics">
            <div class="statistics-container">
                <div class="statistics-item bg-success">
                    <h3 class="statistics-title">Danh mục : <?= $danhMuc['so_luong'] ?></h3>
                    <a href="index.php?act=quan-ly-loai" class="btn">Xem chi tiết</a>
                </div>
                <div class="statistics-item bg-body-secondary">
                    <h3 class="statistics-title">Sản phẩm : <?= $sanPham['so_luong'] ?></h3>
                    <a href="index.php?act=quan-ly-sp" class="btn">Xem chi tiết</a>
                </div>
                <div class="statistics-item bg-info">
                    <h3 class="statistics-title">Khách hàng : <?= $khachHang['so_luong'] ?></h3>
                    <a href="index.php?act=quan-ly-kh" class="btn">Xem chi tiết</a>
                </div>
                <div class="statistics-item bg-warning">
                    <h3 class="statistics-title">Bình luân : <?= $binhLuan['so_luong'] ?></h3>
                    <a href="index.php?act=quan-ly-bl" class="btn">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="list-statistics mt-3">
            <div class="statistics-container" style="float: left; margin-left: 60px;">
                <div class="statistics-item bg-body-tertiary">
                    <h3 class="statistics-title">Đơn hàng : <?= $donHang['so_luong'] ?></h3>
                    <a href="index.php?act=quan-ly-don-hang" class="btn">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    <div class="head-footer">
        <ul class="head-contact">
            <li class="contact-item">
                <a href="#" class="contect-link">About</a>
            </li>
            <li class="contact-item">
                <a href="#" class="contect-link">Team</a>
            </li>
            <li class="contact-item">
                <a href="#" class="contect-link">Contact</a>
            </li>
        </ul>
        <div class="copy-right">
            <span class="year">2024 &copy;</span>
            <span class="copy">Tùng</span>
        </div>
    </div>
</div>