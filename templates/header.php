    <?php
    $logo = get_field('logo', 'option');
    $menu_links = get_field('menu_links', 'option');
    $header_button = get_field('header_button', 'option');




    $event = get_field('select_event', 'option');
    if ($event):
        $event_id = $event->ID;
        $event_title = get_the_title($event_id);
    endif;
    ?>

    <header class="header position-fixed top-0 start-0 w-100 transition">
        <div class="header-notice position-relative bg-ACFCFE d-flex justify-content-lg-center">
            <div class="roboto-regular font14 leading19 res-font10 space-0_14  text-172426 d-flex align-items-center">
                Upcoming event: <span class="roboto-medium"> <?php echo $event_title; ?></span>
            </div>
            <div
                class="d-flex align-items-center justify-content-end position-absolute h-100 top-0 end-0 pe-lg-3 me-lg-2">
                <div class="header-close-icon d-inline-flex align-items-center me-lg-2 cursor-pointer">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/notice-close.svg" alt="" class="h-100">
                </div>
            </div>
        </div>
        <div class="nav bg-white position-relative">
            <div class="container h-100">
                <div class="h-100 d-flex flex-lg-row flex-column align-items-lg-center justify-content-between">
                    <div class="menu-icons d-flex align-items-center justify-content-between">
                        <a href="<?php echo get_home_url(); ?>" class="header-logo">
                            <img src="<?php echo $logo; ?>" alt="" class="h-100">
                        </a>
                        <div class="menu-icon d-lg-none d-flex flex-column justify-content-between">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <ul
                        class="main-menus h-100 list-none ps-0 mb-0 d-lg-flex d-none align-items-lg-center flex-column flex-lg-row tpb-80 tmt-75">

                        <?php foreach ($menu_links as $menu_link_single) :
                            $link_type = $menu_link_single['link_type'];
                            $single_link = $menu_link_single['single_link'];
                            $sub_menu = $menu_link_single['sub_menu'];
                            $sub_menu_links = $menu_link_single['sub_menu_links'];
                            $sub_menu_content = $menu_link_single['sub_menu_content'];

                            $banner_image = $sub_menu_content['banner_image'];
                            $banner_heading = $sub_menu_content['banner_heading'];
                            $banner_link = $sub_menu_content['banner_link'];
                        ?>

                            <?php if ($link_type == "sub_link") : ?>

                                <div class="menu-wrapper mx-2 dmt-35 tmt-0 dpb-35">
                                    <li class="main-menu px-xl-2 d-flex align-items-center">
                                        <a href="javascript:void(0)"
                                            class="text-decoration-none roboto-medium font16 leading21 space-0_16 res-font20 text-172426 text-capitalize">
                                            <?php echo $sub_menu; ?>
                                        </a>
                                        <div class="down-arrow ms-2 d-inline-flex">
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/down-arrow.svg" alt="" class="h-100">
                                        </div>
                                    </li>
                                    <div class="sub-menus-part position-absolute p-initial top-100 start-0 w-100">
                                        <div class="container px-p-0">
                                            <div
                                                class="sub-menu-content col-lg-8 mx-auto bg-white radius20 tpt-25 tpb-30 dpt-50 dpb-60 px-lg-5">
                                                <div class="d-flex flex-lg-row flex-column justify-content-between px-lg-3">
                                                    <div class="col-lg-4">
                                                        <div
                                                            class="roboto-regular font18 leading18 space-0_18 text-1724264D dmb-15 tmb-35 d-lg-flex d-none">
                                                           <?php echo $sub_menu; ?>
                                                        </div>
                                                        <ul class="sub-menus list-none ps-0 mb-0">
                                                            <?php foreach($sub_menu_links as $sub_menu_link) :
                                                                $sub_menu_link_single = $sub_menu_link['link'];
                                                                ?>
                                                            <li class="dmb-15">
                                                                <a href="<?php echo $sub_menu_link_single['url']; ?>"
                                                                    class="text-decoration-none roboto-regular font18 leading18 space-0_18 res-font16 res-space-0_16 text-172426">
                                                                    <?php echo $sub_menu_link_single['title']; ?>
                                                                </a>
                                                            </li>
                                                           <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-8 ps-lg-4">
                                                        <div
                                                            class="header-banner bg-172426 radius20 d-flex align-items-center position-relative tmt-25">
                                                            <div class="position-relative z-2">
                                                                <div
                                                                    class="basker-regular  font30 leading32 space-03 text-white dmb-15 tmb-25">
                                                                   <?php echo $banner_heading; ?>
                                                                </div>
                                                                <div>
                                                                    <a href="<?php echo $banner_link['url']; ?>"
                                                                        class="btnA bg-white-btn roboto-medium font16 space-0_16 radius5 text-decoration-none d-inline-flex justify-content-center align-items-center transition">
                                                                        <?php echo $banner_link['title']; ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="header-banner-icon position-absolute bottom-0 end-0 z-1">
                                                                <img src="<?php echo $banner_image; ?>" alt=""
                                                                    class="h-100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($link_type == "single_link") : ?>
                                <div class="mx-2 dmt-35 tmt-0 dpb-35">
                                    <li class="px-xl-2 d-flex align-items-center">
                                        <a href="  <?php echo $single_link['url']; ?>"
                                            class="text-decoration-none roboto-medium font16 leading21 space-0_16 res-font20 text-172426 text-capitalize">
                                            <?php echo $single_link['title']; ?>
                                        </a>
                                    </li>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </ul>
                    <div class="d-lg-flex d-none">
                        <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                            href="<?php echo $header_button['url']; ?>">
                           <?php echo $header_button['title']; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>