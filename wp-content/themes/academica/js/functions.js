/**
 * Theme functions file
 */
(function ($) {
    var $document = $(document);
    var $window = $(window);


    /**
    * Document ready (jQuery)
    */
    $(function () {

        /**
         * Activate superfish menu.
         */
        
        /** commented out due to bug - hover does not dropdown submenus
        
        $('.sf-menu').superfish({
            'speed': 'fast',
            'delay' : 0,
            'animation': {
                'height': 'show'
            }
        });
        */
       	

        /**
         * Activate jQuery.mmenu.
         */
        $("#menu-main-slide").mmenu({
            slidingSubmenus: false
        })

    });

})(jQuery);
