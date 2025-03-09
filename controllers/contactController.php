<?php
use App\Contactus;
use App\Validator;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];

    $validate=new Validator();
    $validate->validateRequired('name',$name);
    $validate->validateRequired('email',$email);
    $validate->validateEmail('email',$email);
    $validate->validateRequired('massage',$msg);

    if(empty($validate->getErrors())){
        $con=new Contactus();
        $con->addcontact($email,$name,$msg);
        

    }else{
        $_SESSION['errors'] = $validat->getErrors();
        header("location:". $_SERVER['HTTP_REFERER']);
        exit;
    }
    













}