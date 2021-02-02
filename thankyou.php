<?php
include_once ('header.php');
$orderDetails = $objectSeller->order_details_by_orderid($_SESSION['orderNumber']);
?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
    <h2 class="l-text2 t-center">
        Thanks
    </h2>
</section>

<?php
$cartItems = $objectSeller->cartView($currentUserId);
//    var_dump($cartItems);
?>


<!-- Cart -->
<section class="text-center cart bgwhite p-t-70 p-b-100">
    <i class="fa fa-check-circle" style="font-size:80px; color:#00aa88"></i>
   <h1 style="margin-bottom:30px;">Thank You!</h1>

    <h4 style="margin-bottom:15px;">Your order has been recieved.</h4>






    <div class="row" style="padding-top:50px;width:800px; margin: 0 auto;">
        <div class="col-sm-6">
            <h2 style="margin-bottom:20px;">Pickup Location</h2>
            <h5 style="margin-bottom:8px">Name : <span style="font-size:18px"><?php echo $orderDetails[0]->client_fname ." ".$orderDetails[0]->client_lname;
            ?></span></h5>
            <h5 style="margin-bottom:8px">Phone: <span style="font-size:18px"><?php echo $orderDetails[0]->client_phone  ?></span></h5>

            <h5 style="margin-bottom:8px">Address: <span style="font-size:18px"><?php echo $orderDetails[0]->client_address ?></span></h5>
        </div>
        <div class="col-sm-6">
            <h2 style="margin-bottom:20px;">Payment Method:</h2>
            <h5 style="margin-bottom:8px">Order Number: <span style="font-size:18px;"><?php
                    echo $orderDetails[0]->order_number;
                ?></span> </h5>
            <h5> <?php echo $orderDetails[0]->paid ?></h5>

        </div>
    </div>

    <div class="order-details container" style="padding-top:30px">
        <div class="table-div" style="width:500px; margin:0 auto;">
            <table class="table-responsive" style="width:100%;">
                <tr>
                    <td><h4>Serial</h4></td>
                    <td><h4>Product Name</h4></td>
                    <td><h4>Quantity</h4></td>
                    <td><h4>Price</h4></td>
                </tr>
                <?php
                $allProduct = $objectSeller->order_details_productbyproduct_by_orderid($_SESSION['orderNumber']);
                    $serial = 1;
                    $totalPrice =0;
                    foreach($allProduct as $order){
                        $singleProduct = $objectSeller->singleProductViewByProductId($order->product_id);
                        ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $singleProduct->product_name;  ?></td>
                            <td><?php echo $order->sold_counter; ?></td>
                            <td><?php echo $order->total_price; ?></td>
                        </tr>
                <?php
                        $totalPrice = $totalPrice+$order->total_price;
                        $serial++;
                    }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td><?php echo $totalPrice ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div style="padding-top:50px;">
        <h4>Your products will be arrived to your address in between 3-5 days.</h4>

<!--        <h4 style="text-decoration: underline">Please visit your <strong>Mail Inbox</strong> for further information.</h4>-->

        <h2 style="margin-top:30px;">Happy Shopping!</h2>
        <a href="product.php">back to the shop!</a>
    </div>





</section>



<?php
include_once ('footer.php');
?>

</body>
</html>
