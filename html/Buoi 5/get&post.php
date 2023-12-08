<!--// get, post l phương thức truyền nhận dữ liệu-->
<!--// get thì hiển thị dữ liệu treen URL (đường link, đưỡng dẫn trên nền web)-->
<!--// => bảo mật kém hơn bù lại tốc độ xử lý nhanh hơn-->
<!---->
<!--// post thì ngược lại của ghet vì nó chạy ngầm-->
<!--// => bảo mật cao hơn nhưng tốc độ xử lý sẽ chậm hơn-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Thông tin người dùng</h1>
    <?php
    if(isset($_GET['txtA']) && isset($_GET['txtB'])){
        $name = $_GET['txtA'];
        $age = $_GET['txtB'];

        echo "<p>Họ và tên :$name</p>";
        echo "<p>Tuổi : $age</p>";
    }else{
        echo "<p>Không có thông tin người dùng. </p>.";
    }
    ?>
</body>
</html>
