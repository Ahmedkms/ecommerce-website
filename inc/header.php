<?php require_once "../vendor/autoload.php";?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Drophut - Single Product eCommerce Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../public/assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../public/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="stylesheet" href="../public/assets/css/custom.css">

</head>

<body>

    <!--header area start-->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="support_info">
                            <p>Any Enquiry: <a href="tel:">+56985475235</a></p>
                        </div>
                        <div class="top_right text-right">
                            <ul>
                            
                                    <li><a href="../public/index.php?page=my-account"> My Account </a></li>
                            

                                <li><a href="../routes/web.php?page=checkout"> Checkout </a></li>
                            </ul>
                        </div>
                        <div class="search_container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="middel_right_info">
                            <div class="header_wishlist">
                                <a href="../routes/web.php?page=wishlist"><img src="../public/assets/img/user.png"
                                        alt=""></a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><img src="../public/assets/img/shopping-bag.png"
                                        alt=""></a>
                                <span class="cart_quantity">2</span>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="../public/assets/img/s-product/product.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Sit voluptatem rhoncus sem lectus</a>
                                            <p>Qty: 1 X <span> $60.00 </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="../public/assets/img/s-product/product2.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Natus erro at congue massa commodo</a>
                                            <p>Qty: 1 X <span> $60.00 </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="../routes/web.php?page=cart">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="../routes/web.php?page=checkout">Checkout</a>
                                        </div>

                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="../routes/web.php?page=product">products</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="../public/index.php?page=about">About Us</a></li>
                                        <li><a href="../public/index.php?page=contact">contact</a></li>
                                        <li><a href="../public/index.php?page=privacy-policy">privacy policy</a></li>
                                        <li><a href="../public/index.php?page=faq">Frequently Questions</a></li>
                                        <li><a href="../public/index.php?page=login">login</a></li>
                                        <li><a href="../public/index.php?page=register">register</a></li>
                                        <li><a href="../public/index.php?page=forget-password">Forget Password</a></li>
                                        <li><a href="../public/index.php?page=404">Error 404</a></li>
                                        <li><a href="../public/index.php?page=cart">cart</a></li>
                                        <li><a href="../public/index.php?page=tracking">tracking</a></li>
                                        <li><a href="../public/index.php?page=checkout">checkout</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="../public/index.php?page=blog">blog</a></li>
                                        <li><a href="../public/index.php?page=blog-details">blog details</a></li>
                                    </ul>
                                </li>
                            
                                    <li><a href="../public/index.php?page=my-account"> My Account </a></li>
                               

                                <li class="menu-item-has-children">
                                    <a href="../public/index.php?page=contact"> Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@drophunt.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <p>Email: <a href="mailto:">support@drophunt.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul><?php if (!empty($_SESSION['username'])): ?>
                                    <li><a href="../public/index.php?page=log_out"> Log out </a></li>
                                    <li><a href="../public/index.php?page=my-account"> My Account </a></li>
                                <?php endif ?>

                                    <li><a href="../public/index.php?page=checkout">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="../public/index.php?page=index-2"><img src="../public/assets/img/logo/logo.png"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                <form action="../public/index.php?page=searchProductController" method="post">
                                        <div class="search_box">
                                            <input name="word" placeholder="Search product..." type="text">
                                            <button type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <?php  
                                 use App\Cart;
                                $c=new Cart();
                                $num=$c->getNumberofbroductinCart(isset($_SESSION['id'])?$_SESSION['id']:null);
                                $products=$c->getCartItems(isset($_SESSION['id'])?$_SESSION['id']:null); ?>
                                <div class="middel_right_info">
                                    <div class="header_wishlist">
                                        <a href="#"><img src="../public/assets/img/user.png" alt=""></a>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><img src="../public/assets/img/shopping-bag.png"
                                                alt=""></a>
                                        <span class="cart_quantity"><?= !empty($num) ? $num : 0 ?></span>
                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <?php 
                                             $total=0;
                                            foreach($products as $product):
                                                 $total+=$product['QTY']*$product['product_price'];?>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="<?= $product['product_image']?>"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#"><?= $product['product_name']?>s</a>
                                                    <p>Qty: <?= $product['QTY']?>X <span> <?= $product['product_price']?> </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="../public/index.php?page=RemoveFromCarControllert&cart_id=<?=$product['cart_id']?>"><i class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                           
                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price"><?=$total?></span>
                                                </div>
                                                <div class="cart_total mt-10">  
                                                    <span>total:</span>
                                                    <span class="price"><?=$total+5?></span>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                                <div class="cart_button">
                                                    <a href="../public/index.php?page=cart">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="../public/index.php?page=checkout">Checkout</a>
                                                </div>

                                            </div>

                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <!--header bottom satrt-->
            <div class="main_menu_area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li><a href="../public/index.php?page=index-2">home</a></li>
                                        <li><a href="../public/index.php?page=product">Products</a></li>

                                        <li><a class="active" href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="../public/index.php?page=about">About Us</a></li>
                                                <li><a href="../public/index.php?page=contact">contact</a></li>
                                                <li><a href="../public/index.php?page=privacy-policy">privacy policy</a>
                                                </li>
                                                <li><a href="../public/index.php?page=faq">Frequently Questions</a></li>
                                                <li><a href="../public/index.php?page=login">login</a></li>
                                                <li><a href="../public/index.php?page=register">register</a></li>
                                                <li><a href="../public/index.php?page=forget-password">Forget Password</a>
                                                </li>
                                                <li><a href="../public/index.php?page=404">Error 404</a></li>
                                                <li><a href="../public/index.php?page=cart">cart</a></li>
                                                <li><a href="../public/index.php?page=tracking">tracking</a></li>
                                                <li><a href="../public/index.php?page=checkout">checkout</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../public/index.php?page=blog">blog<i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="../public/index.php?page=blog">blog</a></li>
                                                <!-- <li><a href="../public/index.php?page=blog-details">blog details</a></li> -->
                                            </ul>
                                        </li>
                                        <?php if(isset($_SESSION['username'])) :?>

                                        <li>
                                            <a href="../public/index.php?page=contact"> Contact Us</a></li>
                                        <?php  endif;     ?>    
                                        </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </header>
    <!--header area end-->