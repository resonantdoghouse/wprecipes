(function ($) {

    /**
     * Nav Toggle for mobile
     */
    var $navToggle = $('#wprecipes-nav-toggle');

    $navToggle.on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('wprecipes__toggle-button--open');
        $('.wprecipes__nav').toggleClass('wprecipes__nav--open');
    });

    /**
     * Single Recipe
     *
     * Change recipe values
     * local storage of values if changed
     * print recipe
     */
    if ($('.single-recipe').length) {

        /**
         * Quantity Increase Decrease
         */
        var $increaseRecipe = $('#wprecipes-increase-recipe'),
            $decreaseRecipe = $('#wprecipes-decrease-recipe');

        function modifyRecipeAmount(increment) {

            if (increment == 'increase') {

                // quantityIntVal ++;
                var $quantity = $('.wprecipes__recipe__items__item__quantity');

                $.each($quantity, function () {
                    var currentVal = $(this).html().trim();
                    var newVal = currentVal * 2;
                    $(this).html(newVal);
                });

            }

            else if (increment == 'decrease') {

                var $quantity = $('.wprecipes__recipe__items__item__quantity');

                $.each($quantity, function () {
                    var currentVal = $(this).html().trim();
                    var newVal = currentVal / 2;
                    $(this).html(newVal);
                });

            }
        }

        $increaseRecipe.on('click', function () {
            modifyRecipeAmount('increase');
        });


        $decreaseRecipe.on('click', function () {
            modifyRecipeAmount('decrease');
        });

    }

    /**
     * Owl Carousel
     */
    if ($('.owl-carousel').length) {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    }

})(jQuery);