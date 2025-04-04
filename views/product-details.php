<?php
use App\Product;
use App\Reviews;
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

} else {
    $product_id = 1;
}
$product = new Product();
$product = $product->getProductById($product_id);
$product_id=$product['id'];
// var_dump($product_id);
$rev=new Reviews();
$reviews=$rev->getreviestsByproductId($product_id);






?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="../public/index.php?page=home">home</a></li>
                        <li>Product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="<?= $product['image'] ?>" data-zoom-image="<?= $product['image'] ?>"
                                alt="big-1">
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">


                    <h1><?= $product['name'] ?></h1>
                    <div class=" product_ratting">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li class="review"><a href="#"> (250 reviews) </a></li>
                        </ul>

                    </div>
                    <div class="price_box">
                        <span class="current_price">$<?= $product['price'] ?> </span>
                    </div>
                    <div class="product_desc">

                        <p><?= $product['description'] ?> </p>
                    </div>

                    <div class="product_variant color">
                        <h3>Available Options</h3>
                        <label>color</label>
                        <ul>
                            <li class="color1"><a href="#"></a></li>
                            <li class="color2"><a href="#"></a></li>
                            <li class="color3"><a href="#"></a></li>
                            <li class="color4"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="product_variant quantity">
                        <form action="../public/index.php?page=AddToCarController" method="post">
                            <label>quantity</label>
                            <input min="1" max="100" value="1" name="qty" type="number">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button class="button" type="submit">add to cart</button>
                        </form>
                    </div>
                    <div class=" product_d_action">
                        <ul>
                            <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                            <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                        </ul>
                    </div>
                    <div class="product_meta">
                        <span>Category: <a href="#">Clothing</a></span>
                    </div>


                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a>
                            </li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a>
                            </li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                    share</a></li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Description</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews (<?= count($reviews) ?>)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p> <?= $product['description'] ?> </p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2><?= count($reviews) ?> review <?= $product['name'] ?></h2>
                               <?php foreach($reviews as $review):
                                ?>
                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                    </div>

                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <p><strong><?= $review['user_name'] ?> </strong>- <?= $review['created_at'] ?></p>
                                            <span><?= $review['content'] ?></span>
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach; ?> 
                                <div class="comment_title">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                </div>
                                <div class="product_ratting mb-10">
                                    <h3>Your rating</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_review_form">
                                    <form action="../public/index.php?page=addreview" method="post">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="review" id="review_comment"></textarea>
                                            </div>
                                            <?php
                                    require_once '../healper/healper.php';
                                    errorMessage();

                                    ?> 
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" name="name" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <?php if (!empty($_SESSION['email'])): ?>
                                                    <input id="email" value="<?= htmlspecialchars($_SESSION['email']) ?>"
                                                        disabled type="text">
                                                    <input type="hidden" name="email"
                                                        value="<?= htmlspecialchars($_SESSION['email']) ?>">
                                                <?php else: ?>
                                                    <input id="email" name="email" type="text" required>
                                                <?php endif; ?>

                                            </div>
                                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                        </div>
                                        
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->