export class Header {
    init() {
        this.ActiveHoverState();
        this.MenuIconActive();
        this.HeaderFixed();
        this.HeaderNotice();
    }

    ActiveHoverState() {
        $(document).ready(function () {
    $('.sub-menus-part').addClass('d-none');

    $('.menu-wrapper').each(function () {
        const $wrapper = $(this);
        const $submenuPart = $wrapper.find('.sub-menus-part');
        const $submenuContent = $submenuPart.find('.sub-menu-content');
        let submenuTimeout;

        // Create a unified area that includes both wrapper and submenu content
        $wrapper.on('mouseenter', function () {
            clearTimeout(submenuTimeout);
            $('.menu-wrapper').removeClass('active'); // close others
            $('.sub-menus-part').addClass('d-none');
            $('body').addClass('body-background overflow-hidden');

            $wrapper.addClass('active');
            $submenuPart.removeClass('d-none');
        });

        $wrapper.on('mouseleave', function () {
            submenuTimeout = setTimeout(function () {
                $wrapper.removeClass('active');
                $submenuPart.addClass('d-none');
                $('body').removeClass('body-background overflow-hidden');
            }, 100);
        });

        $submenuContent.on('mouseenter', function () {
            clearTimeout(submenuTimeout);
        });

        $submenuContent.on('mouseleave', function () {
            submenuTimeout = setTimeout(function () {
                $wrapper.removeClass('active');
                $submenuPart.addClass('d-none');
                $('body').removeClass('body-background overflow-hidden');
            }, 100);
        });
    });
        });
    }

    MenuIconActive() {
        $(document).ready(function () {
            if ($(window).width() < 768) {
                $('.menu-icon').on("click", function () {
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.main-menus').removeClass('d-flex').addClass('d-none');
                        $('.nav').removeClass('nav-full');
                    } else {
                        $(this).addClass('active');
                        $('.main-menus').removeClass('d-none').addClass('d-flex');
                        $('.nav').addClass('nav-full');
                    }
                });

                $('.main-menu').on("click", function (e) {
                    e.stopPropagation();
                    $('.menu-wrapper').removeClass("active");
                    $(this).closest('.menu-wrapper').addClass("active");
                });
            }
        });
    }

    HeaderFixed() {
        // header fixed js
        var prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
        $(window).scroll(function () {
            var sticky = $(".header"),
                scroll = $(window).scrollTop();
            if (scroll >= 50) {
                sticky.addClass("header-fixed");
                sticky.removeClass("header-fixed-os");
            }
            else {
                sticky.removeClass("header-fixed");
                sticky.addClass("header-fixed-os");
            }
            var currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
            if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
                $(".header").removeClass("hidden");
            } else {
                $(".header").addClass("hidden");
            }
            prevScrollPos = currentScrollPos;
        });
    }

    HeaderNotice(){
        $('.header-close-icon').on('click', function() {
            $('.header-notice').addClass('d-none');
        });
    }
}