<?php

use App\Cart;
if($_GET['cart_id']){
$cart=new Cart();
$cart->updateCartItem($_POST['cart_id'],$_POST['QTY']);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
}else{

    header("Location: " . $_SERVER['HTTP_REFERER']);
}