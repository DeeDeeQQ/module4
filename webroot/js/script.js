function autocomplete() {
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#searchHeader').val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: '/tag/search',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('#list_id').show();
                $('#list_id').html(data);
            }
        });
    } else {
        $('#list_id').hide();
    }
}

// set_item : this function will be executed when we select an item
function set_item(item) {
    // change input value
    $('#searchHeader').val(item);
    // hide proposition list
    $('#list_id').hide();
}


(function ($) {
    $(function () {
        if (!$.cookie('smartCookies')) {

            function getWindow() {
                $('#boxUserFirstInfo').arcticmodal({
                    closeOnOverlayClick: true,
                    closeOnEsc: true
                });
                $.cookie('smartCookies', true, {
                    expires: 7,
                    path: '/'
                });
            };
            setTimeout(getWindow, 7000);
        }
    })
})(jQuery);