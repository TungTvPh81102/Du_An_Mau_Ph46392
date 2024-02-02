<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/login.css">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/KhachHang.php";
    if (isset($_POST['login']) && ($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $vaiTro = 2;
        $checkUser = checkUser($email, $pass, $vaiTro);
        if (is_array($checkUser)) {
            $_SESSION['user'] = $checkUser;
            echo '<script>alert("Đăng nhập thành công")</script>';
            echo '<script>window.location="index.php"</script>';
        } else {
            echo '<script>alert("Đăng nhập thất bại, vui lòng kiểm tra lại thông tin")</script>';
        }
    }
    ?>
    <div class="container-fluid position-relative d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="" class="text-decoration-none">
                                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>XSHOP</h3>
                                </a>
                                <h3 class="text-light">Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label text-light" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="" class="text-decoration-none">Forgot Password</a>
                            </div>
                            <input name="login" type="submit" class="btn btn-primary py-3 w-100 mb-4" value="Sign In">
                            <p class="text-center mb-0 text-light">Don't have an Account? <a href="" class="text-decoration-none">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    <script src="../../public/assets/js/bootstrap.min.js"></script>
</body>

</html>