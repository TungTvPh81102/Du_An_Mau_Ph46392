<?php
session_start();
require_once "../../../model/pdo.php";
require_once "../../../model/BinhLuan.php";
$maSp = $_REQUEST['ma_sp'];

$loadAllBinhLuan = loadAllBinhLuan($maSp);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/assets/css/style2.css">
</head>

<body>

    <?php echo "Nội dung bình luận ở đây: " . $maSp ?>
    <?php
    if (isset($_POST['gui']) && ($_POST['gui'])) {
        $noiDung = $_POST['msg'];
        $maSp = $_POST['ma_sp'];
        $maKH = $_SESSION['user']['ma_kh'];
        $ngayBL = date('Y/m/d');
        insertBinhLuan($noiDung, $maSp, $maKH, $ngayBL);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }

    ?>
    <?php if (isset($_SESSION['user'])) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nội dung bình luận</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày bình luận</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loadAllBinhLuan as $binhLuan) : ?>
                    <tr>
                        <th scope="row"><?= $binhLuan['noi_dung'] ?></th>
                        <td><?= $binhLuan['ho_ten'] ?></td>
                        <td><?= $binhLuan['ngay_bl'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="ma_sp" value="<?= $maSp ?>">
            <input type="text" name="msg" id="">
            <input type="submit" value="Gửi bình luận" name="gui">
        </form>
    <?php } else { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nội dung bình luận</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày bình luận</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loadAllBinhLuan as $binhLuan) : ?>
                    <tr>
                        <th scope="row"><?= $binhLuan['ma_bl'] ?></th>
                        <td><?= $binhLuan['noi_dung'] ?></td>
                        <td><?= $binhLuan['ngay_bl'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="comment text-danger">Vui lòng đăng nhập để bình luận</div>
    <?php } ?>
</body>

</html>