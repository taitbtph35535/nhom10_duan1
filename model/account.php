<?php

function getuserinfo($user,$pass){
    $sql="select * from account where username='".$user."' AND password='".$pass."'";
    $user=pdo_query_one($sql);
    return $user;
}

function getadmininfo1($id,$role){
    $sql="select * from account where  id='".$id."' AND role='".$role."'";
    $user=pdo_query_one($sql);
    return $user;
}

function getuserinfo1($id){
    $sql="SELECT * FROM `account` WHERE `id`= $id ";
    $userinfo1=pdo_query_one($sql);
    return $userinfo1;
}
?>