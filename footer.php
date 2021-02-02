<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w pb-4">
        <div class="col-sm-3 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                GET IN TOUCH
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
                </p>

                <div class="flex-m p-t-30">
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                </div>
            </div>
        </div>

        <div class="col-sm-3 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Categories
            </h4>

            <ul>
                <?php if($categories): ?>
                <?php foreach ($categories as $category): ?>
                    <li class="p-b-9">
                        <a href="category.php?categoryId=<?php echo $category->item_category_id ?>&categoryName=<?php echo $category->name;?>&catItem=item_category_id" class="s-text7 text-capitalize">
                            <?php echo $category->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="col-sm-3 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Links
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        About Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Contact Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-sm-3 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Newsletter
            </h4>

            <form>
                <div class="effect1 w-size9">
                    <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                    <span class="effect1-line"></span>
                </div>

                <div class="w-size2 p-t-20">
                    <!-- Button -->
                    <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                        Subscribe
                    </button>
                </div>

            </form>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
            <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
            <div class="video-mo-01">
                <iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php
function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}
?>

<!--===============================================================================================-->
<script type="text/javascript" src="assets/jquery/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/jqueryui/jquery-ui.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/slick/slick.min.js"></script>
<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="assets/sweetalert/sweetalert.min.js"></script>
<script src="js/main.js"></script>
<script src="js/custom-js.js"></script>

<script>

    $(document).ready(function () {
        $('.payment-type-select').change(function () {
            var selectedOption = $( ".payment-type-select option:selected" ).text();
            if(selectedOption==="Bikash Delivery"){
                $('.box').removeClass('display-none');
            }else{
                $('.box').addClass('display-none');
            }
        });
    });

    $('.remove-from-cart').on('click',function () {
        console.log('clicked');
        var self = $(this),
            cartId = self.closest('td').find('.cart-id').val(),
            userId = $('.user-id').val();
        console.log(cartId);
        $.post(
            '<?php echo url(); ?>/e_commerce/delete_product.php',
            {
                deleteProduct:'deleteProduct',
                cartId:cartId,
                userId:userId
            },
            function(data)
            {
                var obj = JSON.parse(data);
                console.log(obj.status);
                if(obj.status){
                    location.reload();
                }
            }
        );
    })

    // PRICE SLIDER
    $( function() {
        var lowPrice = $('#low-price').val();
        var highPrice = $('#high-price').val();
        if(lowPrice!==""){
            lowPrice = parseInt(lowPrice);
        }else{
            lowPrice=500;
            $('#low-price').val(lowPrice);
        }

        if(highPrice!==""){
            highPrice=parseInt(highPrice);
        }else {
            highPrice=20000;
            $('#high-price').val(highPrice);
        }
        if($('#slider-range').length>0){
            $( "#slider-range" ).slider({
                range: true,
                min: 500,
                max: 20000,
                values: [lowPrice, highPrice ],
                slide: function( event, ui ) {
                    $( "#low-price" ).val( ui.values[ 0 ]);
                    $("#high-price").val(ui.values[1]);
                }
            });
        }
    } );
    // PRICE SLIDER


</script>
</body>
</html>