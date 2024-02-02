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
                    <h5 class="card-tile">Thêm sản phẩm vào đơn hàng</h5>
                </div>
            </div>
            <?php
            if (isset($_SESSION['error_mess'])) {
                $errorMessage = $_SESSION['error_mess'];
            }
            unset($_SESSION['error_mess']);
            ?>
            <div class="card-form">
                <form action="index.php?act=them-sp-don-hang" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Chọn sản phẩm</label>
                            <select name="ma_sp" id="">
                                <option value="0">---Chọn sản phẩm---</option>
                                <?php foreach ($loadAllSp as $sp) : ?>
                                    <option value="<?= $sp['ma_sp'] ?>">
                                        <?= $sp['ten_sp'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Chọn đơn hàng</label>
                            <select name="id_bill" id="">
                                <option value="0">---Chọn đơn hàng---</option>
                                <?php foreach ($donHang as $kh) : ?>
                                    <option value="<?= $kh['id_bill'] ?>">
                                        <?= $kh['bill_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Khách hàng</label>
                            <select name="ma_kh" id="">
                                <option value="0">---Chọn khách hàng---</option>
                                <?php foreach ($donHang as $kh) : ?>
                                    <option value="<?= $kh['ma_kh'] ?>">
                                        <?= $kh['ma_kh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="number" name="so_luong" id="" min="1">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-form">
                            <input class="btn btn-active" type="submit" name="them-dh" value="Tạo đơn hàng mới">
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