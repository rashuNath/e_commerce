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
<!--            --><?php // if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>
<!---->
<!--                <div  id="message" class="form button"   style="font-size: smaller  " >-->
<!--                    <center>-->
<!--                        --><?php //if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
//                            echo "&nbsp;".Message::message();
//                        }
//                        Message::message(NULL);
//                        ?><!--</center>-->
<!--                </div>-->
<!--            --><?php //} ?>
            <div class="tab-content">
                <div  class="tab-pane show active" id="pending-order">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>type/transaction id</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $objectAuth = new Auth();
                                $viewOrders = $objectSeller->viewOrders();

                                $serial=1;
                                foreach($viewOrders as $singleOrder){
                                 ?>
                                <tr>
                                    <td>
                                        <?php echo $serial; ?>
                                    </td>
                                    <td><?php echo $singleOrder->client_fname; ?></td>
                                    <td><?php echo $singleOrder->client_phone; ?></td>
                                    <td><?php echo $singleOrder->paid; ?></td>
                                    <td><a href="" </td>
                                </tr>
                                <?php
                                    $serial++;
                                }
                                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>


            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
<?php
require_once "includes/foot.php";