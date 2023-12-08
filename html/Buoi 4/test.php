<?php
// mảng trong php
// mảng tuần tự và mảng liên hợp

// Khai báo mảng
//$array1= array(); // Khai báo mảng rỗng
//$array2= array(12,35,22); // Khai báo mảng và khởi tạo giá trị
//$array3= [1,2,3,4,5]; // Khai báo mảng và khởi tạo giá trị

// In ra các mảng để kiểm tra kết quả
// print_r($array2);

// in từng phần tử
// trong [] là bị trí của phần tử của mảng
// echo $array2[1];

// thay đổi giá trị của phần tử
// thay số 35 trong mảng array2 thành 10
//echo $array2[1] = 10 . "<br>";

//print_r($array2);

// gán giá trị cho phần tử mới
//echo $array2[4] = 100 . "<br>";
//
//print_r($array2);

//duyệt mảng tuần tự 1 chiều bẳng for
//$myArray = array(1,2,3,4,5); // Khai báo mảng và khởi tạo giá trị
//$length = count($myArray); // đếm số  phần tử có trong mảng
//for($i = 0); $i < $length; $i++) {
//    echo $myArray[$i] . "<br>";
//}

//Khai báo mảng bất kì gồm 5 phần tử
// Xác định phần tử số chẵn, số lẻ(giá trị)
// Tính tổng các phần tử của mảng, tìm tổng các số chẵn, số lẻ
//$myArray = array(7,8,9,10,11);
//$tongchan = 0;
//$tongle = 0;
//$length = count($myArray);
//echo "các phần tử số chẵn trong mảng là: ";
//for ($i =0; $i < $length; $i++){
//    if ($myArray[$i] % 2 ==0){
//        echo $myArray[$i]."là số chẵn"."<br>";
//    }else{
//        echo $myArray[$i]."là số lẻ"."<br>";
//    }
//    $tong+=$myArray[$i];
//    // $tong = $tong + $myArray[$i];
//}
//echo "Tổng của mảng là: ".$tong."<br>"; //in ra kết quả tổng mảng
//echo "Tổng các số chẵn của mảng là: ".$tongchan."<br>"; //in ra kết quả tổng chẵn
//echo "Tổng các số lẻ của mảng là: ".$tongle."<br>"; //in ra kết quả tổng lẻ

// duyệt mảng tuần tự 1 chiều bằng foreach


//Khai báo mản tuần tự nhiều chiều
// cách 1
//$multiArray = [
//    [1,2,3],
//    [4,5,6],
//    [7,8,9]
//];
//echo $multiArray [1][2];
//// cách 2
$multiArray = array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);
//echo $multiArray [1][2];

// duyệt mảng tuần tự nhiều chiều
// duyệt mảng tuần tự nhiều chiều bằng for
//
$row = count($multiArray);
$cols = count($multiArray);

//for($i=0; $i<$row; $i++){
//    for ($j = 0; $j < $cols; $j++){
//        echo $multiArray [$i] [$j];
//    }
//    echo "<br>";
//}


// duyệt bằng foreach
// in ra giá trị
//foreach ($multiArray as $row){
//    foreach ($row as $value){
//        echo $value;
//    }
//    echo "<br>";
//}

// in cả chỉ số và giá trị
foreach ($multiArray as $rowIndex => $row){
    foreach ($row as $columIndex => $value){
        echo "[$rowIndex] [$columIndex] => $value".", ";
    }
    echo "<br>";
}
