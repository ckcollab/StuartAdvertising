/*
 * - User comes to page, we load all rows on the page
 * - User scrolls down, check if page scroll/middle of screen > any row
 * - If row is middle of screen:
 *    * fade in year, year_number, year_bar
 *    * fade in image
 *    * slide in left text and right text
 * -
 *
 */







var scrolly = function() {
    var $rows = undefined;
    var $rowsInView = undefined;
    var $rowsOutOfView = undefined;

    /*
     * Adds 'element:inviewport' jQuery selector
     */
    var defineViewport  = function() {
        $.extend($.expr[':'], {
            inviewport: function(element) {
                return $(element).offset().top < $(window).height() * .80;
            }
        });
    };

    /*
     * Set rows in view/out of view
     */
    var setViewRows = function() {
        $rowsInView = $rows.filter(':inviewport');
        $rowsOutOfView = $rows.not($rowsInView);
    };

    /*
     *
     */
    var onResize = function(event) {
        setViewRows();
    };

    /*
     *
     */
    var onScroll = function(event) {
        setViewRows();

        setTimeout( function() {
            prepareInView();
            prepareNotInView();
        }, 10 );
    };

    var prepareInView = function() {
        $rowsInView.each(function() {
             //$(this).css({'left': '0%'});
            $(this).find('.timeline_year_and_junk').fadeIn();
            $(this).find('.dots').css({'visibility': 'visible'});
        });
    };

    var prepareNotInView = function() {
        var winScroll = $(window).scrollTop();
        var winCenter = $(window).height() / 2 + winScroll;

        $rowsOutOfView.each( function(i) {
            var $row = $(this);
            var $rowL = $row.find('.left_text');
            var $rowR = $row.find('.right_text');
            var rowT = $row.offset().top + 100;

            // hide the row if it is under the viewport
            if( rowT > $(window).height() + winScroll ) {
                $rowL.css({left: '-50%'});
                $rowR.css({right: '-50%'});
            } else {
                var rowH = $row.height();
                var factor = (((rowT + rowH / 2) - winCenter) / ($(window).height() / 3 + rowH / 2));
                var val = Math.max(factor * 50, 0);

                if( val <= 0 ) {
                    $row.find('.dots').css({'visibility': 'visible'});
                    $row.find('.timeline_year_and_junk').fadeIn();
                } else {
                    $row.find('.dots').css({'visibility': 'hidden'});
                    $row.find('.timeline_year_and_junk').fadeOut();
                }

                console.log(val);

                $rowL.css({left: - val + '%'});
                $rowR.css({right: - val + '%'});
            }
        });
    };

    /*
     * Sets up page to be scrolly!
     */
    var init = function() {
        $rows = $('.timeline_entry');

        defineViewport();
        setViewRows();

        $(window).on({
            //'resize.Scrolling' : onResize,
            'scroll.Scrolling' : onScroll
        });

        // Init by calling our scroll handler
        onScroll();
    };

    return {
        init: init
    };
};
