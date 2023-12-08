<?php
//session_start();
//// thiết lập biêến phiên
//$_SESSION['username'] = 'Kientc';
//
//// truy xuất biến phiên
//echo $_SESSION['username'];


//// Thiết lập cookie
//setcookie('username','kientc',time() +3600); //muốn chết đổi dấu '+' thành dấu '-'
//
////truy suất
//echo $_COOKIE['username'];

// Tạo form đăng nhập
// nếu như trùng user, pass thì log vào và hiển thị
// Xin chào, username
// ngoài ra thì có thêm đăng xuất
session_start();
// tạo mảng
$users = [
    [
        'username'=> 'datnh',
        'password'=> '12345'
    ],
    [
        'username'=> 'minhlc',
        'password'=> '123456'
    ],
    [
        'username'=> 'kientc',
        'password'=> '1234567'
    ],
];

// xử lý giữ liệu
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Kiểm tra thông tin đăng nhập
        foreach ($users as $user){
            if ($user['username'] == $username && $user['password'] == $password){
                $_SESSION['username']= $username;
                break;
            }
        }
    }elseif (isset($_POST['logout'])){
        session_unset();
        session_destroy();
    }
    ?>


    <!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
</head>
<body>
    <?php if(isset($_SESSION['username'])) { ?>
    <h1>Đăng nhập thành công</h1>
    <p>Xin chào, <?php echo $_SESSION['username']; ?></p>
    <form action="" method="post">
        <input type="submit" name = "logout" value="Đăng xuất">
    </form>
    <?php } else{ ?>
    <h1>Đăng nhập</h1>
    <form action="" method="post">
        <label for="username">Tên tài khoản</label>
        <input type="text" name="username" required>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" required>
        <input type="submit" name="login" value="Đăng nhập">
    </form>
    <?php } ?>
</body>
</html>
