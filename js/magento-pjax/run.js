(function($) {
	var pjaxOptions = {
		maxCacheLength: 0,
		timeout: 2500
	};

	$(document).pjax('a', 'body', pjaxOptions);
})(jQuery);