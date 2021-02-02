<?php
/**
 * Date: 11/19/2020
 * Time: 5:47 PM
 */
?>
<!-- footer -->
<footer class="footer"> © 2018 All rights reserved.</footer>
<!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->

<!-- All Jquery -->
<script src="js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->


<!-- Amchart -->
<script src="js/lib/morris-chart/raphael-min.js"></script>
<script src="js/lib/morris-chart/morris.js"></script>
<script src="js/lib/morris-chart/dashboard1-init.js"></script>


<script src="js/lib/calendar-2/moment.latest.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/semantic.ui.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/prism.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.init.js"></script>

<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
<script src="js/scripts.js"></script>
<!-- scripit init-->

<script src="js/custom.min.js"></script>

<script src="../js/jquery.form.min.js"></script>

<script src="../js/custom-js.js"></script>

<script>
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    // Acá guarda el index al cual corresponde la tab. Lo podés ver en el dev tool de chrome.
    var activeTab = localStorage.getItem('activeTab');

    // En la consola te va a mostrar la pestaña donde hiciste el último click y lo
    // guarda en "activeTab". Te dejo el console para que lo veas. Y cuando refresques
    // el browser, va a quedar activa la última donde hiciste el click.
    console.log(activeTab);

    if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show');
    }

    setTimeout(function () {
        $('.message-container').find('.alert').remove();
    },5000);
</script>

</body>

</html>