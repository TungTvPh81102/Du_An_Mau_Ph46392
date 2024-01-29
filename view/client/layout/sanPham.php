<div class="container">

    <div class="row mb-3">
        <div class="col-9">
            <div class="row mb-3">
                <div class="box-title">Sản phẩm <?= (isset($tenLoai['ten_loai'])) ? ': ' .  $tenLoai['ten_loai'] : "" ?>
                </div>
                <div class="card-item mb-3 mt-3">
                    <?php foreach ($loadAllSanPham as $sanPham) : ?>
                        <div class="card">
                            <a href="index.php?act=sp-chi-tiet&ma_sp=<?= $sanPham['ma_sp'] ?>"> <img src="../../upload/<?= $sanPham['hinh'] ?>" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <a href="index.php?act=sp-chi-tiet&ma_sp=<?= $sanPham['ma_sp'] ?>" class="card-title"><?= $sanPham['ten_sp'] ?></a>
                                <p class="card-price">
                                    <?= number_format($sanPham['don_gia'], 0) ?>
                                </p>
                                <form action="index.php?act=them-gio-hang" method="post">
                                    <input type="hidden" name="ma_sp" value="<?= $sanPham['ma_sp'] ?>">
                                    <input type="hidden" name="ten_sp" value="<?= $sanPham['ten_sp'] ?>">
                                    <input type="hidden" name="don_gia" value="<?= $sanPham['don_gia'] ?>">
                                    <input type="hidden" name="hinh" value="<?= $sanPham['hinh'] ?>">
                                    <input style="width: 70px;" class="text-center mb-3" type="number" name="so_luong" id="" value="1">
                                    <input class="btn btn-primary" type="submit" value="Thêm vào giỏ hàng" name="add-cart">
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php include "boxRight.php" ?>
    </div>

</div>