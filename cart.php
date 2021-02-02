<?php
include_once('header.php');
$categories = $objectSeller->viewAllMethod('item_category');
?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
	<h2 class="l-text2 t-center">
		Cart
	</h2>
</section>

<?php
    if($currentUserId==0){
        ?>
        <div class="text-center" style="width:100%; padding-top:50px;">
            <i class="fa fa-times" style="font-size:80px; color:#00aa88"></i>
        </div>
        <h2 class="text-center" style="padding-top:20px; width: 100%;">Your cart is empty! </h2>
        <div class="text-center" style="width:100%; margin-bottom:50px;">
            <a style="margin-top:15px;font-size:2.rem;" href="product.php">And start shopping!</a>
        </div>
<?php
    }else {
        $cartItems = $objectSeller->cartView($currentUserId);
        if($cartItems){
            $cartItemsNumber = count($cartItems);
        }else{
            $cartItemsNumber = 0;
        }

//    var_dump($cartItems);
        ?>

        <p style="display:none" class="user"><?php echo $currentUserId; ?></p>

        <!-- Cart -->
        <section class="cart bgwhite p-t-70 p-b-100">
            <form action="checkout_process.php" class="checkout-form" method="post">
                <input type="hidden" name="user-id" class="user-id" value="<?php echo $currentUserId ?>">
                <div class="container">
                    <!-- Cart item -->
                    <?php
                    $serial = 1;
                    $total = 0;
                    $loopCounter = $cartItemsNumber;
                    $order_number = rand();
                    $_POST['productId'] = array();
                    $_POST['totalPrice'] = array();
                    $_POST['soldCounter'] = array();
                    if ($cartItems != FALSE){

                    ?>
                    <div class="container-table-cart pos-relative">
                        <div class="wrap-table-shopping-cart bgwhite">
                            <table class="table-shopping-cart">
                                <tr class="table-head">
                                    <th class="column-1"></th>
                                    <th class="column-2">Product</th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                <?php
                                ?>
                                <?php


                                foreach ($cartItems as $item) {
                                    ?>
                                    <input type="hidden" name="productId[]" value="<?php echo $item->product_id; ?>">
                                    <tr class="table-row">
                                        <td class="column-1">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img src="Upload/<?php echo $item->picture; ?>" alt="IMG-PRODUCT">
                                            </div>
                                        </td>
                                        <td class="column-2"><?php echo $item->product_name; ?></td>
                                        <td class="column-3"><?php echo $item->total_price; ?></td>
                                        <td class="column-4">
                                            <div class="">
                                                <?php echo $item->quantity; ?>
                                                <!--                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">-->
                                                <!--                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>-->
                                                <!--                                            </button>-->

                                                <input type="hidden" class="size8 m-text18 t-center num-product"
                                                       name="quantity[]" value="<?php echo $item->quantity; ?>">

                                                <!--                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">-->
                                                <!--                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>-->
                                                <!--                                            </button>-->
                                            </div>
                                        </td>
                                        <td class="column-5" style="position: relative">
                                            <?php echo $item->total_price; ?>
                                            <a href="javascript:;" class="remove-from-cart"><i class="fa fa-trash"></i>
                                                <input type="hidden" class="cart-id" value="<?php echo $item->cart_id; ?>"
                                            </a>

                                        </td>
                                        <input type="hidden" name="totalPrice[]"
                                               value="<?php echo $item->total_price; ?>">
                                    </tr>
                                    <?php
                                    $total = $total + $item->total_price;
                                    $serial++;
                                }


                                ?>
                            </table>
                        </div>
                    </div>
                    <input type="hidden" name="loopCounter" value="<?php echo $loopCounter; ?>">
                    <input type="hidden" name="userId" value="<?php echo $currentUserId; ?>">
                    <input type="hidden" name="orderNumber" value="<?php echo $order_number; ?>">
                    <input type="hidden" name="paidAmount" value="<?php echo $total; ?>">
                    <input type="hidden" name="paid" value="yes">

                    <!-- Total -->
                    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                        <h5 class="m-text20 p-b-24">
<!--                            : <p-->
<!--                                    style="font-size:12px; color:#656565; display: inline; border:1px solid #656565;padding:10px;margin-left:10px;">-->
<!--                                Cash on Delivery</p>-->
                            Payment Type:
                            <select style="    display: block;
    width: 190px;
    float: right;
    font-size: 16px;
    font-weight: 400;" name="deliveryType" class="payment-type-select">
                                <option value="cashDelivery">Cash On Delivery</option>
                                <option value="bikashDelivery">Bikash Delivery</option>
                            </select>
                        </h5>

                        <div class="box display-none">
                            <p>Send the money to<strong> ( 019640999833 ) </strong> this number. and write down<strong> the transaction id into the input box below.</strong> One of our moderator will look up to your <strong>transaction id</strong> and let you know that wheather, your transaction is successfull or not, thankyou.</p>
                            <input type="text" class="form-control bo5 transaction-id" name="transaction-id">
                        </div>


                        <input type="hidden" value="cash on delivery" name="paymentType">
                        <h5 class="m-text20 p-b-24">
                            Cart Totals
                        </h5>

                        <!--  -->
                        <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

                            <span class="m-text21 w-full-sm">
						<?php
                        echo $total;
                        ?>
					</span>
                        </div>


                        <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                            <span class="m-text21 w-full-sm">
						<?php
                        echo $total;
                        ?>
					</span>

                            <span class="m-text21 w-full-sm">
						These products will be shipped to your address as soon as possible.
					</span>
                        </div>

                        <div class="size15 trans-0-4">
                            <!-- Button -->
                            <a href="javascript:;" class="proceed-to-checkout flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>

                <div class="address-form" style="display:none">
                    <div class="container pt-5 pb-5" style="background:#f8f8f8;">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="">
                                    <div>
                                        <h4 class="mb-4">Shipping Address</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <?php if(!isset($_SESSION['email'])){ ?>
                                                        <input type="email" name="client-email" class="form-control bordered" required>
                                                    <?php }else{ ?>
                                                        <input type="email" name="client-email" class="form-control bordered" value="<?php echo $currentUserEmail; ?>" disabled required>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="client-fname" class="form-control bordered" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="client-lname" class="form-control bordered" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea type="text" name="client-address" class="form-control bordered" rows="4" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" name="client-state" class="form-control bordered" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="client-city" class="form-control bordered" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>ZIP code</label>
                                                    <input type="number" name="client-zip" class="form-control bordered" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="number" name="client-phone" class="form-control bordered" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="submit" style="max-width:150px;min-width:150px;" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4" value="Submit">
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
            <?php
            } else {
                ?>
                <div class="text-center">
                    <i class="fa fa-cart-plus" style="font-size:80px; color:#00aa88;"></i>
                </div>
                <h2 class="text-center" style="margin-bottom:50px;margin-top:15px;">Your Cart is empty</h2>
                <?php
            }
            ?>

        </section>
        <?php
    }
?>



<?php
include_once ('footer.php');
?>



</body>
</html>
