<?php
include_once "includes/head.php";
require_once "includes/sidebar.php";
?>
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->

            <?php
            if(isset($_SESSION['product-stored']) && $_SESSION['product-stored']!=""){
                echo $_SESSION['product-stored'];
                $_SESSION['product-stored'] = '';
            }
            ?>

            <div class="tab-content">
                <div class="tab-pane show active" id="upload">
                    <div class="">
                        <h2 class="">Add Products</h2>
                        <form class="form-group product-form" method="post" action="../sellers_data_manipulation.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Choose Item Category</span>
                                        <select class="form-control item-category" name="item-category-id" style="height:42px;" required>
                                            <option value="choose">Choose Item Category</option>
                                            <?php
                                            $items = $objectSeller->viewAllMethod('item_category');
                                            foreach ($items as $item){
                                                ?>
                                                <option value="<?php echo $item->item_category_id; ?>"><?php echo $item->name;?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Choose Item Sub-category</span>
                                        <select class="form-control item-subcategory" name="item-subcategory-id" style="height:42px;" disabled required>
                                            <option value="choose">Choose Item Sub-category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Choose Product Category</span>
                                        <select class="form-control product-category" name="product-category-id" style="height:42px;" disabled required>
                                            <option value="choose">Choose Product Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Choose Product Brand</span>
                                        <select class="form-control product-brand" name="product-brand-id" style="height:42px;" disabled>
                                            <option value="choose">Choose Product Brand</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xs-12 product-group-div" style="display: none;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Brand Name</span>
                                                <input type="text" name="brand-name-local" class="form-control product-group">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Product Group Name</span>
                                                <input type="text" name="group-name" class="form-control product-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Product Name</span>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Product Model</span>
                                        <input type="text" name="model-name" class="form-control">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Width(inch)</span>
                                        <input type="text" name="width" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Height(inch)</span>
                                        <input type="text" name="height" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Weight(kg)</span>
                                        <input type="text" name="weight" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Picture</span>
                                        <input type="file" name="picture" class="form-control" required multiple="multiple">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Price(&#2547;)</span>
                                        <input type="text" name="price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Sale Price(&#2547;)</span>
                                        <input type="text" name="salePrice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="">
                                            <label for="description">Description</label>
                                        </div>
                                        <textarea name="description" class="form-control" style="height:120px;width:100%;" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Stock</span>
                                        <input type="number" name="stock" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="">
                                        <label>Is featured product?</label>
                                        <div>
                                            <span><input type="radio" name="is-featured" value="no" checked id="no"><label for="no" style="margin-left:10px;">No</label> </span>
                                            <span style="margin-left:30px;"><input type="radio" name="is-featured" value="yes" id="yes"><label for="yes" style="margin-left:10px;">Yes</label> </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Add" name="add-product">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
<?php
require_once "includes/foot.php";

?>
<script>
    var targetUrl = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/e_commerce/data_manipulation_ajax.php";
    $('.item-category').change(function () {
        var self = $(this);
        if($(this).val()!="choose"){
            $.ajax({
                type: 'POST',
                url: targetUrl,
                dataType: "html", // add data type
                data: {item_category_id:$(this).val()},
                success: function( response ) {
                    //console.log(response);
                    $('.item-subcategory').prop('disabled',false);
                    $('.item-subcategory').html(response);
                }
            });
        }else{
            $('.item-subcategory').html("<option value='choose'>Choose Item Category First</option>");
            $('.item-subcategory').prop('disabled',true);
        }
    });

    $('.item-subcategory').change(function () {
        var self = $(this);
        if($(this).val()!="choose"){
            //console.log($(this).val());
            $.ajax({
                type: 'POST',
                url: targetUrl,
                dataType: "html", // add data type
                data: {product_category_id:$(this).val()},
                success: function( response ) {
                    //console.log(response);
                    $('.product-category').prop('disabled',false);
                    $('.product-category').html(response);
                }
            });
        }else{
            console.log('choose');
            $('.product-category').html("<option value='choose'>Choose Item Sub-category First</option>");
            $('.product-category').prop('disabled',true);
        }
    });

    $('.product-category').change(function () {
        var self = $(this);
        if($(this).val()!="choose"){
            console.log($(this).val());
            $.ajax({
                type: 'POST',
                url: targetUrl,
                dataType: "html", // add data type
                data: {product_category_idd:$(this).val()},
                success: function( response ) {
                    //console.log(response);
                    console.log(self.val());
                    $('.product-brand').prop('disabled',false);
                    $('.product-brand').html(response);
                    $('.product-group-div').show();
                }
            });
        }else{
            console.log('choose');
            $('.product-brand').html("<option value='choose'>Choose Product Category First</option>");
            $('.product-brand').prop('disabled',true);
        }
    });


    $('.product-brand').change(function () {
        if($(this).val()=='choose'){
            $('.product-group-div').show();
        }else{
            $('.product-group-div').hide();
        }
    });
</script>
