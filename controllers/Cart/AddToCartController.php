<?php

use App\Cart;
use App\Product;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $product_id=$_POST['product_id'];
    $user_id=$_SESSION['id'];
    $QTy=1;


    $cart=new Cart();
    $cart->addToCart($user_id,$product_id,$QTy);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;








}