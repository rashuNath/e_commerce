<?php
include_once "includes/head.php";
require_once "includes/sidebar.php";
?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Update Category</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Update Category</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
<div class="container-fluid">
    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

        <div  id="message" class="form button"   style="font-size: smaller  " >
            <center>
                <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                    echo "&nbsp;".Message::message();
                }
                Message::message(NULL);
                $_SESSION['message']="";
                ?></center>
        </div>
    <?php } ?>

    <h2 class="">Update the information of this category</h2>
    <form class="form-group" method="post" action="../sellers_data_manipulation.php" enctype="multipart/form-data">
        <input type="hidden" name="categoryId" value="<?php echo $_GET['categoryId']; ?>"
        <div class="row">
            <!--            <div class="col-sm-6 col-xs-12">-->
            <!--                <div class="input-group">-->
            <!--                    <span class="input-group-addon">Category</span>-->
            <!--                    <input type="text" name="category" value="--><?php //echo $product->category_name;?><!--" class="form-control">-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon">Category Name</span>
                    <input type="text" name="name" class="form-control" value="<?php echo $product->category_name; ?>">
                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon">Picture</span>
                    <input type="hidden" name="old-picture" value="<?php echo $product->picture; ?>">
                    <input type="file" name="picture" class="form-control">
                    <img src="../Upload/<?php echo $product->picture;  ?>" style="width:150px;height:150px;">
                </div>
            </div>

            <div class="col-sm-12 col-xs-12">
                <div class="input-group">
                    <div class="">
                        Description
                    </div>
                    <textarea name="description" class="form-control" style="height:120px;width:100%;"><?php echo $product->description; ?></textarea>
                </div>
            </div>
            <!--            <div class="col-sm-6 col-xs-12">-->
            <!--                <div class="input-group">-->
            <!--                    <span class="input-group-addon">Stock</span>-->
            <!--                    <input type="number" name="stock" class="form-control">-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary" value="Update" name="update-category">
            </div>
        </div>
    </form>
</div>

<?php
require_once "includes/foot.php";