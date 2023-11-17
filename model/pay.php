<?php

function load_sanpham_cart_of_one(){
    $sql="SELECT * FROM `cart` WHERE `user_id` = 4";
    return pdo_query($sql);
}

?>