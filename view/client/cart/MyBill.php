<div class="container">
    <div class="row mb-3">
        <div class="col-9">
            <div class="box-title">Đơn hàng của tôi</div>
            <?php if (!empty($loadMyBill)) { ?>
            <div class="box-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Số lượng mặt hàng</th>
                            <th scope="col">Tổng giá trị đơn hàng</th>
                            <th scope="col">Tình trạng đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (is_array($loadMyBill)) {
                                foreach ($loadMyBill as $myBill) :
                                    // Kiểm tra xem đã tồn tại $displayedOrders chưa
                                    if (!isset($displayedOrders)) {
                                        $displayedOrders = array(); // Mảng để lưu các mã đơn hàng đã xuất hiện
                                    }
                                    // Kiểm tra xem đơn hàng có mã đã xuất hiện chưa
                                    // Nếu đơn hàng chưa xuất hiện thì thực thi điều kiện và đánh đấu mã đơn hàng vào mảng displayedOrders
                                    if (!in_array($myBill['id_bill'], $displayedOrders)) {
                                        // Đánh dấu đơn hàng này đã hiển thị vào cuối mảng displayedOrders
                                        $displayedOrders[] = $myBill['id_bill'];
                                        $status = getTtdh($myBill['trang_thai']);
                                        $count = countCheck($myBill['id_bill']);
                            ?>
                        <!-- Hiển thị thông tin  -->
                        <tr>
                            <td><?= $myBill['id_bill'] ?></td>
                            <td><?= $myBill['ngay_dat'] ?></td>
                            <td><?= $count ?></td>
                            <td><?= number_format($myBill['total'], 0) ?></td>
                            <td><?= $status ?></td>
                        </tr>
                        <?php
                                    }
                                endforeach;
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
            <div class="alert alert-danger mt-3">Bạn không có đơn hàng nào cả </div>
            <?php } ?>
        </div>
        <?php include "layout/boxRight.php" ?>
    </div>
</div>