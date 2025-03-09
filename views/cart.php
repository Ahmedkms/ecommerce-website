<?php
use App\Cart;

$cart = new Cart();
$products = $cart->getCartItems($_SESSION['id']);
$total = 0;
// var_dump($products);
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="../public/index.php?page=home">home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>  
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product):
                                        $total = $product['QTY'] * $product['product_price']; ?>
                                        <tr>
                                            <td class="product_thumb">
                                                <a href="#"><img
                                                        src="<?= htmlspecialchars($product['product_image'], ENT_QUOTES) ?>"
                                                        alt=""></a>
                                            </td>
                                            <td class="product_name">
                                                <a
                                                    href="#"><?= htmlspecialchars($product['product_name'], ENT_QUOTES) ?></a>
                                            </td>
                                            <td class="product-price"><?= $product['product_price'] ?></td>

                                            <td class="product_quantity">
                                                <form action="../public/index.php?page=UpdateCartController" method="post">
                                                    <label>Quantity</label>
                                                    <input name="qty" min="1" max="100" value="<?= $product['QTY'] ?>"
                                                        type="number">
                                                    <input type="hidden" name="cart_id"
                                                        value="<?=$product['cart_id'] ?>">
                                                        <div class="cart_submit">
                                                    <button type="submit">Update Cart</button>
                                                    </div>  
                                                </form>
                                            </td>

                                            <td class="product_total"><?= $total ?></td>

                                            <td class="product_remove">
                                                <a
                                                    href="../public/index.php?page=RemoveFromCarController&cart_id=<?= htmlspecialchars($product['cart_id'], ENT_QUOTES) ?>">
                                                    <i class="ion-android-close"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount"><?= $total ?></p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $5.00</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">$<?= $total + 5 ?></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="../public/index.php?page=checkout">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
</div>
<!--shopping cart area end -->