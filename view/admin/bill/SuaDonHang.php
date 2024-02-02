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
                    <h5 class="card-tile">Cập nhật đơn hàng</h5>
                </div>
            </div>
            <?php
            // if (isset($_SESSION['error_mess'])) {
            //     $errorMessage = $_SESSION['error_mess'];
            // }
            // unset($_SESSION['error_mess']);
            ?>
            <div class="card-form">
                <form action="index.php?act=update-don-hang" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id_bill" id="" value="<?= $myBill['id_cart'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="ten_sp" id="" placeholder="Nhập vào tên sản phẩm" value="<?= $myBill['ten_sp'] ?>" readonly>
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Hình</label>
                            <img style="width: 70px;" src="../../upload/<?= $myBill['hinh'] ?>" alt="" readonly>
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="number" name="so_luong" id="" value="<?= $myBill['so_luong'] ?>" min="1">
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Gia</label>
                            <input type="number" name="gia" id="" value="<?= $myBill['gia'] ?>" min="1">
                            <span style="color: red;">
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-form">
                            <input class="btn btn-active" type="submit" name="update-bill" value="Cập nhật">
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