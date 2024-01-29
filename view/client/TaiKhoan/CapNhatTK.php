<div class="row mb-3">
    <div class="col-9">
        <div class="row mb-3">
            <?php if (($_SESSION['user']) && is_array($_SESSION['user']))
                extract($_SESSION['user']);
            ?>
            <div class="box-title">Cập nhật tài khoản</div>
            <form class="mt-3" action="index.php?act=cap-nhat-tk" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control" value="<?= $ho_ten ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Địa chỉ</label>
                    <input type="text" name="dia_chi" class="form-control" value="<?= $dia_chi ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Số điện thoại</label>
                    <input type="text" name="so_dt" class="form-control" value="<?= $so_dt ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Hình ảnh</label>
                    <br>
                    <img style="width: 70px;" src="../../upload/<?= $hinh ?>" alt="">
                    <input type="file" class="form-control" name="hinh">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $email ?>">
                </div>
                <input type="submit" class="btn btn-primary" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại" class="btn btn-light">
            </form>
        </div>
    </div>
    <?php include "layout/boxRight.php" ?>
</div>