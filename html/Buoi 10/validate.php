<?php

if (isset($_POST['btnSub'])){
    if (isset($_POST['ten']) && !empty($_POST['ten'])){
        $validateName = '';
    }else{
        $validateName = "Yêu cầu bạn phải nhập tên";
    }
}
    // check email
    $checkemail = '/^[a-zA-Z0-9._+%-]+@[fpt]+\.[edu]+\.[a-zA-Z]{2,}$/';

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $validateEmail = '';
        if (preg_match($checkemail, $_POST['email'])){
            $validateEmail = '';
        }else{
            $validateEmail = 'Địa chỉ email không hợp lệ';
        }
    }else{
        $validateEmail = 'Vui lòng nhập email';
    }
