/*!Minified and unminified versions of this file are located in the same directory. Access unminified version by replacing the .min.js extension with .js*/

jQuery(document).ready(function ($) {
    

    
    $('#wp-and-divi-icons-free-notice .notice-dismiss'
    ).on('click', function () {
        jQuery.post(ajaxurl, {action: 'ds-icon-expansion_notice_hide'})
    });
    
});