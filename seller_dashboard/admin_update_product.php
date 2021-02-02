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
            if(isset($_SESSION['product-updated']) && $_SESSION['product-updated']!=""){
                ?>

                <div  id="message" class="alert alert-success" style="font-size: smaller  " >
                    <center>
                        <?php echo $_SESSION['product-updated']; ?>
                    </center>
                </div>
                <?php
                $_SESSION['product-updated'] = '';
            }
            ?>
            <div class="tab-content">
                <div class="tab-pane show active" id="edit">

                    <?php
//                    $sellerId = $singleUser->user_id;
                    $sellerId = 1;
//                    $products = $objectSeller->productViewBySellerId($sellerId);
                    $products = $objectSeller->productView();

                    if($products==FALSE){
                        echo "Yoh have not added any products yet!";
                    }else{
                        ?>
                        <table class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                            <tr style="text-align: center">
                                <td>
                                    Picture
                                </td>
                                <td>Name</td>
                                <td>price</td>
                                <td>Stock Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <?php
                            foreach ($products as $product) {
                                ?>

                                <tr style="text-align: center">
                                    <td><img style="width:50px;margin-bottom:10px;border:1px solid #ddd;" src="../Upload/<?php echo $product->picture?>"></td>
                                    <td><?php echo $product->product_name?></td>
                                    <td style="text-align: center;"><?php echo $product->price?></td>
                                    <td><?php if($product->quantity==0): ?>
                                            <span class="badge badge-danger">Out of stock</span>
                                        <?php else: ?>
                                            <span class="badge badge-success"><?php echo $product->quantity ?></span>
                                        <?php endif; ?> </td>
                                    <td><a href="product_update.php?productId=<?php echo $product->product_id; ?>" class="text-primary"><i class="fa fa-edit"></i> </a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
<?php
require_once "includes/foot.php";