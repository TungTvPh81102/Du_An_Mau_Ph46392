<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <div class="row mb-3">
                <div class="box-title">Đổi mật khẩu</div>
                <div class="box-content">
                    <?php
                    if (!empty($thongBao)) {
                        echo '<div class="alert alert-success">' . $thongBao . '</div>';
                    }
                    ?>
                    <form class="mt-3" action="index.php?act=doi-mk" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Nhập mật khẩu mới</label>
                            <input type="password" name="mat_khau1" class="form-control mb-3">
                            <span class="text-danger">
                                <?php echo (isset($errors['mat_khau1'])) ? $errors['mat_khau1'] : '' ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="mat_khau2" class="form-control mb-3">
                            <span class="text-danger">
                                <?php echo (isset($errors['mat_khau2'])) ? $errors['mat_khau2'] : '' ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="mat_khau3" class="form-control mb-3">
                            <span class="text-danger">
                                <?php echo (isset($errors['mat_khau3'])) ? $errors['mat_khau3'] : '' ?>
                            </span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Đổi mật khẩu" name="doimk">
                        <input type="reset" value="Nhập lại" class="btn btn-light">
                    </form>
                </div>
            </div>
        </div>
        <?php include "layout/boxRight.php" ?>
    </div>
</div>