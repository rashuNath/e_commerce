<?php
include_once ('header.php');
//PRODUCT DETAILS BY ID
$objectSeller->setGetData($_GET);
$singleProduct = $objectSeller->singleProductView();

$products = $objectSeller->productView();
$categories = $objectSeller->viewAllMethod('item_category');
?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/breadcrumb.jpg);">
	<h2 class="l-text2 t-center">
		<?php echo $singleProduct->product_name; ?>
	</h2>
</section>


<!-- Product Detail -->

    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <img src="Upload/<?php echo $singleProduct->picture; ?>">

            </div>

            <div class="w-size14 p-t-30 respon5 product-details">
                <h4 class="product-detail-name m-text16 p-b-13">
                    <?php echo $singleProduct->product_name; ?>
                    <?php
                    $product_id = $singleProduct->product_id;
                    $ratings = $obj->viewRatings($product_id);
                    ?>
                    <?php if($ratings){
                        $totalRatings = 0;
                        $serialRating = 0;
                        foreach ($ratings as $rating){
                            $totalRatings = $totalRatings + $rating->ratings;
                        }
//                                                    $ratingsArray = $ratings->ratings;
//                                                    $totalRatings = array_sum($ratingsArray);
                        $ratingsCounter = count($ratings);

                        $averageRatings = $totalRatings/$ratingsCounter;

                        ?>
                        <div><?php
                            for($i=1; $i<=$averageRatings;$i++){
                                ?>
                                <img src="images/rating_star.png" alt="icon" style="width:30px;">
                                <?php
                            }
                            echo "<span>($ratingsCounter)</span>";
                            ?></div>
                        <?php
                    }

                    ?>




                </h4>

                <span class="m-text17">
                    <span>$</span> <span class="price-html"><?php echo $singleProduct->price; ?></span>
				</span>

                <div class="p-t-30">
                    <span class="m-r-35">Brand:
                        <span class="badge badge-primary">
                            <?php
                            if($singleProduct->product_brand_id):
                            $brand = $objectSeller->viewAllByIdMethod('product_brand','product_brand_id',$singleProduct->product_brand_id);
                            echo $brand[0]->name;
                            else:
                            echo $singleProduct->product_group;
                            endif;
                            ?>
                        </span>
                    </span>
                </div>

                <div class="p-t-33 p-b-60">
                    <form action="cart_process.php" method="post">
                        <input type="hidden" name="userId" class="current-user-id" value="<?php echo $currentUserId; ?>">
                        <input type="hidden" name="productId" class="product-id" value="<?php echo $singleProduct->product_id; ?>">
                        <input type="hidden" name="picture" class="picture" value="<?php echo $singleProduct->picture;?>">
                        <input type="hidden" name="productName" class="product-name" value="<?php echo $singleProduct->product_name;?>">
                        <input type="hidden" name="totalPrice" class="price" value="<?php echo $singleProduct->price;?>">
                    <div class="p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="quantity" value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <input type="submit" value="Add to Cart" name="addToCArt" class="addToCart flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>



                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Description
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            <?php echo $singleProduct->description; ?>
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Rate this product
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <form action="ratings.php" method="post" class="reviewForm">
                            Name:

                            <?php if(!$status){
                                ?>
                                <input type="text" name="userName" class="form-control" style="border:1px solid #838383!important; margin-bottom: 8px!important;" autofocus required>
                                <?php

                            }else{
                                ?>
                                <input type="text" name="userName" class="form-control" style="border:1px solid #838383!important; margin-bottom: 8px!important;" value="<?php echo $singleUser->first_name;?>" required>
                                <?php

                            } ?>

                            <input type="hidden" name="productId" value="<?php echo $_GET['productId']; ?>" >

                            <br>
                            <div>
                                <input type="radio" id="rating-1" value="1" name="ratings">
                                <label for="rating-1">
                                    &nbsp;<img src="images/rating_star.png" style="max-width: 25px">
                                </label>

                            </div>

                            <div class="p-t-5">
                                <input type="radio" id="rating-2" value="2" name="ratings">
                                <label for="rating-2">
                                    &nbsp;<img src="images/rating_star.png" style="max-width:25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                </label>

                            </div>

                            <div class="p-t-5">
                                <input type="radio" id="rating-3" value="3" name="ratings">
                                <label for="rating-3">
                                    &nbsp;<img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                </label>

                            </div>

                            <div class="p-t-5">
                                <input type="radio" id="rating-4" value="4" name="ratings">
                                <label for="rating-4">
                                    &nbsp;
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                </label>
                            </div>

                            <div class="p-t-5">
                                <input type="radio" id="rating-5" value="5" name="ratings">&nbsp;
                                <label for="rating-5">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                    <img src="images/rating_star.png" style="max-width: 25px;">
                                </label>

                            </div>

                            <input type="submit" value="Send" name="send" class="form-control sendReview" style="border:1px solid #838383!important;background-color:#838383!important;color:#ffffff!important;">
                        </form>
                    </div>
                </div>

        </div>
    </div>
    </div>


<?php
$relatedProducts = $objectSeller->relatedProducts($_GET['productId']);
if($relatedProducts):
$productsFromCategory = $relatedProducts;
?>
<section class="relateproduct bg-light p-t-45 p-b-138">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">

                <?php
                    foreach($productsFromCategory as $product) {
                        if($product->product_id!=$_GET['productId']) {

                            ?>
                            <div class="item-slick2 p-l-15 p-r-15">
                                <!-- Block2 -->
                                <div class="block2 bg-white">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                        <img src="Upload/<?php echo $product->picture;?>" alt="IMG-PRODUCT">

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <form action="cart_process.php" method="post" class="cart-form" id="<?php echo $product->product_id;?>">
                                                    <input type="hidden" name="userId" class="current-user-id" value="<?php echo $currentUserId; ?>">
                                                    <input type="hidden" name="productId" class="product-id" value="<?php echo $singleProduct->product_id; ?>">
                                                    <input type="hidden" name="picture" class="picture" value="<?php echo $singleProduct->picture;?>">
                                                    <input type="hidden" name="productName" class="product-name" value="<?php echo $singleProduct->product_name;?>">
                                                    <input type="hidden" name="totalPrice" class="price" value="<?php echo $singleProduct->price;?>">
                                                    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                                                    <input type="submit" value="Add to Cart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addToCart" id="addToCart<?php echo $product->product_id;?>">
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="product-detail.php?productId=<?php echo $product->product_id; ?>" class="block2-name dis-block s-text3 p-b-5">
                                            <?php echo $product->product_name; ?>
                                        </a>

                                        <span class="block2-price m-text6 p-r-5">
										$<?php echo $product->price;?>
									</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>

    </div>
</section>
<?php
else:
endif;
?>


        <?php
        include_once ('footer.php');
        ?>

        <script>

            $('.addToCart').on('click',function (e) {
                e.preventDefault();
                var self = $(this),
                    singleprice = self.closest('.product-details').find('.price').val(),
                    productId = self.closest('.product-details').find('.product-id').val(),
                    productName = self.closest('.product-details').find('.product-name').val(),
                    productQuantity = self.closest('.product-details').find('.num-product').val(),
                    price = self.closest('.product-details').find('.price').val() * productQuantity,
                    userId = self.closest('.product-details').find('.current-user-id').val(),
                    picture = self.closest('.product-details').find('.picture').val();

                $.post(
                    '<?php echo url(); ?>/e_commerce/cart_process.php',
                    {
                        formName:'cart',
                        productId:productId,
                        productName:productName,
                        quantity:productQuantity,
                        totalPrice:price,
                        userId:userId,
                        picture:picture

                    },
                    function(data)
                    {
                        var obj = JSON.parse(data);
                        if(obj.status){
                            var nameProduct = productName,
                                contentDiv = document.createElement('div');
                            contentDiv.innerHTML = "You have added ("+productQuantity+"X"+singleprice+")="+price+" into your cart";
                            swal({
                                title:nameProduct,
                                content: contentDiv
                            });

                            $('.cart-number').html(obj.productIntoCart);
                        }
                    }
                )
            });

        </script>

