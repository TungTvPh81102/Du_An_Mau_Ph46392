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
        <h3 class="menu-title">Quản lý thống kê</h3>
    </div>
    <div class="head-between">
        <div class="between-container border border-primary">
            <div class="card-header">
                <div class="card-content">
                    <h5 class="card-tile">Thống kê dữ liệu có trên hệ thống</h5>
                    <h6 class="card-des">Danh sách thống kê dữ liệu</h6>
                </div>
            </div>
            <div class="card-body ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã danh mục</th>
                            <th scope="col">Tên danh mục</th>
                            <th style="width: 200px;" scope="col">Số lượng sản phẩm</th>
                            <th scope="col">Giá cao nhất</th>
                            <th scope="col">Giá thấp nhất</th>
                            <th scope="col">Giá trung bình</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($thongKe as $list) : ?>
                            <tr>
                                <th scope="row"><?= $list['ma_loai'] ?></th>
                                <td><?= $list['ten_loai'] ?></td>
                                <td><?= $list['so_luong'] ?></td>
                                <td><?= number_format($list['gia_max'], 0) ?></td>
                                <td><?= number_format($list['gia_min']) ?></td>
                                <td><?= number_format($list['gia_tb']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="index.php?act=bieu-do-thong-ke" class="btn btn-primary">Xem biểu đồ</a>
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