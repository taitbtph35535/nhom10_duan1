<?php
$giangvien = [
    [
        'hoten' => 'Trương Công Kiên',
        'diachi' => 'Hà Nội',
        'namsinh' => '1997'
    ],

    [
        'hoten' => 'Trương Công Kiên',
        'diachi' => 'Hà Nội',
        'namsinh' => '1997'
    ],
    [
    'hoten' => 'Trương Công Kiên',
        'diachi' => 'Hà Nội',
        'namsinh' => '1997'
    ]
];

//// Hàm đếm các phần tử của mảng
//echo count($giangvien);

//// Hàm chuyển mảng về mảng tuần tự
//$value = array_values($giangvien);
//print_r($value);

//$array = array('a'=>1, 'b'=>2, 'c'=>3);
//$value = array_values($array);
//print_r($value);

// trả mảng tuần tự với phần tử là key của mảng ban đầu
//$value = array_keys($giangvien);
//print_r($value);

// hàm trả về phần tử cuối cùng của mảng
//$value = array_pop($giangvien);
//print_r($value);

//// Hàm thêm 1 hoawjc nhiều phần tử vào mảng
//$giangvien = array('Kien','truong');
//$value = array_push($giangvien, 'hoa', 'linh');
//print_r($giangvien);
//echo $value;

// Xóa phần tử đầu tiên của mảng và in ra phần tử bị xóa
//$gv = array('kien','truong');
//$value = array_shift($gv);
//print_r($gv); // hiển thị mảng
//echo $value; //hiển thị phẩn tuwr bị xóa


//// Thêm 1 hoặc nhiều phần tử vào đầu mảng và in ra số phần tử có trang mảng
//$gv = array('kien','truong');
//$value = array_unshift($gv,'Tuan','Linh');
//print_r($gv);
//echo $value;


//// Hàm sắp xếp thứ tự tăng dần
//$gv = array('Kien','truong','anh');
//sort($gv);
//print_r($gv);


//// Nối hai mảng
//$array1 = ['a'=>1, 'b'=>2];
//$array2 = ['a'=>3, 'b'=>4];
//$array3 = ['a'=>5, 'b'=>6];
//$value = array_merge($array1,$array2,$array3);
//print_r($value);


////tìm kiếm
//$gv = array('Kien','truong','anh');
//$value = array_search('anh',$gv);
//echo $value;


//// Tìm kiếm trả về key
//$array1=['a'=>1,'b'=>2,'c'=>3];
//$key = array_search('2',$array1, true);
//echo $key;


//// Hàm loại bỏ phẩn tử đã tồn tai và trả về mảng mới
//$gv = array('kien','truong','anh','hoa','trung','linh','anh','hoa');
//$value = array_unique($gv);
//print_r($value);


// hàm kiểm tra khóa key
if(array_key_exists("GV01",$giangvien)){
    echo 'Đúng';
}else{
    echo 'Sai';
}

//hàm kiểm tra giá trị value của mảng
$gv = array('kien','truong','anh','hoa');
if (in_array('trung',$gv)){
    echo 'Đúng';
}else{
    echo 'Sai';
}

// Hàm kiểm tra biến có phải mảng hay không
$gv = array('kien','truong','anh','hoa');
if (is_array($gv)){
    echo 'Đúng';
}else{
    echo 'Sai';
}