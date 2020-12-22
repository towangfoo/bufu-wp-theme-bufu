jQuery(document).ready(function(){
    jQuery(window).load(function(){
        var h = '#' + location.hash.replace('#','');
        if (h !== '#') {
            jQuery(h).find('button').click();
            jQuery('html, body').animate({ scrollTop: jQuery(h).offset().top}, 500);
        }
    });

    jQuery('ol a').click(function(e) {
        var h = jQuery(this).attr('href');
        if (/^#track[\d]+$/.test(h)) {
            jQuery(h).find('button').click();
            jQuery('html, body').animate({ scrollTop: jQuery(h).offset().top}, 500);
        }
    });
});