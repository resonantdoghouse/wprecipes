(function ($) {

    var postId = wprecipes_rest_obj.post_id;
    var localStorageName = 'recipeQuantityMod' + postId;

    console.log(localStorageName);

    /**
     * Local Storage
     * check local storage capabilities
     */
    if (typeof (Storage) !== "undefined") {
        console.log('local storage allowed.');
    } else {
        alert('Sorry! No Web Storage support.');
    }

    // if local storage
    if (localStorage.getItem('localStorageName')) {
        var storedRecipeQuantityMod = localStorage.getItem('localStorageName');

        $('.wprecipes__recipe__items__item__quantity').html(storedRecipeQuantityMod);

    } else {
        localStorage.setItem(localStorageName, 1);
    }

    var $navToggle = $('#wprecipes-nav-toggle'),
        $increaseRecipe = $('#wprecipes-increase-recipe'),
        $decreaseRecipe = $('#wprecipes-decrease-recipe');

    $navToggle.on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('wprecipes__toggle-button--open');
        $('.wprecipes__nav').toggleClass('wprecipes__nav--open');
    });

    function modifyRecipeAmount(increment) {
        var $quantity = $('.wprecipes__recipe__items__item__quantity').html();
        var quantity = parseInt($quantity);

        if (increment == 'increase' && quantity < 100) {
            quantity++;
            $('.wprecipes__recipe__items__item__quantity').html(quantity);

            localStorage.setItem('localStorageName', quantity);
        }
        else if (increment == 'decrease' && quantity > 1) {
            quantity--;
            $('.wprecipes__recipe__items__item__quantity').html(quantity);

            localStorage.setItem('localStorageName', quantity);
        }

        console.log(parseInt(quantity));
    }

    $increaseRecipe.on('click', function () {
        modifyRecipeAmount('increase');
    });


    $decreaseRecipe.on('click', function () {
        modifyRecipeAmount('decrease');
    });


})(jQuery);