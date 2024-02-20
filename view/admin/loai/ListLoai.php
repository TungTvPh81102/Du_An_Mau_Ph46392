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
                    <h5 class="card-tile">Danh sách loại hàng</h5>
                    <h6 class="card-des">Danh sách các loại hàng có trên hệ thống</h6>
                </div>
                <div class="card-add">
                    <a href="index.php?act=them-loai-hang" class="box-link add">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        Thêm mới loại hàng
                    </a>
                </div>
            </div>
            <div style="padding-left: 28px;" class="select-search">
                <form action="index.php?act=quan-ly-loai" method="post">
                    <input class="btn" type="text" name="keyword" id="" placeholder="Nhập từ khóa tìm kiếm...">
                    <input class="btn btn-danger" type="submit" value="Tìm kiếm" name="search">
                </form>
            </div>
            <div class="card-body ">
                <?php if (!empty($loadAllLoai)) { ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Loại</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($loadAllLoai as $loai) : ?>
                                <tr>
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th scope="row"><?= $loai['ma_loai'] ?></th>
                                    <td><?= $loai['ten_loai'] ?></td>
                                    <td>
                                        <a href="index.php?act=sua-loai-hang&ma_loai=<?= $loai['ma_loai'] ?>" class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm không?')" href="index.php?act=xoa-loai-hang&ma_loai=<?= $loai['ma_loai'] ?>" class="
                                                    btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                <?php } else { ?>
                    <div class="alert alert-danger">Không có thứ bạn cần tìm</div>
                <?php } ?>
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