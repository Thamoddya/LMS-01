(function($) {

    $.fn.visible = function(partial) {
        var $t = $(this),
            $w = $(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height(),
            _top = $t.offset().top,
            _bottom = _top + $t.height(),
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };

    function handleVisibility() {
        $(".fluid-section-one .content-column, .testimonial-section .authors-box .author-one, .testimonial-section .authors-box .author-two, .testimonial-section .authors-box .author-three, .testimonial-section .authors-box .author-four, .testimonial-section .authors-box .author-five, .testimonial-section .authors-box .author-six, .testimonial-section .authors-box .author-seven, .testimonial-section .authors-box .author-eight").each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("now-in-view");
            } else {
                el.removeClass("now-in-view");
            }
        });
    }

    $(document).ready(handleVisibility);
    $(window).on('scroll', handleVisibility);

})(jQuery);
