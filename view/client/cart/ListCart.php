<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <h1 class="text-center bg-secondary p-2 text-bg-dark">Giỏ hàng của tôi</h1>
            <?php if (isset($thongBao)) { ?>
                <div class="alert alert-success"><?php echo $thongBao ?></div>
            <?php } ?>
            <div class="row">
                <?php if (!empty($_SESSION['my_cart'])) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            viewCart(1);
                            ?>
                        </tbody>
                    </table>
                    <div class="btn">
                        <a href="index.php?act=bill" class="btn btn-success">Đồng ý đặt hàng</a>
                        <a href="index.php?act=xoa-all-cart" class="btn btn-danger">Xóa tất cả </a>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger">Không có sản phẩm nào trong giỏ hàng cả</div>
                <?php } ?>
            </div>
        </div>
        <?php include "./layout/boxRight.php" ?>
    </div>
</div>