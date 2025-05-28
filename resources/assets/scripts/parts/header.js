export class Header {
    init() {
        this.ActiveHoverState();
        this.MenuIconActive();
    }

    ActiveHoverState() {
        $(document).ready(function () {
            $('.sub-menus-part').addClass('d-none');

            $('.menu-wrapper').each(function () {
                if ($(this).find('.sub-menus-part').length > 0) {
                    $(this).hover(
                        function () {
                            $(this).addClass('active');
                            $(this).find('.sub-menus-part').removeClass('d-none');
                            $('body').addClass('body-background overflow-hidden');
                        },
                        function () {
                            $(this).removeClass('active');
                            $(this).find('.sub-menus-part').addClass('d-none');
                            $('body').removeClass('body-background overflow-hidden');
                        }
                    );
                }
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
}