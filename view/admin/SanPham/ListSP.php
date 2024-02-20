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
                    <h5 class="card-tile">Danh sách sản phẩm</h5>
                    <h6 class="card-des">Danh sách các sản phẩm có trên hệ thống</h6>
                </div>
                <div class="card-add">
                    <a href="index.php?act=them-san-pham" class="box-link add">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        Thêm mới sản phẩm
                    </a>
                </div>
            </div>
            <div style="padding-left: 28px;" class="select-search">
                <form action="index.php?act=quan-ly-sp" method="post">
                    <input class="btn" type="text" name="keyword" id="" placeholder="Nhập từ khóa tìm kiếm...">
                    <select class="btn btn-light" name="ma_loai" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($loadAllLoai as $loai) {
                            echo '
                                <option value =' . $loai['ma_loai'] . '>' . $loai['ten_loai'] . '</option>
                                ';
                        }
                        ?>
                    </select>
                    <input class="btn btn-danger" type="submit" value="Tìm kiếm" name="search">
                </form>
            </div>
            <div class="card-body ">
                <?php if(!empty($loadAllSp)){ ?>
                <form action="index.php?act=xoa-sp-all" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Đơn Giá</th>
                                <th scope="col">Giảm Giá</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Ngày Nhập</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Số Lượt Xem</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($loadAllSp as $sp) : ?>
                            <tr>
                                <th><input type="checkbox" name="ma_sp[]" id="checkbox" value="<?= $sp['ma_sp'] ?>">
                                </th>
                                <th scope="row"><?= $sp['ma_sp'] ?></th>
                                <td scope="row"><?= $sp['ten_sp'] ?></td>
                                <td scope="row"><?= number_format($sp['don_gia'], 0) ?></td>
                                <td scope="row"><?= $sp['giam_gia'] ?></td>
                                <td scope="row">
                                    <img style="width: 70px; height:70px; object-fit: cover;"
                                        src="../../upload/<?= $sp['hinh'] ?>" alt="">
                                </td>
                                <td scope="row"><?= $sp['ngay_nhap'] ?></td>
                                <td scope="row"><?= $sp['mo_ta'] ?></td>
                                <td scope="row"><?= $sp['so_luot_xem'] ?></td>
                                <td>
                                    <a href="index.php?act=edit-san-pham&ma_sp=<?= $sp['ma_sp'] ?>"
                                        class="btn btn-warning">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm không?')"
                                        href="index.php?act=xoa-san-pham&ma_sp=<?= $sp['ma_sp'] ?>" class="
                                                    btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" name="" id="check-all" class="btn btn-success">Chọn tất cả</button>
                    <button type="button" name="" id="clear-all" class="btn btn-danger">Bỏ chọn</button>
                    <button onclick="return confirm('Xóa các mục đã chọn chứ?')" id="btn-delete" name="btn_delete"
                        class="btn btn-default">Xóa các mục chọn</button>
                </form>
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