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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <?php
            if(isset($_SESSION['category-stored']) && $_SESSION['category-stored']!=""){
                ?>

                <div  id="message" class="alert alert-success" style="font-size: smaller  " >
                    <center>
                        <?php echo $_SESSION['category-stored']; ?>
                    </center>
                </div>
                <?php
                $_SESSION['category-stored'] = '';
            }
            ?>
            <div class="tab-content">
                <div  class="tab-pane active" id="add-category">
                    <div class="">
                        <h2 class="">Add Category</h2>
                        <form id="addcategory" class="form-group" method="post" action="../sellers_data_manipulation.php" enctype="multipart/form-data">
                            <?php $sellerId = $singleUser->user_id;
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

                                <div class="col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="">
                                            <label for="description">Description</label>
                                        </div>
                                        <textarea name="description" id="description" class="form-control" style="height:120px;width:100%;"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Add" name="add-category">
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