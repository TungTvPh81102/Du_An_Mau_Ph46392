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
        <h3 class="menu-title">Quản lý sản phẩm</h3>
    </div>
    <div class="head-between">
        <div class="between-container border border-primary">
            <div class="card-header">
                <div class="card-content">
                    <h5 class="card-tile">Form thêm mới sản phẩm</h5>
                </div>
            </div>
            <?php
            if (isset($_SESSION['error_mess'])) {
                $errorMessage = $_SESSION['error_mess'];
            }
            unset($_SESSION['error_mess']);
            ?>
            <div class="card-form">
                <form action="index.php?act=them-san-pham" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Chọn loại hàng</label>
                            <select name="ma_loai" id="">
                                <option value="0">---Chọn loại hàng---</option>
                                <?php foreach ($loadAllLoai as $loai) : ?>
                                    <option value="<?= $loai['ma_loai'] ?>"><?= $loai['ten_loai'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['ma_loai'])) ? $errorMessage['ma_loai'] : ""; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="ten_sp" id="" placeholder="Nhập vào tên sản phẩm">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['ten_sp'])) ? $errorMessage['ten_sp'] : ""; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Đơn giá</label>
                            <input type="text" name="don_gia" id="" placeholder="Nhập giá sản phẩm">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['don_gia'])) ? $errorMessage['don_gia'] : ""; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Giảm giá (nếu có)</label>
                            <input type="text" name="giam_gia" id="" placeholder="Nhập giảm giá (nếu có)">
                            <span style="color: red;">

                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Hình</label>
                            <input type="file" name="hinh" id="">
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea class="ckeditor" name="mo_ta" cols="30" rows="10" id="ckeditor"></textarea>
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['mo_ta'])) ? $errorMessage['mo_ta'] : ""; ?>
                            </span>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="btn-form">
                            <input class="btn btn-active" type="submit" name="them-sp" value="Tạo mới">
                            <input class="btn" type="reset" value="Làm lại">
                            <a class="btn btn-light" href="index.php?act=quan-ly-sp">Quay về trang danh
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