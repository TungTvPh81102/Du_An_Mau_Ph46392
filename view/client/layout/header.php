<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao Diện Khách Hàng</title>
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/style2.css">
</head>

<body>
    <div class="container">
        <header class="header d-flex bg-dark-subtle mb-3">
            <img style="width: 70px; object-fit: cover;" src="../../public/assets/img/logo.png" alt="" class="mx-3">
            <h1>Siêu thị trực tuyến</h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=san-pham">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=view-cart">Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=gioi-thieu">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=bai-viet">Bài viết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=lien-he">Liên hệ</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>