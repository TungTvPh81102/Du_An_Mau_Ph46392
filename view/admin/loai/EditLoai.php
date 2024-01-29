<div class="col-10 box-right">
    <div class="head-top">
        <div class="menu-content d-flex justify-content-between">
            <ul class="head-menu d-flex ">
                <li class="menu-item active">
                    <a href="#" class="menu-link">Trang quản trị</a>
                </li>
                <li class="menu-item">
                    <a href="../indexHome.php" class="menu-link">Trang khách hàng</a>
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
        <h3 class="menu-title">Quản lý loại hàng</h3>
    </div>
    <div class="head-between">
        <div class="between-container border border-primary">
            <div class="card-header">
                <div class="card-content">
                    <h5 class="card-tile">Form sửa loại hàng</h5>
                </div>
            </div>
            <?php
            if (isset($_SESSION['error_mess'])) {
                $errorMessage = $_SESSION['error_mess'];
            }
            unset($_SESSION['error_mess']);
            ?>
            <div class="card-form">
                <form action="index.php?act=update-loai-hang" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Mã loại hàng</label>
                            <input type="text" name="ma_loai" id="" placeholder="AUTO" readonly
                                value="<?= $editLoai['ma_loai'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tên loại hàng</label>
                            <input type="text" name="ten_loai" id="" placeholder="Nhập vào tên sản phẩm"
                                value="<?= $editLoai['ten_loai'] ?>">
                            <span style="color: red;">
                                <?php echo (isset($errorMessage['ten_loai'])) ? $errorMessage['ten_loai'] : ""; ?>
                            </span>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="btn-form">
                            <input class="btn btn-active" type="submit" name="update-loai" value="Cập nhật">
                            <input class="btn" type="reset" value="Làm lại">
                            <a class="btn btn-light" href="index.php?act=quan-ly-loai">Quay về trang danh
                                sách</a>
                        </div>
                    </div>
                </form>
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