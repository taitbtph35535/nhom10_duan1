<?php

function tinhChuVi($chieuDai, $chieuRong)
{
    return 2 * ($chieuDai + $chieuRong);
}

function tinhDienTich($chieuDai, $chieuRong)
{
    return $chieuDai * $chieuRong;
}

if (isset($_POST['submit'])) {
    $chieuDai = floatval($_POST['chieudai']);
    $chieuRong = floatval($_POST['chieurong']);
    if($chieuRong <= 0 || $chieuDai <= 0){
        echo "Chiều dài và chiều rộng phải là số dương";
    }elseif ($chieuDai > $chieuRong) {
        $chuVi = tinhChuVi($chieuDai, $chieuRong);
        $dienTich = tinhDienTich($chieuDai, $chieuRong);
        // Hiển thị kết quả
        echo "Chiều dài là: " . $chieuDai . "<br>";
        echo "Chiều rộng là: " . $chieuRong . "<br>";
        echo "<p>Chu vi: " . $chuVi . "</p>";
        echo "<p>Diện tích: " . $dienTich . "</p>";
    } elseif($chieuDai < $chieuRong) {
        echo "Chiều dài phải lớn hơn chiều rộng thì mới là hình chữ nhật";
    }else{
        echo "Chiều dài là: " . $chieuDai . "<br>";
        echo "Chiều rộng là: " . $chieuRong . "<br>";
        echo "Đây là hình vuông";
    }
}