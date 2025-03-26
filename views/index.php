<?php
use App\Blogs;
use App\Product;
use App\Slider;

$sli=new Slider();
$slids=$sli->getAllSlider();
?>


    <!--slider area start-->
    <section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
        <div class="slider_area owl-carousel">
            <?php if (!empty($slids)):?>
            <?php foreach($slids as $slid):
                // var_dump($slid);?>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1><?= $slid['Title']?></h1>
                                <h2><?= $slid['Another_Title']?></h2>
                                <p>Special offer <span> <?= $slid['offer']?>%</span> this week</p>
                                <a class="button" href="../public/index.php?page=product_details&id=<?= $slid['product_id']?>">Buy now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="<?= $slid['product_image']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php endforeach;?>
            <?php endif; ?>
           
           
        </div>
    </section>
    <!--slider area end-->

    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Tranding Products</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            <?php
                            $product=new Product(); 
                            $products=$product->getLastThreeProducts();
                            foreach($products as $product):
                           ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding">
                        <a href="../public/index.php?page=product_details&id=<?= $product['id']?>">
                            <div class="tranding-pro-img">
                                <img src="<?= $product['image']?>" alt="">
                            </div>
                            <div class="tranding-pro-title">
                                <h3><?= $product['name']?></h3>
                                <h4>Drone</h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">$<?= $product['price']?></span>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                
                
            </div>
        </div>
    </section><!--Tranding product-->

   
    <?php
    $product_id=1;
    $product=new Product();
    $product=$product->getProductById($product_id);
    if(!empty($product)):
    ?>    
    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?= $product['image']?>" data-zoom-image="<?= $product['image']?>" alt="big-1">
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       
                           
                            <h1><?= $product['name']?></h1>
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
                                <span class="current_price">$<?= $product['price']?> </span>   
                            </div>
                            <div class="product_desc">
                                
                                <p><?= $product['description']?> </p>
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
                                <form action="../public/index.php?page=AddToCarController" method="post" >
                                    <label>quantity</label>
                                        <input min="1" max="100" value="1" name="qty" type="number">
                                        <input type="hidden" name="product_id" value="<?= $product['id']?>">
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
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                            </ul>      
                        </div>

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <?php endif; ?>
    <!--product details end-->

    
    <!--area-->
    <section class="pt-60 pb-60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Watch it now</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/136938394?color=FA5252&amp;title=0&amp;byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="../../../player.vimeo.com/api/player.js"></script>
                </div>
            </div>
        </div>
    </section><!--area-->

    
    <!--Other product-->
    <section class="pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Other collections</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            <?php
                            $product=new Product(); 
                            $products=$product->getLastThreeProducts();
                            foreach($products as $product):
                           ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding mb-30">
                        <a href="product-details.html">
                            <div class="tranding-pro-img">
                                <img src="<?= $product['image']?>" alt="">
                            </div>
                            <div class="tranding-pro-title">
                                <h3><?= $product['name']?></h3>
                               
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price"><?= $product['name']?></span>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
                
                
            </div>
        </div>
    </section><!--Other product-->

    <!--Testimonials-->
    <section class="pb-60 pt-60 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="testimonial_are">
                        <div class="testimonial_active owl-carousel">       
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-3.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45</p>
                                        <h3><a href="#">Kathy Young</a><span> - CEO of SunPark</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article> 
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-1.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even</p>
                                        <h3><a href="#">John Sullivan</a><span> - Customer</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article> 
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-2.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
                                        <h3><a href="#">Jenifer Brown</a><span> - Manager of AZ</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article>      
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Testimonials-->

    <!--Blog-->
    <section class="pt-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row blog_wrapper">
                          <?php
                            $blog=new Blogs(); 
                            $blogs=$blog->GetLastThreeBlogs();
                            foreach($blogs as $blog):
                           ?>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>"><img src="<?= $blog["img"]?>" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>l"><?= $blog['title']?></a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#"><?= $blog['created_at'] ?></a></span>
                                </div>
                                <div class="blog_desc">
                                    <p><?=$blog['description']?></p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="../public/index.php?page=blog-details&id=<?=$blog['id']?>">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <?php endforeach; ?>
                
                
            </div>
        </div>
    </section><!--/Blog-->

    <!--shipping area start-->
    <section class="shipping_area">
        <div class="container">
            <div class=" row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </section>
    <!--shipping area end-->
    <?php 
    // every things included already in index page with all routes, we dont need to include footer here
	
