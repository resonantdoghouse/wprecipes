(function ($) {

    /**
     * Favourite Button
     */
    if ($('.wprecipes__favourites__btn').length) {

        $('.wprecipes__favourites__btn').on('click', function (e) {

            e.preventDefault();

            var wprecipes_post_id = $(this).data('id');

            $.ajax({
                url: wprecipes_favourite.ajax_url,
                method: 'POST',
                data: {
                    action: 'wprecipes_favourite',
                    security: wprecipes_favourite.check_nonce,
                    post_id: wprecipes_post_id
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', wprecipes_favourite.check_nonce);
                }
            })
                .done(function (response) {

                    $(this).hide();

                })
                .fail(function (jqXHR, textStatus) {

                    console.log("Request failed: " + textStatus);

                });

        });
    }


})(jQuery);