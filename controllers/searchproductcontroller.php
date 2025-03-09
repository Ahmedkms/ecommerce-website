<?php
use App\Product;



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['word'])){
        header("location:" . $_SERVER['HTTP_REFERER']);
            exit;
    }else{
        $product = new Product();
        $products = $product->searchProductsByName($_POST['word']);
        if (empty($products)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            
            $product_id = $products['id'];
            // var_dump($product_id);
            header("Location: ../public/index.php?page=product&product_id=" . $product_id);
            
        }

    }











}