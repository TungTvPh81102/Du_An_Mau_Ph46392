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
            // if (isset($_SESSION['error_mess'])) {
            //     $errorMessage = $_SESSION['error_mess'];
            // }
            // unset($_SESSION['error_mess']);
            ?>
            <div class="card-form">
                <form action="index.php?act=update-binh-luan" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Mã Bình Luận</label>
                            <input type="text" name="ma_bl" id="" placeholder="AUTO" readonly value="<?= $editBinhLuan['ma_bl'] ?>">
                            <span style="color: red;">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Mã Sản Phẩm</label>
                            <select name="ma_sp" id="">
                                <!-- <option value="0">---Chọn sản phẩm cần thêm bình luận---</option> -->
                                <?php foreach ($loadAllSp as $sp) :
                                    if ($editBinhLuan['ma_sp'] == $sp['ma_sp']) {
                                ?>
                                        <option value="<?= $sp['ma_sp'] ?>" selected>
                                            <?= $sp['ten_sp'] ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?= $sp['ma_sp'] ?>">
                                            <?= $sp['ten_sp'] ?>
                                        </option>
                                    <?php } ?>
                                <?php endforeach; ?>
                                <span style="color: red;">
                                </span>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung bình luận</label>
                            <textarea name="noi_dung" id="" cols="30" rows="10">
                                <?= $editBinhLuan['noi_dung'] ?>
                            </textarea>
                            <span style="color: red;">
                            </span>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="btn-form">
                            <input class="btn btn-active" type="submit" name="cap-nhat-bl" value="Tạo mới">
                            <input class="btn" type="reset" value="Làm lại">
                            <a class="btn btn-light" href="index.php?act=quan-ly-bl">Quay về trang danh
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