/**
 * Created by istiaq.nexabd on 5/8/2018.
 */
$(document).ready(function () {

    if($('.proceed-to-checkout').length>0){
        $('.proceed-to-checkout').on('click',function () {
            var self = $(this);
            self.closest('.checkout-form').find('.address-form').show();
        });
    }
});

