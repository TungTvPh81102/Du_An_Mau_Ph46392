<div class="container">
    <div class="row mb-3">
        <div class="col-8">
            <h1>Bài viết về sản phẩm của chúng tôi <img style="width: 50px;" src="../../public/assets/img/img3.gif" alt=""></h1>
            <figure class="figure">
                <img src="../../public/assets/img/banner4.jpg" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <strong> Laptop gaming</strong> là loại máy tính xách tay chuyên dụng được thiết kế chuyên biệt để
                    phục vụ việc chơi
                    các tựa game có cấu hình nặng và đòi hỏi cao về xử lý đồ họa.

                    Những chiếc laptop gaming luôn được các nhà sản xuất áp dụng các công nghệ mới nhất, mạnh nhất cho
                    phần cứng. Chính vì thế, các dòng laptop này sẽ đáp ứng nhu cầu chơi game của những game thủ có nhu
                    cầu chơi game hàng ngày, đảm bảo chất lượng vượt trội về tốc độ xử lý, hình ảnh, âm thanh, hiệu năng
                    hoạt động,v.v. Từ đó, chúng nâng cao trải nghiệm chơi game so với các dòng máy tính thông thường để
                    làm việc, giúp chiến game mượt mà và hiệu quả nhất có thể để đánh bại các đối thủ.
                </figcaption>
            </figure>
            <h2>Ưu điểm của Laptop Gaming</h2>
            <figure class="figure">
                <img src="../../public/assets/img/img5.jpg" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    Nhằm mang đến trải nghiệm chiến game êm ru, không bị giật lag và out game giữa chừng vì quá tải nên
                    các
                    dòng laptop gaming luôn được trang bị những loại CPU mạnh mẽ và hiện đại bậc nhất, với bộ vi xử lý
                    từ 8
                    nhân trở lên, RAM lớn từ 8GB trở lên, xung nhịp cao và cache bộ nhớ đệm khủng để thỏa mãn nhu cầu
                    của
                    người dùng.

                    Ngoài ra, chúng còn được tích hợp thêm GPU (Card đồ họa rời) để xử lý đồ họa tốt đồ họa, đảm bảo
                    chất
                    lượng hiển thị. Điển hình phải kể đến là Geforce GTX của Nvidia hoặc Radeon của AMD - những dòng
                    card đồ
                    họa rời nổi tiếng thường được tích hợp trong các laptop gaming với hiệu năng mạnh mẽ, xung nhịp và
                    dung
                    lượng bộ nhớ cao, đáp ứng tốt nhu cầu xử lý đồ họa cấu hình nặng trong game.
                </figcaption>
            </figure>
            <h2>Bình luận bài viết</h2>
            <div class="card-body mb-3">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                    <input class="btn btn-primary mt-3" type="text" name="" id="" value="Gửi bình luận">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3">
                <div class="card-header">
                    Sản phẩm
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Danh mục sản phẩm</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($loadAllDanhMuc as $danhMuc) : ?>
                        <li class="list-group-item">
                            <a href="index.php?act=san-pham&ma_loai=<?= $danhMuc['ma_loai'] ?>"><?= $danhMuc['ten_loai'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="card-body">
                    <a href="index.php?act=san-pham" class="card-link">Tất cả sản phẩm</a>
                    <!-- <a href="#" class="card-link">Another link</a> -->
                </div>
            </div>
            <div class="card">
                <img src="../../public/assets/img/banner.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">
                        Ưu đãi Tết đến xuân về tưng mừng giảm giá hàng loạt sản phẩm có trên hệ thống tất cả các cửa
                        hàng của chúng tôi.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>