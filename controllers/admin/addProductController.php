<?php

use App\Product;
use App\Validator;

$product = new Product();
$validate = new Validator();
$product = new Product();
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $category = isset($_POST['category']) ? $_POST['category'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $stock = isset($_POST['stock']) ? $_POST['stock'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";
    $file = isset($_FILES['image']) ? $_FILES['image'] : "";

    //validate required fields

    $validate->validateRequired('product name', $name);
    $validate->validateRequired('category', $category);

    $validate->validateRequired('description', $description);

    $validate->validateRequired('stock', $stock);

    $validate->validateRequired('price', $price);
    // validate on number fields
    $validate->validateNumber('stock', $stock);
    $validate->validateNumber('price', $price);
    $validate->validateNumber('category', $category);

    //validate on string fields
    $validate->validateString('product name', $name);
    $validate->validateString('description', $description);

    // validate uploaded file 
    if(!isset($_POST['id'])){
    $validate->validateFile('image', $file);
    }
    $errors = $validate->getErrors();
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }if (!isset($_POST['id'])) {
        $image = $product->uploadFile($file, "../public/assets/uploads/");
        $product->addProduct($name, $description, $price, $stock, $category, $image);
        $_SESSION['success'] = "Product added successfully";
    } else {
        $productId = $_POST['id'];
        if (!empty($_FILES['image']['name'])) {
            $image = $product->uploadFile($file, "../public/assets/uploads/");
        } else {
            $oldProduct = $product->getProductById($productId);
            $image = $oldProduct['image'];
        }
    
        $product->updateProduct($productId, $name, $description, $price, $stock, $category, $image);
        $_SESSION['success'] = "Product updated successfully";
    }
    
    header("Location: ../admin/index.php");
    exit;
    
}
