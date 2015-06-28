(function() {

    'use strict';

    $(document).ready(function() {

        // Enable dropdown menus for desktop
        $("#main-nav .menu-item-has-children").hover(function() {
            $(this).toggleClass('menu-item-active');
        });

        // Enable toggle for mobile nav
        $("#menu-toggle").click(function() {
            if(!$("body").hasClass('is-showing-mobile-nav')) {

                $("body").toggleClass('is-showing-mobile-nav');
                $("#main-content-wrapper").delay(300).queue(function(next) {
                    
                    $(this).toggle();
                    next();
                });
                $("footer").delay(300).queue(function(next) {
                    $(this).toggle();
                    next();
                });

            } else {

                $("#main-content-wrapper").toggle();
                $("footer").toggle();

                $("body").delay(100).queue(function(next) {
                    $(this).toggleClass('is-showing-mobile-nav');
                    next();
                });
            }
        });

        // Enable toggles for sub-navs for mobile nav

        $("#mobile-nav li.menu-item-has-children").each(function() {
            var $span = $("<span />", {
                'class': 'glyphicon glyphicon-thin-chevron',
                'aria-hidden': 'true'
            });

            var $spanSR = $("<span />", {
                'class': 'sr-only',
                'value': 'Toggle sub-menu.'
            });

            var $button = $("<button />", {
                'type': 'button'
            });

            $button.append($span).append($spanSR);
            $(this).css('position','relative');
            $(this).append($button);
        });

        $("#mobile-nav button").click(function() {
            $(this).toggleClass('is-open');
            $(this).parent().find('ul.sub-menu').slideToggle('300');
        });

        $(window).resize(function() {
            var width = $(this).width();
            if(width > 767) {
                $("body").removeClass('is-showing-mobile-nav');
                $("#main-content-wrapper").show();
                $("footer").show();
            }
        });

    });

})();