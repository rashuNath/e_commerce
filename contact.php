<?php
include_once('header.php');
$categories = $objectSeller->viewAllMethod('item_category');
?>


	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form class="leave-comment" method="post" action="contact_process.php" id="comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name" id="commentor-name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Phone Number" id="phone-number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address" id="email">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message" id="message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" value="Send" name="leave-comment" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>


	<?php include_once('footer.php')?>

<script type="text/javascript" src="assets/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var form = $('#comment');
        var formData = $(form).serialize();
        var commentorName = $('#commentor-name').val();
        var phone = $('#phone-number').val();
        var email = $('#email').val();
        var message = $('#message').val();
        console.log('hello');
        console.log(formData);
        var span = document.createElement("span");
        $(span).addClass('style-span');

        var spanFail = document.createElement("span");
        $(spanFail).addClass('style-span');
        span.innerHTML = "We appreciate your thoughts!";
        $(form).submit(function (event) {
            event.preventDefault();
            $.ajax({
                type:'POST',
                url:$(this).attr('action'),
                data:formData
            })
                .done(function (response) {
                    swal({
                        title:"Thank You",
                        content:span
                    });
                    alert(response);
                })
                .fail(function (error) {
                    swal({
                        title:"Sorry!",
                        content:spanFail
                    });
                });

        });
    });

</script>

