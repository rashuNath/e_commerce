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
            if(isset($_SESSION['category-updated']) && $_SESSION['category-updated']!=""){
                ?>

                <div  id="message" class="alert alert-success" style="font-size: smaller  " >
                    <center>
                        <?php echo $_SESSION['category-updated']; ?>
                    </center>
                </div>
                <?php
                $_SESSION['category-updated'] = '';
            }
            ?>
            <div class="tab-content">
                <div class="tab-pane show active" id="update-category">

                    <?php
                    $sellerId = $singleUser->user_id;
//                    $products = $objectSeller->categoryViewBySellerId($sellerId);
                    $products = $objectSeller->viewCategory();

                    if($products==FALSE){
                        echo "Yoh have not added any category yet!";
                    }else{
                        ?>
                        <table style="width: 100%">
                            <thead>
                            <tr style="text-align: center">
                                <td>
                                    Picture
                                </td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <?php
                            foreach ($products as $product) {
                                ?>

                                <tr style="text-align: center">
                                    <td><img style="width:50px;margin-bottom:10px;" src="../Upload/<?php echo $product->picture;?>"></td>
                                    <td><?php echo $product->category_name;?></td>
                                    <td><a href="category_update.php?categoryId=<?php echo $product->category_id; ?>">Update</a></td>
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