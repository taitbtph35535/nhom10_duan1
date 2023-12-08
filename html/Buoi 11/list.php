<?php

require_once 'connect.php';

// truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm
if(isset($_GET['btnSearch']) && !empty($_GET['txtsearch'])){
    $sql = "SELECT cr.courses_id,cr.courses_name,cr.image_url,cr.price, ct.category_name FROM courses AS cr INNER JOIN course_categories AS ct WHERE ct.category_id =cr.courses_id AND cr.courses_name LIKE '%".$_GET['txtsearch']."%';";
}else{
    $sql = "SELECT cr.courses_id,cr.courses_name,cr.image_url,cr.price, ct.category_name FROM courses AS cr INNER JOIN course_categories AS ct WHERE ct.category_id =cr.courses_id;";
}

//$stmt = $conn->query($sql);
//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// hoặc

$result = $conn->query($sql)->fetchAll(); // Hứng toàn bộ dữ liệu từ database nhả xuống
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>List</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="#">Danh Mục</a></li>
            <li><a href="#">Khóa học</a></li>
        </ul>
        <div>Hello Admin</div>
    </div>

    <div class="container">
        <a href="#"><buttom class="add-button" style="margin-left:30px;">Thêm</buttom></a>
        <form action="" method="get">
            <input type="text" class="search-input" name="txtsearch" placeholder="Tìm kiếm">
            <buttom class="search-button" name="btnSearch"></buttom>
        </form>
    </div>
    <div class="table-container">
        <table>
            <tr>
                <th>Tên khóa học</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
            </tr>
            <?php
            foreach ($result as $value){
            ?>
            <tr>
                <td><?php echo $value['category_name'] ?></td>
                <td><?php echo $value['image_url']?$value['image_url']:'' ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['category_name'] ?></td>
                <td>
                    <a href="#" class="edit-btn">Sửa</a>
                    <a href="#" class="delete-btn">Xóa</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
