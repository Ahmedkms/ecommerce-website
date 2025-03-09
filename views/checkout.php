<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="../routes/web.php?page=home">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">


                </div>

            </div>
        </div>
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="../public/index.php?page=checkoutcontroller" method="post">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <?php
                            require "../healper/healper.php";
                            errorMessage()?> 

                            <div class="col-lg-6 mb-20">
                                <label>First Name <span>*</span></label>
                                <input type="text" name="name">
                            </div>

                            <div class="col-12 mb-20">
                                <label for="country">country <span>*</span></label>
                                <select class="niceselect_option" name="country" id="country">
                                    <option value="2">bangladesh</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">Afghanistan</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">Albania</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">Dominican Republic</option>

                                </select>
                            </div>

                            <div class="col-12 mb-20">
                                <label>Street address <span>*</span></label>
                                <input placeholder="House number and street name" name="address" type="text">
                            </div>
                           
                            <div class="col-12 mb-20">
                                <label>Town / City <span>*</span></label>
                                <input type="text" name="city">
                            </div>

                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" name="phone">

                            </div>
                            <?php if (!isset($_SESSION['username'])): ?>

                            <div class="col-lg-6 mb-20">
                                <label> Email Address <span>*</span></label>
                                <input type="text" name="email">

                            </div>
                            <div class="col-12 mb-20">
                                <label>password </label>
                                <input type="text" name="password" name="city">
                            </div>
                            <?php endif;?>


                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea name="note" id="order_note" rows="2"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="col-lg-6 col-md-6">

                    <h3>Your order</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=0;
                                     foreach ($products as $product):
                                        $total += $product['product_price'] * $product['QTY'] ?>
                                <tr>
                                    <td> <?= $product['product_name'] ?><strong> × <?= $product['QTY'] ?></strong>
                                    </td>
                                    <td> <?= $product['product_price'] * $product['QTY'] ?></td>
                                </tr>

                            </tbody>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td><?= $total ?></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td><strong>$5.00</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong><?= $total + 5 ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default">
                            <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                            <label for="payment" data-toggle="collapse" data-target="#collapseThree"
                                aria-controls="collapseThree">Direct bank transfer</label>

                            <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                <div class="card-body1">
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                        County, Store Postcode.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-default">
                            <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                            <label for="payment_defult" data-toggle="collapse" data-target="#collapseFour"
                                aria-controls="collapseFour">PayPal <img src="assets/img/icon/papyel.png"
                                    alt=""></label>

                            <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                <div class="card-body1">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal. <a
                                            href="#">What is Paypal?</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="order_button">
                            <button type="submit">Proceed to buy</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>