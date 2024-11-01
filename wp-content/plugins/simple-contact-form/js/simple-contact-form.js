$ = jQuery;
var nonce = '<?php echo wp_create_nonce("wp_rest"); ?>';
$(document).ready(function($) {
    $('#simple-contact-form__form').submit(function(event) {
        event.preventDefault();
        var form =$(this).serialize();
        console.log(form);
        
        $.ajax({
            method:'post',
            url: '<?php echo get_rest_url(null,"simple-contact-form/v1/send-email");?>',
            headers:{ 'X-WP-Nonce' : nonce},
            data:form 
        })
    });
});