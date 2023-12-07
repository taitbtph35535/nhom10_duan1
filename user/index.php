
<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/account.php";
include "../model/product.php";
include "../model/cart.php";
include "../model/pay.php";
include "./header.php";
$listSp=sanpham_get_all();
$Sp_cart=load_sanpham_cart();
if (isset($_SESSION['iduser'])) {
    $idcount= $_SESSION['iduser'];
    $count = countCart($idcount);
}


if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = 'Home';
}

switch($act){
    case "Home":
        include "./content.php";
        break;

        case "temp1":
            include "./temp_1.php";
            break;

            
            case "Cart":
                $user = $_SESSION['iduser'];
                // echo $user;
                $Sp_cart=load_sanpham_cart($user);
                include "./cart.php";
                break;


    case "Delete_cart":
        // $user = $_SESSION['iduser'];
        $id = $_GET['id'];
        delete_bill_from_client($id);
        include "./history_purchase.php";
        break;

    case "find":
        // echo $find_value;
        // echo $catalogy;
        if(isset($_POST['find_value'])&&$_POST['catalogy_name'] != 0){
            $catalogy = $_POST['catalogy_name'];
            $find_value = $_POST['find_value'];
            // echo $catalogy;
            $list_book_find_folow_catalogy_and_keyword = sanpham_get_folow_keyword_and_catalogy($catalogy,$find_value);
        }
        elseif(isset($_POST['find_value'])){
        $find_value = $_POST['find_value'];
        $list_book_find_folow_catalogy_and_keyword = sanpham_get_folow_keyword($find_value);
        }
        include "./find.php";
        break;
    case "Product":
        // $number = "1500";
        // $beta = convertNumber($number);
        // echo $beta;
        $id =  $_GET['id'];
        $select_one_book_comments = select_one_book_comments($id);
        $oneSp = loadOne_sanpham($id);
        include "./product.php";
        break;

        case "Pay":
            $user = $_SESSION['iduser'];    
            $Sp_cart=load_sanpham_cart($user);
            $user = $_SESSION['iduser'];
            $onePersonCart = load_sanpham_cart($user);
            if (isset($_SESSION['iduser'])) {
                $userInfo1 = getuserinfo1($_SESSION['iduser']);
            }
            include "./pay.php";
            break;

    case "Login_register":
        include "./login_register.php";
        break;

    case "logout":
        if(isset($_SESSION['iduser'])&& $_SESSION['iduser']){
            unset($_SESSION['iduser']);
        }
        include "./login_register.php";
        break;

    case "login":
        if(isset($_POST['dangnhap'])){
            if($_POST['user']!=""&& $_POST['pass']!=""){
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                // $user = htmlspecialchars($_POST['user']);
                // $pass = htmlspecialchars($_POST['pass']);

                $checkuser=getuserinfo($user,$pass);
                if(is_array($checkuser)){
                    $role=$checkuser['role'];
                    $id=$checkuser['id'];
                    $checkadmin=getadmininfo1($id,$role);
                    if($role==3||$role==2){
                        $_SESSION['role']=$role;
                        $_SESSION['user']=$checkadmin['username'];
                        $_SESSION['iduser']=$checkadmin['id'];                                                 
                        // header('location: ../admin/index.php');
                        break;
                    }
                    elseif($role==0){
                        $thongbao="Bạn đã bị khóa tài khoản, vui lòng liên hệ admin để được hỗ trợ!!";
                        include "./login_register.php";
                        break;
                    }
                    else{
                        $_SESSION['role']=$role;
                        $_SESSION['user']=$checkuser['username'];
                        $_SESSION['iduser']=$checkuser['id'];
                        header('location: index.php');
                        break;
                    }
                }
            
            }
            if($_POST['user']==""&& $_POST['pass']==""){
                $thongbao="Vui lòng nhập thông tin!!";
                include "./login_register.php";
            }
            else{
                $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra lại";
                include "./login_register.php";
            }
            }else{
                include "./login_register.php";
            }
            break;



    case "cartPlus":
        if (isset($_GET['plusValueId'])) {
            $id = $_GET['plusValueId'];
            updateCart_plus($id);
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
            header('Location: /');
            }
        break;

    case "cartUnplus":
        if (isset($_GET['unPlusValueId'])) {
            $id = $_GET['unPlusValueId'];
            updateCart_unplus($id);
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
            header('Location: /');
            }
        break;

    case "cartDelete":
        if (isset($_GET['ValueId'])) {
            $id = $_GET['ValueId'];
            deleteCart_unplus($id);
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
            header('Location: /');
            }
        break;

    case "AddProductToCart":
        $check = 0;
        if (isset($_GET['iduser']) && isset($_GET['idbook'])) {
            $arrayToCheck = checkForAddToCart();
            // var_dump($arrayToCheck);
            foreach($arrayToCheck as $item){
                extract($item);
                // echo $id;
                // echo $book_id;
                // echo $user_id;
                    // echo $book_id;
                    // echo $_GET['idbook'];
                    // echo $user_id;
                    // echo$_GET['iduser'];
                if ($book_id == $_GET['idbook'] &&$user_id == $_GET['iduser']) {
                    $check = 1;
                    updateCart_plus($id);
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        } else {
                        header('Location: /');
                        }
                    // include "./cart.php";
                    break;
                }
                // else{
                //     echo '2';
                    // insertProductToCart($_GET['idbook'],$_GET['iduser']);
                    // if (isset($_SERVER['HTTP_REFERER'])) {
                    //     header('Location: ' . $_SERVER['HTTP_REFERER']);
                    //     } else {
                    //     header('Location: /');
                    //     }
                    // // include "./cart.php";
                    // break;
                // }
                
            }
            if ($check == 0) {
                    insertProductToCart($_GET['idbook'],$_GET['iduser']);
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        } else {
                        header('Location: /');
                        }
                    // include "./cart.php";
                    break;
            }
        }

        break;

    default:
        include "./content.php";
        break;
    }
    if ($act='Product') {
        include "./footer-pr.php";
        
    }
    if ($act='Login_register') {
        
    }
    else{
        include "./footer.php";
    }

?>
