<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <div class="row mb-3">
                <div class="box-title">Quên mật khẩu</div>
                <div class="box-content">
                    <form class="mt-3" action="index.php?act=quen-mk" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Nhập email của bạn</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Gửi" name="quenmk">
                        <input type="reset" value="Nhập lại" class="btn btn-light">
                    </form>
                    <?php if (isset($thongBao)) {  ?>
                        <div class="alert alert-secondary mt-3"><?= $thongBao ?> </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include "layout/boxRight.php" ?>
    </div>
</div>