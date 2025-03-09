<?php
use App\Cart;
if($_GET['cart_id']){
$cart=new Cart();
$cart->deleteCartItem($_GET['cart_id']);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;


}else{

    header("Location: " . $_SERVER['HTTP_REFERER']);
}