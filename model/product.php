<?php
function sanpham_get_all(){
    $sql="select * from book order by id desc limit 0,9";
    return pdo_query($sql);
}

function checkForAddToCart(){
    $sql="SELECT cart.id,book_id,user_id FROM book INNER JOIN cart ON book.id = cart.book_id";
    return pdo_query($sql);
}

function loadOne_sanpham(){
    $sql="select * from book where id=1";
    $sp=pdo_query_one($sql);
    return $sp;
}

?>
