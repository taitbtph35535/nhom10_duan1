<?php
//session_start();
//echo $_SESSION['username'];

//session_start();
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
// Thiết lập cookie
if(isset($_COOKIE['username'])){
    $logedIn = true;
    $username = $_COOKIE['username'];
}else{
    $logedIn = false;
}
// xử lý giữ liệu
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Kiểm tra thông tin đăng nhập
    foreach ($users as $user){
        if ($user['username'] == $username && $user['password'] == $password){
            // thiết lập cookie
            setcookie('username',$username, time() +3600);
            $logedIn = true;
            break;
        }
    }

}elseif (isset($_POST['logout'])){

    setcookie('username','',time() -3600);
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
<?php if(isset($logedIn)) { ?>
    <h1>Đăng nhập thành công</h1>
    <p>Xin chào, <?php echo $username; ?></p>
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