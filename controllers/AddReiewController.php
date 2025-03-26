<?php
use App\Reviews;
use App\user;
use App\Validator;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $validat = new Validator();
    $validat->validateEmail('email', $_POST['email']);
    $validat->validateRequired("email", $_POST['email']);
    $validat->validateRequired("review", $_POST['review']);
    $validat->validateRequired('name', $_POST['name']);
    $validat->validateRequired('product_id', $_POST['product_id']);


    // var_dump($_POST);

    if (empty($validat->getErrors())){
        var_dump($_POST['product_id']);
        $r=new Reviews();
        var_dump($r->CreateReview($_POST['product_id'],$_POST['name'],$_POST['review']));
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    }else{
        $_SESSION['errors'] = $validat->getErrors();
        var_dump($_SESSION['errors']);
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    }

   




}

