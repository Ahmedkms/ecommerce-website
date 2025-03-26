<?php
use App\Validator;
use App\User;
use App\Cart;
use App\Order;
use App\OrderItems;
use App\Shiping;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //  var_dump(empty($_POST['email']));
    if (!empty($_POST['email'])) {
        $validat = new Validator();
        $validat->validateEmail('email', $_POST['email']);
        $validat->validateRequired("email", $_POST['email']);
        $validat->validateRequired("password", $_POST['password']);
        $validat->validateRequired('name', $_POST['name']);
        $validat->validateString('name', $_POST['name']);
        $error = $validat->getErrors();
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("location:" . $_SERVER['HTTP_REFERER']);
            exit;

        } else {
            $newUser = new User();
            $newUser->add_User($_POST['name'], $_POST['email'], $_POST['password']);

        }
    }
    $validat = new Validator();
    $validat->validateRequired("country", $_POST['country']);
    $validat->validateRequired("address", $_POST['address']);
    $validat->validateRequired("city", $_POST['city']);
    $validat->validateRequired("phone", $_POST['phone']);

    $errors = $validat->getErrors();
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $cart = new Cart();
        $cartItems = $cart->getCartItems($_SESSION['id']);
        $order = new Order();
        $order->createOrder($_SESSION['id'], $cart->TotalPrice($_SESSION['id']));
        $order_id = $order->getLastOrderByUser($_SESSION['id']);
        $order_id = $order_id['id'];
        foreach ($cartItems as $item) {
            $orit = new OrderItems();
            $orit->addOrderItem($order_id, $item['product_id'], $item['QTY'], $item['product_price']);
        }
        $shiping = new Shiping();
        $shiping->CreateShiping($_SESSION['id'], $order_id , $_POST['address'], $_POST['city'], $_POST['country'], $_POST['phone'], $_POST['note']);
        $cart->clearCart($_SESSION['id']);
            
        header("location: ../public/index.php");
        exit;
    }

    // var_dump($_POST);



}
