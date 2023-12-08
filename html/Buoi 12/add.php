<?php
session_start();
unset($_SESSION['course_name']);
unset($_SESSION['category_id']);
unset($_SESSION['price']);
unset($_SESSION['imageError']);

require_once 'connect.php';
$listCT = "SELECT * FROM course_categories";
$result = $conn -> query($listCT) -> fetchAll();

if(isset($_POST['btnSave'])){
    if(empty($_POST['course_name'])){
        $_SESSION['course_name'] = "Không được bỏ trống tên khóa học";
    }else{
        $course_name = $_POST['course_name'];
    }

    if(empty($_POST['course_category_id'])){
        $_SESSION['category_id'] = "Không được bỏ trống danh mục khóa học";
    }else{
        $category_id = $_POST['category_id'];
    }

    if(empty($_POST['price'])) {
        $_SESSION['price'] = "Không được bỏ trống giá";
    }else{
        if($_POST['price']<0){
            $_SESSION['price'] = "Bạn phait nhập giá lớn hơn hoặc bằng 0";
        }else{
            $price = $_POST['price'];
        }
    }

    if(empty($_FILES['image_url']['name'])){
        $_SESSION['imageError'] = "Không được bỏ trống ảnh";
    }else{
        if(!isset($_SESSION['imageError'])){
            // Thư mục sẽ được lưu ảnh vào thư mục image
            $targetDir = "image/";
            // Đường dẫn đến file được lưu
            $targetFile = $targetDir.$_FILES['image_url']['name'];

            // Tiến hành upload file ảnh
            if(move_uploaded_file($_FILES['image_url']['tmp_name'],$targetFile)){
                $image_url = $targetFile;
            }else{
                $_SESSION['imageError'] = "Không thể lưu trữ ảnh";
            }
        }
    }
    if(!isset($_SESSION['imageError']) && !isset($_SESSION['course_name']) && !isset($_SESSION['price']) && !isset($_SESSION['category_id'])) {
        $sql = "INSERT INTO courses VALUES (NULL, '$course_name', '$image_url', '$price', '$category_id')";

        $conn -> exec($sql);
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form thêm khóa học</title>
</head>
<body>
    <div class="add-form">
        <h1>Thêm khóa học</h1>
        <form action="" method = "post" enctype = "multipart/form-data">
            <div class="form-group">
                <label for="course_name">Tên khóa học</label>
                <input type="text" name="course_name" id="course_name">
                <span><?php echo isset($_SESSION['course_name'])?$_SESSION['course_name']:'' ?></span>
            </div>
            <div class="form-group">
                <label for="category">Danh mục:</label>
                <select name="category_id" id="category">
                    <option value="">Chọn danh mục</option>
                    <?php
                    foreach($result as $value){
                    ?>
                    <option value="<?php echo $value['category_id']?>"><?php echo $value['category_name']?> </option>
                    <?php } ?>    
                </select>
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" name="pricee" placeholder="Nhập giá">
                <span><?php echo isset($_SESSION['price'])?$_SESSION['price']:'' ?></span>
            </div>
            <div class="form-group">
                <label for="image">Ảnh:</label>
                <input type="file" name="image_url" accept="image/*>
                <span><?php echo isset($_SESSION['imageError'])?$_SESSION['imageError']:'' ?></span>
            </div>
        </form>

    </div>    
</body>
</html>