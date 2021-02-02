<?php
include_once('header.php');
$categories = $objectSeller->viewCategoryLimit(4);
?>


<!-- Slide1 -->
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1" style="background-image: url(images/master-slide-07.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
                        Electronic Collections
                    </h2>

                    <span class="caption2-slide1 m-text1 t-center animated visible-false mb-3" data-appear="fadeInUp">
							New Collection 2018
						</span>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1" style="background-image: url(images/master-slide-06.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
                        Mobile and Accessories
                    </h2>

                    <span class="caption2-slide1 m-text1 t-center animated visible-false mb-3" data-appear="fadeInUp">
							New Collection 2018
						</span>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url(images/master-slide-02.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
                        Yor are going to love these!
                    </h2>

                    <span class="caption2-slide1 m-text1 t-center animated visible-false mb-3" data-appear="fadeInUp">
							New Collection 2018
						</span>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="product.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- category -->
<div class="banner bg-light p-t-40 p-b-40">
    <div class="container category">
        <h3 class="m-text5 t-center margin-bottom-40">
            Popular Categories
        </h3>
        <div class="row">

            <?php foreach ($categories as $category): ?>
                <div class="col-sm-6 col-md-6 col-lg-3 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="Upload/<?Php echo $category->image; ?>" alt="IMG-BENNER">

                        <div class="block1-wrapbtn">
                            <!-- Button -->
                            <a href="category.php?categoryId=<?php echo $category->item_category_id ?>&categoryName=<?php echo $category->name;?>&catItem=item_category_id" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                <?php echo $category->name; ?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- feature products -->
<div class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <h3 class="m-text5 t-center margin-bottom-40">
            Featured Products
        </h3>
        <div class="row">

            <?php $counter=1; ?>
            <?php foreach ($featuredProducts as $featuredProduct):
                ?>
                <div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                            <img src="Upload/<?php echo $featuredProduct->picture; ?>" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                <!--                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">-->
                                <!--                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>-->
                                <!--                                        <i class="icon-wishlist icon_heart dis-none"-->
                                <!--                                           aria-hidden="true"></i>-->
                                <!--                                    </a>-->

                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!--                                        <form action="cart_process.php" method="post" class="cart-form"-->
                                    <!--                                              style="margin-left:10%;margin-right:10%;"-->
                                    <!--                                              id="--><?php //echo $featuredProduct->product_id; ?><!--">-->
                                    <!--                                            <input type="hidden" name="productName"-->
                                    <!--                                                   value="--><?php //echo $product->product_name; ?><!--" id="productName--><?php //echo $product->product_id;?><!--">-->
                                    <!--                                            <input type="hidden" name="productId"-->
                                    <!--                                                   value="--><?php //echo $product->product_id; ?><!--">-->
                                    <!--                                            <input type="hidden" name="picture"-->
                                    <!--                                                   value="--><?php //echo $product->picture ?><!--">-->
                                    <!--                                            <input type="hidden" name="quantity" value="1">-->
                                    <!--                                            <input type="hidden" name="totalPrice"-->
                                    <!--                                                   value="--><?php //echo $product->price; ?><!--">-->
                                    <!--                                            <input type="hidden" name="email"-->
                                    <!--                                                   value="--><?php //echo $_SESSION['email']; ?><!--">-->
                                    <!--                                            <input type="hidden" name="userId"-->
                                    <!--                                                   value="--><?php //echo $currentUserId; ?><!--">-->
                                    <!--                                            <input type="submit" value="Add to Cart"-->
                                    <!--                                                   class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addToCart"-->
                                    <!--                                                   id="addToCart--><?php //echo $product->product_id; ?><!--">-->
                                    <!--                                        </form>-->
                                    <script>
                                        //                                                    var form = $("#<?php //echo $product->product_id;?>//");
                                        //                                                    var formData = $(form).serialize();
                                        //                                                    var url = $(form).attr('action');
                                        //                                                    var id = <?php //echo $product->product_id; ?>
                                        //
                                        //
                                        //
                                        ////                                                    var productName = $('').val();
                                        //                                                    $(form).submit(function (event) {
                                        //                                                        event.preventDefault();
                                        //                                                        $.ajax({
                                        //                                                            type: 'POST',
                                        //                                                            url: $(this).attr('action'),
                                        //                                                            data: formData
                                        //                                                        })
                                        //                                                            .done(function (response) {
                                        //                                                                console.log('operation is successful!');
                                        //
                                        //                                                                console.log(formData);
                                        //                                                                console.log(url);
                                        //
                                        //                                                                console.log(productName);
                                        //
                                        //                                                            })
                                        //                                                            .fail(function (message) {
                                        //                                                                alert('fail to add!')
                                        //
                                        //                                                            });
                                        //                                                    });
                                    </script>

                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="product-detail.php?productId=<?php echo $featuredProduct->product_id; ?>"
                               class="block2-name dis-block s-text3 p-b-5">
                                <?php echo $featuredProduct->product_name; ?>
                            </a>

                            <?php   $product_id = $featuredProduct->product_id;
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
                                    ?></div>
                                <?php
                            } ?>


                            <span class="block2-price m-text6 p-r-5">
										$<?php echo $featuredProduct->price; ?>
									</span>
                        </div>
                    </div>
                </div>

                <?php
                $counter++;
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- Blog -->
<section class="blog bg-light p-t-94 p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Our Blog
            </h3>
        </div>

        <div class="row">
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="images/blog-01.jpg" alt="IMG-BLOG">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="blog-detail.html" class="m-text11">
                                Black Friday Guide: Best Sales & Discount Codes
                            </a>
                        </h4>

                        <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                        <span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

                        <p class="s-text8 p-t-16">
                            Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="images/blog-02.jpg" alt="IMG-BLOG">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="blog-detail.html" class="m-text11">
                                The White Sneakers Nearly Every Fashion Girls Own
                            </a>
                        </h4>

                        <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                        <span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>

                        <p class="s-text8 p-t-16">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="images/blog-03.jpg" alt="IMG-BLOG">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="blog-detail.html" class="m-text11">
                                New York SS 2018 Street Style: Annina Mislin
                            </a>
                        </h4>

                        <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                        <span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>

                        <p class="s-text8 p-t-16">
                            Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shipping -->
<section class="shipping p-t-62 p-b-46">
    <div class="flex-w p-l-15 p-r-15">
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Free Delivery Worldwide
            </h4>

            <a href="#" class="s-text11 t-center">
                Click here for more info
            </a>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                30 Days Return
            </h4>

            <span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Store Opening
            </h4>

            <span class="s-text11 t-center">
					Shop open from Monday to Sunday
            </span>
        </div>
    </div>
</section>

<?php
include_once('footer.php');
?>
