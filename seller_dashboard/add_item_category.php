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
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">item category</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->

            <div class="message-container">
            <?php
            if(isset($_SESSION['item-category-stored']) && $_SESSION['item-category-stored']!=""){
                echo $_SESSION['item-category-stored'];
                $_SESSION['item-category-stored'] = '';
            }
            ?>
            </div>
            <div class="tab-content">
                <div  class="tab-pane active">
                    <div class="">
                        <h2 class="">Add Category</h2>
                        <form class="form-group" method="post" action="../sellers_data_manipulation.php" enctype="multipart/form-data">
                            <?php $sellerId = 1;
                            ?>
                            <input type="hidden" value="<?php echo $sellerId; ?>" name="sellerId">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Category Name</span>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Picture</span>
                                        <input type="file" name="picture" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Add" name="add-item-category">
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