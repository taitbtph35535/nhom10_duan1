<?php

function load_sanpham_cart(){
    $sql="select cart.id ,image,name,book_quantity,price from cart 
    INNER JOIN account ON cart.user_id = account.id
    INNER JOIN book on cart.book_id = book.id
    where account.id=4";
    return pdo_query($sql);
}

function countCart($idcount){
    $sql = "SELECT COUNT(*) AS count_rows FROM cart INNER JOIN account ON cart.user_id = account.id WHERE account.id= $idcount";
    return pdo_query_one($sql);
}

function updateCart_plus($id){
    $sql="UPDATE `cart` SET `book_quantity` = `book_quantity` + 1 WHERE `cart`.`id` = $id";
    pdo_execute($sql);
}

function updateCart_unplus($id){
    $sql="UPDATE `cart` SET `book_quantity` = `book_quantity` - 1 WHERE `cart`.`id` = $id";
    pdo_execute($sql);
}

function deleteCart_unplus($id){
    $sql="DELETE FROM `cart` WHERE `id`= $id";
    pdo_execute($sql);
}

function insertProductToCart($book_id,$user_id){
    $sql="INSERT INTO `cart`(`id`, `book_id`, `user_id`, `book_quantity`) VALUES ('','$book_id','$user_id','1')";
    pdo_execute($sql);
}
?>