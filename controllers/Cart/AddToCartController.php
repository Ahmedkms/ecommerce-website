<?php

use App\Cart;
use App\Product;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $product_id=$_POST['product_id'];
    $user_id=$_SESSION['id'];
    $QTy=$_POST['qty'];

// var_dump(123);
    $cart=new Cart();
    $cart->addToCart($user_id,$product_id,$QTy);
    header("location: ../public/index.php");
    exit;








}