<?php
include_once "includes/head.php";
require_once "includes/sidebar.php";
$products = $objectSeller->viewAllByIdMethod('products','product_id',$_GET['productId']);
?>

    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Product</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

    <div class="container-fluid">
        <div class="tab-content">
            <h2 class="">Update product information</h2>
            <form class="form-group" method="post" action="../sellers_data_manipulation.php" enctype="multipart/form-data">
                <input type="hidden" name="productId" value="<?php echo $_GET['productId']; ?>"
                <div class="row">
                    <!--            <div class="col-sm-6 col-xs-12">-->
                    <!--                <div class="input-group">-->
                    <!--                    <span class="input-group-addon">Category</span>-->
                    <!--                    <input type="text" name="category" value="--><?php //echo $product->category_name;?><!--" class="form-control">-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Product Name</span>
                            <input type="text" name="name" class="form-control" value="<?php echo $products[0]->product_name; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Width(inch)</span>
                            <input type="text" name="width" class="form-control" value="<?php echo $products[0]->width; ?>" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Height(inch)</span>
                            <input type="text" name="height" class="form-control" value="<?php echo $products[0]->height; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Weight(kg)</span>
                            <input type="text" name="weight" class="form-control" value="<?php echo $products[0]->weight; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Picture</span>
                            <input type="hidden" name="old-picture" value="<?php echo $products[0]->picture; ?>">
                            <input type="file" name="picture" class="form-control">
                            <img src="../Upload/<?php echo $products[0]->picture;  ?>" style="width:150px;height:150px;">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Price($)</span>
                            <input type="text" name="price" class="form-control" value="<?php echo $products[0]->price; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Sale Price($)</span>
                            <input type="text" name="salePrice" class="form-control" value="<?php echo $products[0]->sale_price; ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="input-group">
                            <div class="">
                                Description
                            </div>
                            <textarea name="description" class="form-control" style="height:120px;width:100%;"><?php echo $products[0]->description; ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">Stock</span>
                            <input type="text" name="stock" class="form-control" value="<?php echo $products[0]->quantity ?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary" value="Update" name="update-product">
                    </div>
                </div>
            </form>
        </div>
    </div>



<?php
require_once "includes/foot.php";
