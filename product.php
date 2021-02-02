<?php
include_once ('header.php');
$categories = $objectSeller->viewAllMethod('item_category');
?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/breadcrumb.jpg);">
		<h2 class="l-text2 t-center">
			Shop
		</h2>
		<p class="m-text13 t-center">
			Shop here!
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <?php
                        if(isset($_POST['filter'])){
                            $low_price = $_POST['low_price'];
                            $high_price = $_POST['high_price'];
                            $low_price=trim($low_price,"$");
                            $high_price=trim($high_price,"$");

                            $products = $objectSeller->product_filter_by_price($low_price,$high_price);
                            ?>
                            <div class="row">
                                <?php
//                                $products = $objectSeller->productView();

                                if($products!==false){
                                    foreach($products as $product){
                                        ?>
                                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                            <!-- Block2 -->
                                            <div class="block2">
                                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                                    <img src="Upload/<?php echo $product->picture;?>" alt="IMG-PRODUCT">

                                                    <div class="block2-overlay trans-0-4">
                                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                        </a>

                                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                                            <form action="cart_process.php" method="post" class="cart-form" style="margin-left:10%;margin-right:10%;" id="<?php echo $product->product_id;?>">
                                                                <input type="hidden" name="productName" class="product-name" value="<?php echo $product->product_name; ?>" id="productName<?php echo $product->product_id; ?>">
                                                                <input type="hidden" name="productId" class="product-id" value="<?php echo $product->product_id;?>">
                                                                <input type="hidden" name="picture" class="picture" value="<?php echo $product->picture?>">
                                                                <input type="hidden" name="quantity" class="quantity" value="1">
                                                                <input type="hidden" name="totalPrice" class="price" value="<?php echo $product->price;?>">
                                                                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                                                                <input type="hidden" name="userId" class="current-user-id" value="<?php echo $currentUserId; ?>">
                                                                <input type="submit" value="Add to Cart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addToCart" id="addToCart<?php echo $product->product_id;?>">
                                                            </form>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="block2-txt p-t-20">
                                                    <a href="product-detail.php?productId=<?php echo $product->product_id; ?>" class="block2-name dis-block s-text3 p-b-5">
                                                        <?php echo $product->product_name; ?>
                                                    </a>

                                                    <?php   $product_id = $product->product_id;
                                                            $ratings = $obj->viewRatings($product_id);
                                                    ?>

                                                    <p><?php
                                                        if($ratings):
                                                            foreach ($ratings as $rating):
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                        <?php
                                                                endforeach;
                                                            endif;
//                                                        echo $ratings->ratings;
                                                        ?></p>

                                                    <span class="block2-price m-text6 p-r-5">$<?php echo $product->price;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <div class="text-center" style="width:100%; padding-top:50px;">
                                        <i class="fa fa-times" style="font-size:80px; color:#00aa88"></i>
                                    </div>

                                    <h1 class="text-center" style="padding-top:20px; width: 100%;">Sorry no Products available!</h1>
                                    <div class="text-center" style="width:100%;">
                                        <a style="margin-top:15px" href="product.php">back to the shop!</a>
                                    </div>
                                <?php
                                }


                                ?>
                    <?php
                        }else {
                    ?>
                    <div class="row">
                        <?php

                        $total = $objectSeller->totalProduct();
                        if($total):
                        // How many items to list per page
                        $limit = 6;

                        // How many pages will there be
                        $pages = ceil($total / $limit);

                        // What page are we currently on?
                        $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                            'options' => array(
                                'default'   => 1,
                                'min_range' => 1,
                            ),
                        )));

                        // Calculate the offset for the query
                        $offset = ($page - 1)  * $limit;

                        // Some information to display to the user
                        $start = $offset + 1;
                        $end = min(($offset + $limit), $total);

//                        $products = $objectSeller->productView();
                        $products = $objectSeller->productViewPaged($limit, $offset);


                        foreach ($products as $product) {
                            ?>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                        <img src="Upload/<?php echo $product->picture; ?>" alt="IMG-PRODUCT">

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none"
                                                   aria-hidden="true"></i>
                                            </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <form action="cart_process.php" method="post" class="cart-form"
                                                      style="margin-left:10%;margin-right:10%;"
                                                      id="<?php echo $product->product_id; ?>">
                                                    <input type="hidden" name="productName" class="product-name"
                                                           value="<?php echo $product->product_name; ?>" id="productName<?php echo $product->product_id;?>">
                                                    <input type="hidden" name="productId" class="product-id"
                                                           value="<?php echo $product->product_id; ?>">
                                                    <input type="hidden" name="picture" class="picture"
                                                           value="<?php echo $product->picture ?>">
                                                    <input type="hidden" name="quantity" class="quantity" value="1">
                                                    <input type="hidden" name="totalPrice" class="price"
                                                           value="<?php echo $product->price; ?>">
                                                    <input type="hidden" name="email"
                                                           value="<?php echo $_SESSION['email']; ?>">
                                                    <input type="hidden" name="userId" class="current-user-id"
                                                           value="<?php echo $currentUserId; ?>">
                                                    <input type="submit" value="Add to Cart"
                                                           class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addToCart"
                                                           id="addToCart<?php echo $product->product_id; ?>">
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="product-detail.php?productId=<?php echo $product->product_id; ?>"
                                           class="block2-name dis-block s-text3 p-b-5">
                                            <?php echo $product->product_name; ?>
                                        </a>

                                        <?php   $product_id = $product->product_id;
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
										$<?php echo $product->price; ?>
									</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-sm-12">
                            <?php


                            // The "back" link
                            $prevlink = ($page > 1) ? '<a href="?page=1" class="page-link" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" class="page-link" title="Previous page">&lsaquo;</a>' : '<span class="page-link disabled">&laquo;</span> <span class="page-link disabled">&lsaquo;</span>';

                            // The "forward" link
                            $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" class="page-link" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" class="page-link" title="Last page">&raquo;</a>' : '<span class="page-link disabled">&rsaquo;</span> <span class="page-link disabled">&raquo;</span>';

                            // Display the paging information
                            echo '<div id="paging"><div class="pagination d-flex justify-content-center align-items-center" style="padding:10px 0;border:1px solid #ddd;">', $prevlink,'&nbsp;&nbsp;&nbsp;', $page, ' of ', $pages, ' pages','&nbsp;&nbsp;&nbsp;', $nextlink, ' </div></div>';
                            else:

                            ?>
                                <h2 class="text-center" style="text-align: center">No products available</h2>

                        </div>
                        <?php
                        endif;
                        }
                                ?>


                            </div>
                            <?php
                    ?>

					<!-- Pagination -->
<!--					<div class="pagination flex-m flex-w p-t-26">-->
<!--						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>-->
<!--						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>-->
<!--					</div>-->
				</div>

                    <?php
                    $total = $objectSeller->totalProduct();
                    if($total):
                    ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <?php
                        $categories = $objectSeller->viewAllMethod('item_category');
                        ?>
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <?php
                            foreach ($categories as $category){
                                $subCategories = $objectSeller->viewAllByIdMethod('item_subcategory','item_category_id',$category->item_category_id);
                                ?>
                                <li class="p-t-4">
                                    <a href="category.php?categoryId=<?php echo $category->item_category_id ?>&categoryName=<?php echo $category->name;?>&catItem=item_category_id" class="s-text13 text-capitalize">
                                        <?php echo $category->name; ?>
                                    </a>

                                    <?php
                                    if($subCategories != false){
                                        ?>
                                        <ul class="padding-left-20">
                                    <?php
                                        foreach ($subCategories as $subCategory){
                                            $productCategories = $objectSeller->viewAllByIdMethod('product_category','item_subcategory_id',$subCategory->item_subcategory_id);
                                            ?>
                                                <li class="p-t-4">
                                                    <a href="category.php?categoryId=<?php echo $subCategory->item_subcategory_id ?>&categoryName=<?php echo $subCategory->name;?>&catItem=item_subcategory_id" class="s-text17">
                                                        <?php echo $subCategory->name; ?>
                                                    </a>

                                                    <?php if($productCategories): ?>
                                                        <ul class="" style="padding-left:15px;border-left:1px solid #ddd;">
                                                            <?php foreach ($productCategories as $productCategory): ?>
                                                            <li class="p-t-4">
                                                                <a href="category.php?categoryId=<?php echo $productCategory->product_category_id ?>&categoryName=<?php echo $productCategory->name;?>&catItem=product_category_id" class="s-text17">
                                                                    <?php echo $productCategory->name ?>
                                                                </a>
                                                            </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                <?php endif; ?>
                                                </li>
                                            <?php
                                        }
                                        ?>
                                        </ul>
                                            <?php
                                    }

                                    ?>

                                </li>
                                <?php
                            }
                            ?>
                        </ul>


                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                Filter by Price
                            </div>

                            <div id="slider-range"></div>

                            <div>
                                <label for="amount" class="sr-only"></label>
                                <input type="" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;visibility: hidden">
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                    <?php if(isset($_GET['categoryId'])){
                                        ?>
                                        <input type="hidden" name="categoryId" value = "<?php echo $_GET['categoryId']; ?>">
                                        <input type="hidden" name="categoryName" value = "<?php echo $_GET['categoryName']; ?>">
                                        <input type="hidden" name="catItem" value = "<?php echo $_GET['catItem']; ?>">
                                        <?php
                                    }else{
                                        ?>
                                        <input type="hidden" name="categoryId" value = "<?php echo $_SESSION['categoryId']; ?>">
                                        <input type="hidden" name="categoryName" value = "<?php echo $_SESSION['categoryName']; ?>">
                                        <?php
                                    }
                                    ?>
                                    Lowest
                                    <?php if(isset($_POST['low_price'])): ?>
                                        <input type="text" id="low-price" name="low_price" value="<?php echo $_POST['low_price'] ?>" class="form-control" style="border:1px solid #838383!important; margin-bottom: 8px!important;">
                                    <?php else: ?>
                                        <input type="text" id="low-price" name="low_price" class="form-control" style="border:1px solid #838383!important; margin-bottom: 8px!important;">
                                    <?php endif; ?>
                                    Highest
                                    <?php if(isset($_POST['high_price'])): ?>
                                        <input type="text" id="high-price" name="high_price" value="<?php echo $_POST['high_price'] ?>" class="form-control" style="border:1px solid #838383!important; margin-bottom:8px!important;">
                                    <?php else: ?>
                                        <input type="text" id="high-price" name="high_price" class="form-control" style="border:1px solid #838383!important; margin-bottom:8px!important;">
                                    <?php endif; ?>
                                    <input type="submit" value="filter" name="filter" class="form-control" style="border:1px solid #838383!important;background-color:#838383!important;color:#ffffff!important;cursor: pointer">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                    <?php endif; ?>
			</div>
		</div>
	</section>


<?php
include_once ('footer.php');
?>

    <script>
        $(document).ready(function () {
            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            console.log(getCookie('tempUserNew'));

            $('.addToCart').on('click',function (e) {
                e.preventDefault();
                var self = $(this),
                    price = self.closest('.block2').find('.price').val(),
                    productId = self.closest('.block2').find('.product-id').val(),
                    productName = self.closest('.block2').find('.product-name').val(),
                    productQuantity = self.closest('.block2').find('.quantity').val(),
                    userId = self.closest('.block2').find('.current-user-id').val(),
                    picture = self.closest('.block2').find('.picture').val();

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
                            contentDiv.innerHTML = "You have added (1 X"+price+")="+price+" into your cart";
                            swal({
                                title:nameProduct,
                                content: contentDiv
                            });

                            $('.cart-number').html(obj.productIntoCart);
                        }
                    }
                )
            });
        });
    </script>

