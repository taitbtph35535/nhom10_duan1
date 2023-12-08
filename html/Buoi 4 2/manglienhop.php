<?php
// Khai báo mảng liên hợp
// $myArray = array(); // Khai báo mảng rỗng
//
//$myArray = array(
//    "hoTen" => "Nguyễn Hưng Đạt"
//    "diaChi" => "Hà Nội"
//);
//echo $myArray["hoTen"];

// duyệt mảng 1 chiều bằng for

//$keys = array_keys($myArray);
//$length = count($keys);
//
//for($i =0; $i<$length; $i++){
//    $key = $keys[$i];
//    $value = $myArray[$key];
//
//    echo "Key: ".$key. ", Value: ".$value."<br>";
//}

//// duyệt mảng foreach
//foreach ( $myArray á $key => $value){
//    echo "Key: ".$key. ", Value: ".$value. "<br>";
//}

// Khai báo mảng liên hợp nhiều chiều
$Giangvien = array(
    "GV01" => array(
        "hoTen" => "Nguyen Van A",
        "diaChi" => "Ha Noi",
        "Gioi tinh" => "Nam"
),
    "GV02" => array(
        "hoTen" => "Nguyen Van A",
        "diaChi" => "Ha Noi",
        "Gioi tinh" => "Nam"
),
    "GV03" => array(
        "hoTen" => "Nguyen Van A",
        "diaChi" => "Ha Noi",
        "Gioi tinh" => "Nam"
)
);
//echo $Giangvien ["GV02"] ["hoTen"];

// duyệt mảng bằng for
$maGV = array_keys($Giangvien); // mảng tập hợp các khóa chỉnh của mảng cha
$length = count($maGV);

for ($i = 0; $i<$length; $i++){
    $name = $maGV[$i];
    echo "Mã giảng viên: ".$name."<br>";

    $details = $Giangvien[$name];
    $keys = array_keys($details);
    $totalkey = count($keys);
    for ($j=0; $j<$totalkey; $j++){
        $key = $keys[$j];
        $value = $details[$key];
        echo "Key :".$key.", Value: ".$value."<br>";
    }
}

// Duyệt bằng foreach
foreach ($Giangvien as $maGV => $details){
    foreach ($details as $key => $value) {
        echo "Key: ".$key. ", Value: ".$value."<br>";
    }
    echo "<br>";
}