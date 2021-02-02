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
                if(isset($_SESSION['process-order']) && $_SESSION['process-order']!=""){
                ?>

                <div  id="message" class="alert alert-success" style="font-size: smaller  " >
                    <center>
                        <?php echo $_SESSION['process-order']; ?>
                    </center>
                </div>
            <?php
                    $_SESSION['process-order'] = '';
            }
            ?>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="overview">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-30">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php
                                        $email = $_SESSION['email'];
                                        $soldDataSeller = $objectSeller->viewTotalSoldData();
                                        $totalRevenue = 0;
                                        $saleNumber = 0;
                                        $serial = 0;
                                        if($soldDataSeller){
                                            foreach ($soldDataSeller as $data){
                                                $totalRevenue = $totalRevenue+$data->total_price;
                                                $saleNumber = $saleNumber+$data->sold_counter;
                                                $serial++;
                                            }
                                        }

                                        ?>
                                        <h2> <?php echo $totalRevenue; ?></h2>
                                        <p class="m-b-0">Total Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-30">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2><?php echo $saleNumber; ?></h2>
                                        <p class="m-b-0">Sales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Recent Orders </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Order Number</th>
                                                <th>Amount</th>
                                                <th>Payment Type</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $orders=$objectSeller->viewOrders();

                                            $count = 1;
                                            if($orders){
                                                foreach($orders as $order){

                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count; ?>
                                                        </td>
                                                        <td><?php echo $order->client_fname; ?></td>
                                                        <td><?php echo $order->client_phone; ?></td>
                                                        <td><?php echo $order->order_number;  ?></td>
                                                        <td><?php echo $order->paid_amount; ?></td>
                                                        <td><?php echo $order->paid; ?></td>
                                                        <td>
                                                            <?php if($order->delivered=='processing'): ?>
                                                                <a href="delivery_complete.php?order_number=<?php echo $order->order_number ?>" class="delivery-complete text-success">Complete</a>
                                                            <?php else: ?>
                                                                <a href="delivery_process.php?order_number=<?php echo $order->order_number ?>" class="delivery-process text-warning">Process</a>
                                                            <?php endif; ?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Orders Completed </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Order Number</th>
                                                <th>Amount</th>
                                                <th>Payment Type</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $orders=$objectSeller->viewOrdersCompleted();

                                            $count = 1;
                                            if($orders){
                                                foreach($orders as $order){

                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count; ?>
                                                        </td>
                                                        <td><?php echo $order->client_fname; ?></td>
                                                        <td><?php echo $order->client_phone; ?></td>
                                                        <td><?php echo $order->order_number;  ?></td>
                                                        <td><?php echo $order->paid_amount; ?></td>
                                                        <td><?php echo $order->paid; ?></td>

                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <!-- /# column -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="year-calendar"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->


  <?php
  include_once "includes/foot.php";
