<div class="container">

    <div class="row mb-3">
        <div class="col-9">
            <div class="row mb-3">
                <div class="box-title">Sản phẩm</div>
                <div class="box-content detail">
                    <?php if (!empty($sanPhamChiTiet)) { ?>
                        <div class="detail-img">
                            <img src="../../upload/<?= $sanPhamChiTiet['hinh'] ?>" alt="">
                        </div>
                        <div class="detail-content">
                            <span>Tên sản phẩm: <?= $sanPhamChiTiet['ten_sp'] ?></span>
                            <span>Đơn giá: <?= number_format($sanPhamChiTiet['don_gia'], 0) ?> VNĐ</span>
                            <span>Mô tả: <?= $sanPhamChiTiet['mo_ta'] ?></span>
                            <!-- <a href="index.php?act=them-gio-hang" class="btn btn-primary">Thêm vào giỏ hàng</a> -->
                            <form action="index.php?act=them-gio-hang" method="post">
                                <input type="hidden" name="ma_sp" value="<?= $sanPhamChiTiet['ma_sp'] ?>">
                                <input type="hidden" name="ten_sp" value="<?= $sanPhamChiTiet['ten_sp'] ?>">
                                <input type="hidden" name="don_gia" value="<?= $sanPhamChiTiet['don_gia'] ?>">
                                <input type="hidden" name="hinh" value="<?= $sanPhamChiTiet['hinh'] ?>">
                                <input style="width: 70px;" class="text-center mb-3" type="number" name="so_luong" id="" value="1">
                                <input class="btn btn-primary" type="submit" value="Thêm vào giỏ hàng" name="add-cart">
                            </form>
                        </div>
                    <?php } else {
                        header("location: index.php");
                    } ?>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#binhluan").load("../client/binhluan/BinhLuanForm.php", {
                        ma_sp: <?= $sanPhamChiTiet['ma_sp'] ?>
                    })
                });
            </script>
            <div class="row mb-3">
                <div class="box-title">Bình luận</div>
                <div class="box-comment" id="binhluan">
                    <!-- <iframe src="../client/binhluan/BinhLuanForm.php?ma_sp=<?= $sanPhamChiTiet['ma_sp'] ?>" frameborder="0"
                    width="100%" height="100%">
                </iframe> -->
                </div>
            </div>
            <div class="row">
                <div class="box-title">Sản phẩm liên quan</div>
                <div class="box-content related">
                    <?php foreach ($sanPhamCungLoai as $sanPham) : ?>
                        <div class="card text-center">
                            <a href="index.php?act=sp-chi-tiet&ma_sp=<?= $sanPham['ma_sp'] ?>">
                                <img src="../../upload/<?= $sanPham['hinh'] ?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="index.php?act=sp-chi-tiet&ma_sp=<?= $sanPham['ma_sp'] ?>" class="card-title"><?= $sanPham['ten_sp'] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php include "boxRight.php" ?>
    </div>

</div>