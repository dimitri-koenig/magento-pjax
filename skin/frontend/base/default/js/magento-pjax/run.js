(function($) {
    var pjaxOptions = {
        maxCacheLength: 0,
        timeout: 2500
    };

    $(document).pjax('[data-pjax] a, a[data-pjax]', 'body', pjaxOptions);
})(jQuery);