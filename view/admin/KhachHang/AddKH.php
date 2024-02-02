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
        <h3 class="menu-title">Quản lý khách hàng</h3>
    </div>
    <div class="head-between">
        <div class="between-container border border-primary">
            <div class="card-header">
                <div class="card-content">
                    <h5 class="card-tile">Form thêm mới thông tin khách hàng</h5>
                </div>
            </div>
            <?php
            if (isset($_SESSION['error_mess'])) {
                $errorMessage = $_SESSION['error_mess'];
            }
            unset($_SESSION['error_mess']);
            ?>
            <div class="card-form">
                <form action="index.php?act=them-khach-hang" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Mã khách hàng</label>
                            <input type="text" name="ma_kh" id="" placeholder="AUTO" readonly>
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Họ tên khách hàng</label>
                            <input type="text" name="ho_ten" id="" placeholder="Nhập họ tên khách hàng">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['ho_ten'])) ? $errorMessage['ho_ten'] : "" ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" placeholder="Nhập email">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['email'])) ? $errorMessage['email'] : "" ?>

                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="mat_khau" id="" placeholder="Nhập mật khẩu">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['mat_khau'])) ? $errorMessage['mat_khau'] : "" ?>

                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Xác nhận mật khẩu</label>
                            <input type="password" name="mat_khau2" id="" placeholder="Xác nhận mật khẩu">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['mat_khau2'])) ? $errorMessage['mat_khau2'] : "" ?>

                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Hình</label>
                            <input type="file" name="hinh" id="">
                            <span style="color: red;">
                                <?php echo (!empty($errorMessage['hinh'])) ? $errorMessage['hinh'] : "" ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="dia_chi" id="" placeholder="Nhập địa chỉ">
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="tel" name="so_dt" id="" placeholder="Nhập số điện thoại">
                            <span style="color: red;">
                            </span>
                        </div>
                        <div style="padding-left: 0;" class="form-check">
                            <label for="">Kích hoạt?</label>
                            <input type="radio" name="kich_hoat" id="" value="1" checked> Chưa kích hoạt
                            <input type="radio" name="kich_hoat" id="" value="2"> Kích hoạt
                        </div>
                        <div style="padding-left: 0;" class="form-check">
                            <label for="">Vai trò?</label>
                            <input type="radio" name="vai_tro" id="" value="1" checked> Khách hàng
                            <input type="radio" name="vai_tro" id="" value="2"> Quản trị viên
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-form">
                            <input class="btn btn-active" type="submit" name="them-kh" value="Tạo mới">
                            <input class="btn" type="reset" value="Làm lại">
                            <a class="btn btn-light" href="index.php?act=quan-ly-kh">Quay về trang danh
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