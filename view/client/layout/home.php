<div class="row mb-3">
    <div class="col-9">
        <div id="carouselExampleIndicators" class="carousel slide mb-3 " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded ">
                <div class="carousel-item active">
                    <img src="../../public/assets/img/banner.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../public/assets/img/banner2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../public/assets/img/banner3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="card-item mb-3">
            <?php foreach ($loadAllSanPham as $sanPham) : ?>
                <div class="card overflow-hidden">
                    <img src="../../upload/<?= $sanPham['hinh'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="index.php?act=sp-chi-tiet&ma_sp=<?= $sanPham['ma_sp'] ?>" class="card-title"><?= $sanPham['ten_sp'] ?></a>
                        <p class="card-price">
                            <?= number_format($sanPham['don_gia'], 0) ?>
                        </p>
                        <!-- <a href="index.php?act=them-gio-hang" class="btn btn-primary">Thêm vào giỏ hàng</a> -->
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
    <?php include "boxRight.php" ?>
</div>