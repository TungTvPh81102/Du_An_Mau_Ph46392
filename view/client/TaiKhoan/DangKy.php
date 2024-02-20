<div class="row mb-3">
    <div class="col-9">
        <div class="row mb-3">
            <div class="box-title">Đăng ký tài khoản</div>
            <?php if (isset($thongBao) && ($thongBao != "")) {
                echo $thongBao;
            }
            ?>
            <form class="mt-3" action="index.php?act=dang-ky" method="post" enctype="multipart/form-data" onsubmit="return validateClient(event)">
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Họ tên</label>
                    <input id="ho_ten" type="text" name="ho_ten" class="form-control mb-3" value="<?= (isset($hoTen)) ? $hoTen : ""  ?>">
                    <span id="error-hoTen" class="text-danger">
                        <?php echo (isset($errors['ho_ten'])) ? $errors['ho_ten'] : "" ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Địa chỉ</label>
                    <input id="dia_chi" type="text" name="dia_chi" class="form-control mb-3" value="<?= (isset($diaChi)) ? $diaChi : ""  ?>">
                    <span id="error-diaChi" class="text-danger">
                        <?php echo (isset($errors['dia_chi'])) ? $errors['dia_chi'] : "" ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Số điện thoại</label>
                    <input id="so_dt" type="text" name="so_dt" class="form-control mb-3" value="<?= (isset($soDT)) ? $soDT : ""  ?>">
                    <span id="error-soDt" class="text-danger">
                        <?php echo (isset($errors['so_dt'])) ? $errors['so_dt'] : "" ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Hình ảnh (nếu muốn)</label>
                    <input id="hinh" type="file" class="form-control" name="hinh">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= (isset($email)) ? $email : ""  ?>">
                    <span id="error-email" class="text-danger">
                        <?php echo (isset($errors['email'])) ? $errors['email'] : "" ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input id="mat_khau" type="password" name="mat_khau" class="form-control mb-3" id="exampleInputPassword1">
                    <span id="error-matKhau" class="text-danger">
                        <?php echo (isset($errors['mat_khau'])) ? $errors['mat_khau'] : "" ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label>
                    <input id="mat_khau2" type="password" name="mat_khau2" class="form-control mb-3" id="exampleInputPassword1">
                    <span id="error-matKhau2" class="text-danger">
                        <?php echo (isset($errors['mat_khau2'])) ? $errors['mat_khau2'] : "" ?>
                    </span>
                </div>
                <input type="submit" class="btn btn-primary" value="Đăng ký" name="dangky">
                <input type="reset" value="Nhập lại" class="btn btn-light">
            </form>
        </div>
    </div>
    <?php include "layout/boxRight.php" ?>
</div>