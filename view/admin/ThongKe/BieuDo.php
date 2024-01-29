<div class="col-10 box-right">
    <div class="head-top">
        <div class="menu-content d-flex justify-content-between">
            <ul class="head-menu d-flex ">
                <li class="menu-item active">
                    <a href="#" class="menu-link">Trang quản trị</a>
                </li>
                <li class="menu-item">
                    <a href="../indexHome.php" class="menu-link">Trang khách hàng</a>
                </li>
            </ul>
            <div class="admin-profile">
                <div class="admin-view">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    }
                    ?>
                    <h4 class="hi">Hi, <span class="name"><?= $ho_ten ?></span></h4>
                </div>
            </div>
        </div>
        <h3 class="menu-title">Quản lý thống kê</h3>
    </div>
    <div class="head-between">
        <div class="between-container border border-primary">
            <div class="card-header">
                <div class="card-content">
                    <h5 class="card-tile">Biểu đồ thống kê dữ liệu </h5>
                    <h6 class="card-des">Danh sách thống kê dữ liệu</h6>
                </div>
            </div>
            <script src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="myChart" style=" height:500px;"></div>
            <script>
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    // Set Data
                    const data = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Số lượng sản phẩm'],
                        <?php
                        $tongdm = count($thongKe);
                        $i = 1;
                        foreach ($thongKe as $list) {
                            extract($list);
                            if ($i == $tongdm) {
                                $dauphay = "";
                            } else {
                                $dauphay = ",";
                            }
                            echo "['" . $list['ten_loai'] . "'," . $list['so_luong'] . "]" . $dauphay;
                        }
                        $i += 1;
                        ?>
                    ]);

                    // Set Options
                    const options = {
                        title: 'Biểu đồ thống kê sản phẩm'
                    };

                    // Draw
                    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);

                }
            </script>
            <div class="card-body ">

                <a href="index.php?act=quan-ly-thong-ke" class="btn btn-primary">Quay về trang thống kê</a>
            </div>
        </div>
    </div>
    <div class="head-footer">
        <ul class="head-contact">
            <li class="contact-item">
                <a href="#" class="contect-link">About</a>
            </li>
            <li class="contact-item">
                <a href="#" class="contect-link">Team</a>
            </li>
            <li class="contact-item">
                <a href="#" class="contect-link">Contact</a>
            </li>
        </ul>
        <div class="copy-right">
            <span class="year">2024 &copy;</span>
            <span class="copy">Tùng</span>
        </div>
    </div>
</div>