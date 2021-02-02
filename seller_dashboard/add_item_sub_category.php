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
                    <li class="breadcrumb-item active">item subcategory</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->

            <div class="message-container">
            <?php
            if(isset($_SESSION['item-subcategory-stored']) && $_SESSION['item-subcategory-stored']!=""){
                echo $_SESSION['item-subcategory-stored'];
                $_SESSION['item-subcategory-stored'] = '';
            }
            ?>
            </div>
            <div class="tab-content">
                <div  class="tab-pane active">
                    <div class="">
                        <h2 class="">Item Category</h2>
                        <form class="form-group" method="post" action="../sellers_data_manipulation.php" enctype="multipart/form-data">
                            <?php $sellerId = 1;
                            ?>
                            <input type="hidden" value="<?php echo $sellerId; ?>" name="sellerId">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Choose Category</span>
                                        <select class="form-control item-category-picker" name="item-category-id">
                                            <option value="choose">Choose Category</option>
                                            <?php
                                            $itemCategories = $objectSeller->viewItemCategory();
                                            foreach ($itemCategories as $itemCategory):
                                                ?>
                                                <option value="<?php echo $itemCategory->item_category_id ?>"><?php echo $itemCategory->name ?></option>
                                                <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Item Subcategory Name</span>
                                        <input type="text" name="name" class="form-control field-after" disabled>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Picture</span>
                                        <input type="file" name="picture" class="form-control field-after" disabled>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Add" name="add-item-subcategory">
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
    $('.item-category-picker').change(function () {
        if($(this).val()!="choose"){
            $('.field-after').each(function () {
                $(this).prop('disabled',false);
            });
        }else{
            $('.field-after').each(function () {
                $(this).prop('disabled',true);
            });
        }
    });
</script>
