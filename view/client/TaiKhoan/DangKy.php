<div class="row mb-3">
    <div class="col-9">
        <div class="row mb-3">
            <div class="box-title">Đăng ký tài khoản</div>
            <form class="mt-3" action="index.php?act=dang-ky" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Địa chỉ</label>
                    <input type="text" name="dia_chi" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Số điện thoại</label>
                    <input type="text" name="so_dt" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Hình ảnh (nếu muốn)</label>
                    <input type="file" class="form-control" name="hinh">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="password" name="mat_khau" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="mat_khau2" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <input type="submit" class="btn btn-primary" value="Đăng ký" name="dangky">
                <input type="reset" value="Nhập lại" class="btn btn-light">
            </form>
        </div>
    </div>
    <?php include "layout/boxRight.php" ?>
</div>