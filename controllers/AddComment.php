<?php
use App\Comment;
use App\user;
use App\Validator;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $validat = new Validator();
    $validat->validateEmail('email', $_POST['email']);
    $validat->validateRequired("email", $_POST['email']);
    $validat->validateRequired("comment", $_POST['comment']);
    $validat->validateRequired('name', $_POST['name']);
    $validat->validateRequired('blog_id', $_POST['blog_id']);
    $user=new user();
    $u=$user->getuser($_POST['email']);

// var_dump($u);
    if (empty($validat->getErrors())){
        // var_dump(123);
        $c=new Comment();
       var_dump( $c->CreateComment($_POST['blog_id'],$u['id'],$_POST['comment']));
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    }else{
        $_SESSION['errors'] = $errors;
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    }

















}



