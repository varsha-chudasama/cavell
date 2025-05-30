<?php


/* Template Name: Page Builder */
$flexibleContent = get_field('flexible_content');

?>
<?php if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) :
        the_row();
        if (get_row_layout() == 'hero_section') :
            $heading = get_sub_field('heading');
            $show_page_title = get_sub_field('show_page_title');
            $content = get_sub_field('content');
            $buttons = get_sub_field('buttons');
            $back_link = get_sub_field('back_link');
            $custom_label = get_sub_field('custom_label');


?>

            <section class="full-text-card-section">
                <div class="container">
                    <div class="full-text-card dpt-70 dpb-65 radius20">
                        <div class="col-10 mx-auto text-center">
                            <?php if ($show_page_title == "yes") : ?>
                                <?php if (!empty($back_link['url'])):
                                    $target_2 = ($back_link['target'] == '_blank') ? "_blank" : ""; ?>
                                    <a href="<?php echo $back_link['url']; ?>" target="<?php echo $target_2; ?>"
                                        class="bg-prefix bg-00DCC8-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-white radius5 d-inline-flex me-2 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                        <?php echo $back_link['title']; ?>
                                    </a>
                                <?php endif; ?>
                                <div
                                    class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-white radius5 d-inline-block me-2 dmb-20 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                    <?php echo get_the_title(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_page_title == "custom") : ?>

                                <div
                                    class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-white radius5 d-inline-block me-2 dmb-20 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                    <?php echo $custom_label; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($heading)): ?>
                                <div class="basker-regular font76 leading80 text-white dmb-20 res-font35 res-leading44 res-space-0_35 wow animated animate__fadeInUp" data-wow-duration=".5s"><?php echo $heading; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($content)): ?>
                                <div class="roboto-regular font20 leading28 space-02 text-white dmb-20 col-lg-10 col-12 mx-auto res-font16 res-leading24 space-0_16 tmb-40 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($buttons)): ?>
                                <?php foreach ($buttons as $button_single) :
                                    $link_single = $button_single['link'];
                                ?>
                                    <?php if (!empty($link_single['url'])):
                                        $target_2 = ($link_single['target'] == '_blank') ? "_blank" : ""; ?>
                                        <a class="btnA bg-00DCC8-btn roboto-medium font16 space-0_16 radius5 text-172426 text-decoration-none d-inline-flex justify-content-center align-items-center transition tmb-15 me-2 wow animated animate__fadeInUp" data-wow-duration=".5s"
                                            href=" <?php echo $link_single['url']; ?>" target="<?php echo $target_2; ?>">
                                            <?php echo $link_single['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'link_cards') :
            $number_of_cards = get_sub_field('number_of_cards');
            $heading = get_sub_field('heading');
            $descriptions = get_sub_field('descriptions');
            $single_card = get_sub_field('single_card');
              $prefix_id = get_sub_field('prefix_id');
        ?>
            <?php if ($number_of_cards == "4") : ?>
                <section class="service-cards-slider-section overflow-hidden" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">
                    <div class="container">
                        <div class="col-lg-8 col-10 px-lg-4 mx-auto text-center">
                            <?php if (!empty($heading)): ?>
                                <div class="basker-regular font56 leading60 space-0_56 text-172426 dmb-10 res-font30 res-leading44 res-space-03"><?php echo $heading; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($descriptions)): ?>
                                <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-40 tmb-50"><?php echo $descriptions; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="service-cards-slider col-11 pe-3 pe-lg-0 col-lg-12">
                            <?php if (!empty($single_card)): ?>
                                <?php foreach ($single_card as $single_card_single) :
                                    $single_card_single_icon = $single_card_single['icon'];
                                    $single_card_single_heading = $single_card_single['heading'];
                                    $single_card_single_content = $single_card_single['content'];
                                    $page_link_single = $single_card_single['page_link'];
                                ?>
                                    <a href="<?php echo $page_link_single; ?>"
                                        class="service-card d-inline-block text-decoration-none radius30 transition h-100 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <div>
                                                <div class="service-logo dmb-30 tmb-35 d-flex justify-content-end">
                                                    <img src="<?php echo $single_card_single_icon; ?>" class="h-100" alt="">
                                                </div>
                                                <div class="basker-regular font30 leading44 space-03 text-172426 dmb-10 res-font25 res-leading32"><?php echo $single_card_single_heading; ?></div>
                                                <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-30 tmb-25 pe-3"><?php echo $single_card_single_content; ?></div>
                                            </div>
                                            <?php if (!empty($page_link_single)): ?>
                                                <div class="service-arrow bg-172426 radius10 d-flex justify-content-center align-items-center transition">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/service-arrow.svg" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>


            <?php if ($number_of_cards == "3") : ?>
                <section class="channel-cards-section overflow-hidden" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">
                    <div class="container">
                        <div class="col-lg-8 col-12 px-lg-4 mx-auto text-center dmb-40 tmb-50">
                            <?php if (!empty($heading)): ?>
                                <div class="basker-regular font56 leading60 space-0_56 text-172426 dmb-10 res-font30 res-leading44 res-space-03"><?php echo $heading; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($descriptions)): ?>
                                <div class="roboto-regular font16 leading24 space-0_16 text-172426 "><?php echo $descriptions; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="channel-cards-slider col-11 col-lg-12 pe-3 pe-lg-0">
                            <?php if (!empty($single_card)): ?>
                                <?php foreach ($single_card as $single_card_single) :
                                    $single_card_single_icon = $single_card_single['icon'];
                                    $single_card_single_heading = $single_card_single['heading'];
                                    $single_card_single_content = $single_card_single['content'];
                                    $page_link_single = $single_card_single['page_link'];

                                ?>
                                    <a href="<?php echo $page_link_single; ?>"
                                        class="service-card d-inline-block text-decoration-none radius30 transition h-100">

                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <div>
                                                <div class="service-logo dmb-30 tmb-35 d-flex justify-content-end">
                                                    <img src="<?php echo $single_card_single_icon; ?>" class="h-100" alt="">
                                                </div>
                                                <div class="basker-regular font30 leading44 space-03 text-172426 dmb-10 res-font25 res-leading32"><?php echo $single_card_single_heading; ?></div>
                                                <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-30 tmb-25 pe-3"><?php echo $single_card_single_content; ?></div>
                                            </div>
                                            <?php if (!empty($page_link_single)): ?>
                                                <div class="service-arrow bg-172426 radius10 d-flex justify-content-center align-items-center transition">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/service-arrow.svg" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ($number_of_cards == "2") : ?>
                <section class="our-work-section container" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">
                    <div class="basker-regular font46 leading56 space-0_46 text-172426 dmb-100 tmb-35 text-center col-lg-8 col-10 mx-auto res-font30 res-leading32 res-space-03">
                        <?php echo $heading; ?>
                    </div>
                    <div class="row row8">
                        <?php if (!empty($single_card)): ?>
                            <?php foreach ($single_card as $single_card_single) :
                                $single_card_single_icon = $single_card_single['icon'];
                                $single_card_single_heading = $single_card_single['heading'];
                                $single_card_single_content = $single_card_single['content'];
                                $page_link_single = $single_card_single['page_link'];

                            ?>
                                <div class="col-lg-6 col-12 dmb-20 tmb-10">
                                    <a href="<?php echo $page_link_single; ?>"
                                        class="service-card d-inline-flex flex-column justify-content-between text-decoration-none radius30 res-radius20 transition h-100 w-100">
                                        <div class="service-logo d-flex justify-content-end tmb-25">
                                            <img src="<?php echo $single_card_single_icon; ?>" class="h-100" alt="">
                                        </div>
                                        <div>
                                            <div class="basker-regular font30 leading44 space-03 text-172426 dmb-20 res-font25 res-leading32 res-space-0_25 tmb-10"><?php echo $single_card_single_heading; ?></div>
                                            <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-25"><?php echo $single_card_single_content; ?></div>
                                        </div>
                                        <?php if (!empty($page_link_single)): ?>
                                            <div class="service-arrow bg-172426 radius10 d-flex justify-content-center align-items-center transition">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/service-arrow.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php elseif (get_row_layout() == 'logo_slider') :
            $heading = get_sub_field('heading');
            $link = get_sub_field('link');
            $investors_logos = get_field('investors_logos', 'option');

        ?>
            <section class="logo-slider-section overflow-hidden">
                <div class="container">
                    <?php if (!empty($heading)): ?>
                        <div class="basker-regular font30 space-03 leading32 text-center dmb-40 text-172426 pe-3 pe-lg-0 tmb-25 wow animated animate__fadeInUp" data-wow-duration=".5s"><?php echo $heading; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($investors_logos)): ?>
                        <div class="logo-slider col-7 col-lg-12">
                            <?php foreach ($investors_logos as $investors_logo) : ?>
                                <div class="logo-slide d-flex align-items-center justify-content-center bg-white radius20 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                    <div class="logo-img">
                                        <img src="<?php echo $investors_logo; ?>" alt="logo-img"
                                            class="h-100 w-auto object-fit-contain">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                        <?php if (!empty($link['url'])):
                            $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                            <div class="text-center dpt-35">
                                <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                    href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                    <?php echo $link['title']; ?>
                                </a>
                            <?php endif; ?>
                            </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'insights') :
            $label = get_sub_field('label');
            $heading = get_sub_field('heading');
            $link = get_sub_field('link');
            $select_posts = get_sub_field('select_posts');

        ?>
            <section class="insights-slider-section overflow-hidden">
                <div class="container">
                    <?php if (!empty($label)): ?>
                        <div class="bg-prefix bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block dmb-25 wow animated animate__fadeInUp" data-wow-duration=".5s">
                            <?php echo $label; ?>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between flex-column flex-lg-row align-items-end dmb-50 tmb-40">
                        <?php if (!empty($heading)): ?>
                            <div class="basker-regular font50 leading56 space-05 text-172426 col-lg-7 col-12 res-font30 res-leading44 res-space-03 wow animated animate__fadeInUp" data-wow-duration=".5s"> <?php echo $heading; ?></div>
                        <?php endif; ?>

                        <?php if (!empty($link['url'])):
                            $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>

                            <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-none d-lg-inline-flex justify-content-center align-items-center transition wow animated animate__fadeInUp" data-wow-duration=".5s" href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                <?php echo $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="insights-slider col-11 col-lg-12 pe-2 pe-lg-0 tmb-60">
                        <?php foreach ($select_posts as $select_post_single) :
                            $select_post_single_id = $select_post_single->ID;
                            $select_post_single_title = $select_post_single->post_title;
                            $select_post_single_category = $select_post_single->post_title;
                            $news_content = get_field('news_content', $select_post_single_id);
                        ?>
                            <a href="<?php echo get_permalink($select_post_single_id); ?>" class="insights-card d-inline-flex flex-column justify-content-between text-decoration-none card-hover overflow-hidden w-100 h-100 wow animated animate__fadeInUp" data-wow-duration=".5s">
                                <div>
                                    <div class="insights-card-img radius15 position-relative dmb-20 overflow-hidden">
                                        <img src="<?php echo get_the_post_thumbnail_url($select_post_single_id, 'full'); ?>" class="w-100 h-100 object-cover img" alt="">
                                        <?php
                                        $categories = get_the_category($select_post_single_id);
                                        if (!empty($categories)) :
                                        ?>
                                            <div class="bg-1F6678-blur-prefix roboto-medium font14 leading19 space-0_14 text-white position-absolute top-0 end-0 radius5 m-3 bg-prefix">
                                                <?php echo esc_html($categories[0]->name); ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="roboto-medium font22 leading28 space-0_22 text-172426 dmb-25 col-lg-10 res-font18 res-leading26 res-space-0_18"><?php echo $select_post_single_title; ?></div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div
                                        class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 d-inline-block me-2">
                                        <?php

                                        $total_word_count = 0;
                                        foreach ($news_content as $content_single) {
                                            $content = $content_single['post_content'];
                                            $total_word_count += str_word_count(strip_tags($content));
                                        }

                                        $total_read_time = ceil($total_word_count / 200);
                                        echo $total_read_time . ' min read';
                                        ?>
                                    </div>
                                    <div
                                        class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 d-inline-block me-2">
                                        <?php echo get_the_date('jS M, Y', $select_post_single_id); ?>

                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <?php if (!empty($link['url'])):
                        $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                        <div class="d-flex justify-content-center">
                            <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-lg-none d-inline-flex justify-content-center align-items-center transition"
                                href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                <?php echo $link['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'events_card') :
            $label = get_sub_field('label');
            $heading = get_sub_field('heading');
            $link = get_sub_field('link');
            $event = get_sub_field('select_events');

            if ($event):
                $event_id = $event->ID;
                $event_image = get_the_post_thumbnail_url($event_id, 'full');
                $event_title = get_the_title($event_id);
                $venue_address = tribe_get_address($event_id);
                $venue_city    = tribe_get_city($event_id);
                $event_button = get_field('events_button', $event_id);
                $event_date = tribe_get_start_date($event_id, false, 'Y-m-d H:i:s');
                $event_timestamp = strtotime($event_date);
                $formatted_date = date('d M Y', $event_timestamp);
            endif;

        ?>
            <section class="event-left-right-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-12">
                            <?php if (!empty($label)): ?>
                                <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block dmb-25 tmb-15 wow animated animate__fadeInUp" data-wow-duration=".5s"><?php echo $label; ?></div>
                            <?php endif; ?>

                            <?php if (!empty($heading)): ?>
                                <div class="basker-regular font50 leading56 space-05 text-172426 dmb-40 col-lg-10 col-12 pe-lg-3 res-font25 res-leading32 res-space-0_25 tmb-30 wow animated animate__fadeInUp" data-wow-duration=".5s"><?php echo $heading; ?></div>
                            <?php endif; ?>

                            <?php if (!empty($link['url'])):
                                $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-none d-lg-inline-flex justify-content-center align-items-center transition wow animated animate__fadeInUp" data-wow-duration=".5s"
                                    href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                    <?php echo $link['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="ps-lg-1 tmb-40">
                                <div class="event-left-right-img radius30 res-radius20 overflow-hidden position-relative wow animated animate__fadeInUp" data-wow-duration=".5s">
                                    <img src="<?php echo $event_image; ?>" class="w-100 h-100 object-cover" alt="">
                                    <div class="bg-black-layer position-absolute bottom-0 w-100"></div>
                                    <div class="position-absolute bottom-0 w-100 start-0">
                                        <div class="d-flex justify-content-between align-items-lg-end flex-column flex-lg-row w-100 ps-lg-5 pe-lg-4 px-3 dmb-30 tmb-20">
                                            <div class="col-lg-5">
                                                <div class="basker-regular font49 leading56 space-0_49 text-white res-font30 res-leading44 res-space-03"><?php echo $event_title; ?></div>
                                                <div class="roboto-medium font18 leading26 space-0_18 text-white opacity-50 dmb-10 res-font16 res-leading24 res-space-0_16"><?php echo $venue_address; ?>, <?php echo $venue_city; ?></div>
                                                <div class="d-lg-flex d-none flex-wrap">
                                                    <div>
                                                        <?php if (!empty($event_button['url']) && !empty($event_button['title'])) : ?>
                                                            <a href="<?php echo $event_button['url']; ?>"
                                                                class="bg-prefix bg-dark-00DCC8-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-172426 radius5 d-inline-block me-2">
                                                                <?php echo $event_button['title']; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="bg-prefix bg-00DCC8-blur-prefix roboto-medium font14 leading19 space-0_18 text-white radius5 d-inline-block me-2">
                                                        <?php echo $formatted_date; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="event-card-schedule radius10 dpt-15 dpb-15 d-flex justify-content-center align-items-center w-fit ms-lg-auto res-w-100"
                                                data-event-date="<?php echo esc_attr($event_date); ?>">

                                                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-lg-3 px-4">
                                                    <div class="roboto-medium font30 leading26 space-03 text-white countdown-days res-font25 res-leading32 res-space-0_25">00</div>
                                                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Days</div>
                                                </div>
                                                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-lg-3 px-4">
                                                    <div class="roboto-medium font30 leading26 space-03 text-white countdown-hours res-font25 res-leading32 res-space-0_25">00</div>
                                                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Hours</div>
                                                </div>
                                                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-lg-3 px-4">
                                                    <div class="roboto-medium font30 leading26 space-03 text-white countdown-minutes res-font25 res-leading32 res-space-0_25">00</div>
                                                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Mins</div>
                                                </div>
                                                <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-lg-3 px-4">
                                                    <div class="roboto-medium font30 leading26 space-03 text-white countdown-seconds res-font25 res-leading32 res-space-0_25">00</div>
                                                    <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Secs</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-0 w-100 start-0 px-3 mt-3">
                                        <div class="d-flex d-lg-none flex-wrap">
                                            <a href="<?php echo $event_button['url']; ?>" class="text-decoration-none bg-prefix bg-dark-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block dmb-20 me-2">
                                                <?php echo $event_button['title']; ?>
                                            </a>
                                            <div class="bg-prefix bg-00DCC8-blur-prefix roboto-medium font14 leading19 space-0_18 text-white radius5 d-inline-block dmb-20 me-2">
                                                <?php echo $formatted_date; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($link['url'])):
                                $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-lg-none d-inline-flex justify-content-center align-items-center transition"
                                    href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                    <?php echo $link['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const countdownEl = document.querySelector('.event-card-schedule');
                    if (!countdownEl) return;

                    const targetDate = new Date(countdownEl.getAttribute('data-event-date')).getTime();

                    function updateCountdown() {
                        const now = new Date().getTime();
                        const distance = targetDate - now;

                        if (distance <= 0) {
                            document.querySelector('.countdown-days').textContent = '00';
                            document.querySelector('.countdown-hours').textContent = '00';
                            document.querySelector('.countdown-minutes').textContent = '00';
                            document.querySelector('.countdown-seconds').textContent = '00';
                            clearInterval(timer);
                            return;
                        }

                        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        document.querySelector('.countdown-days').textContent = String(days).padStart(2, '0');
                        document.querySelector('.countdown-hours').textContent = String(hours).padStart(2, '0');
                        document.querySelector('.countdown-minutes').textContent = String(minutes).padStart(2, '0');
                        document.querySelector('.countdown-seconds').textContent = String(seconds).padStart(2, '0');
                    }

                    updateCountdown();
                    const timer = setInterval(updateCountdown, 1000);
                });
            </script>



        <?php elseif (get_row_layout() == 'image_content') :
            $media_type = get_sub_field('media_type');
            $media_position = get_sub_field('media_position');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $youtube = get_sub_field('youtube');
            $vimeo = get_sub_field('vimeo');
            $heading = get_sub_field('heading');
            $content = get_sub_field('content');
            $link = get_sub_field('link');
            $prefix_id = get_sub_field('prefix_id');

        ?>
            <?php if ($media_position == "left") : ?>
                <section class="left-right-section" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">

                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-12">
                                <div class="pe-lg-5">
                                    <div class="overflow-hidden radius30 res-radius20 left-img position-relative bg-black tmb-30">
                                        <?php if ($media_type == "image") : ?>
                                            <img src="<?php echo $image; ?>" alt="left-image"
                                                class="h-100 w-100 object-cover">
                                        <?php endif; ?>

                                        <?php if ($media_type == "video") : ?>
                                            <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                                                class="w-100 h-100 object-cover left-video" data-object-fit="cover">
                                                <source src="<?php echo $video['url']; ?>"
                                                    data-wf-ignore="true" />
                                            </video>
                                        <?php endif; ?>

                                        <?php if ($media_type == "youtube") : ?>
                                            <iframe id="vimeo-player" class="w-100 h-100 object-cover vimeo-video"
                                                src="https://player.vimeo.com/video/<?php echo $youtube; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                                            </iframe>
                                        <?php endif; ?>

                                        <?php if ($media_type == "vimeo") : ?>
                                            <iframe id="youtube-player" class="w-100 h-100 object-cover"
                                                src="https://www.youtube.com/embed/<?php echo $vimeo; ?>?enablejsapi=1&autoplay=1&mute=1&loop=1&playlist=<?php echo $vimeo; ?>"
                                                frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                                            </iframe>
                                        <?php endif; ?>

                                        <?php if ($media_type != "image") : ?>
                                            <div class="position-absolute play-audio">
                                                <div class="cursor-pointer audio-button radius5">
                                                    <div class="align-items-center play-audio-btn">
                                                        <div class="play-img d-flex">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/play.svg" alt="play-icon"
                                                                class="h-100 w-100 object-fit-contain ">
                                                        </div>
                                                        <div class="roboto-medium font16 space-0_16 text-white leading21 ms-2">Play
                                                            Audio</div>
                                                    </div>
                                                    <div class="align-items-center pause-audio-btn">
                                                        <div class="play-img d-flex">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/pause.svg" alt="play-icon"
                                                                class="h-100 w-100 object-fit-contain ">
                                                        </div>
                                                        <div class="roboto-medium font16 space-0_16 text-white leading21 ms-2">Pause
                                                            Audio</div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="pe-3">
                                    <?php if (!empty($heading)): ?>
                                        <div class="basker-regular font46 space-0_46 text-172426 leading56 dmb-20 res-font25 res-leading28 tmb-15"><?php echo $heading; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($content)): ?>
                                        <div class="roboto-regular font16 space-0_16 text-172426 leading24 dmb-35 tmb-30 pe-3 pe-lg-0 check-ul">

                                            <?php echo $content; ?>

                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($link['url'])):
                                        $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                        <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                            href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                            <?php echo $link['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            <?php endif; ?>


        <?php elseif (get_row_layout() == 'team_section') :
            $heading = get_sub_field('heading');
            $descriptions = get_sub_field('descriptions');
            $team_selection = get_sub_field('team_selection');
        ?>

            <section class="team-slider-section overflow-hidden">
                <div class="container">
                    <div class="d-flex align-items-end dmb-50">
                        <div class="col-lg-5 mx-auto">
                            <?php if (!empty($heading)): ?>
                                <div class="basker-regular font56 text-center space-0_56 leading60 text-172426 dmb-20 res-font30 res-leading32 res-space-03 tmb-15">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($descriptions)): ?>
                                <div class="roboto-regular font16 text-center space-0_16 leading24 text-172426 px-lg-3 px-4 mx-lg-1">
                                    <?php echo $descriptions; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="slick-arrow d-none d-lg-block">
                            <div class="d-flex">
                                <div class="prev-arrow cursor-pointer radius10 rotate-circle-active d-flex justify-content-center align-items-center me-3">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="prev-arrow" />
                                </div>
                                <div class="next-arrow cursor-pointer radius10 d-flex justify-content-center align-items-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="next-arrow" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="team-slider-container col-9 col-lg-12 tmb-45">
                        <?php foreach ($team_selection as $team_selection_single):
                            $id = $team_selection_single->ID;
                            $team_title = get_the_title($id);
                            $team_image = get_the_post_thumbnail_url($id);
                            $designation = get_field('designation', $id);
                            $linkedin_link = get_field('linkedin_link', $id);
                        ?>
                            <div class="team-slide">
                                <a href="#exampleModal" class="team-card staff-card cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $id; ?>">
                                    <div class="team-img overflow-hidden radius20 bg-1f66780d transition dmb-30 tmb-20 position-relative">
                                        <img src="<?php echo $team_image; ?>" alt="team" class="h-100 w-100 object-cover">
                                        <div class="position-absolute team-linkdin">
                                            <a href="<?php echo $linkedin_link; ?>" target="_blank" class="bg-prefix bg-white-prefix radius30 overflow-hidden d-flex align-items-center justify-content-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/LinkedIn_white.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="roboto-medium font20 space-02 leading24 text-172426 mb-1">
                                        <?php echo $team_title; ?>
                                    </div>
                                    <div class="roboto-regular font16 space-0_16 leading24 text-172426">
                                        <?php echo $designation; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="slick-arrow d-lg-none">
                        <div class="d-flex justify-content-center">
                            <div class="prev-arrow cursor-pointer radius10 rotate-circle-active d-flex justify-content-center align-items-center me-3">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="prev-arrow" />
                            </div>
                            <div class="next-arrow cursor-pointer radius10 d-flex justify-content-center align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="next-arrow" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal -->
            <div class="modal member-modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-white radius20 border-0">
                        <div class="close-div position-absolute">
                            <button type="button" class="btn-close p-0 radius10 d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/close.svg" alt="close-icon">
                            </button>
                        </div>

                        <div id="modalCarouselControls" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $first = true;
                                foreach ($team_selection as $team_selection_single):
                                    $id = $team_selection_single->ID;
                                    $team_title = get_the_title($id);
                                    $team_image = get_the_post_thumbnail_url($id);
                                    $team_content = get_post_field('post_content', $id);
                                    $designation = get_field('designation', $id);
                                    $linkedin_link = get_field('linkedin_link', $id);
                                ?>
                                    <div class="carousel-item h-100<?php if ($first) {
                                                                        echo ' active';
                                                                        $first = false;
                                                                    } ?>" data-id="<?php echo $id; ?>">
                                        <div class="w-100 d-inline-flex flex-column flex-lg-row align-items-center h-100">
                                            <div class="modal-member-img position-relative h-100 radius20">
                                                <img src="<?php echo $team_image; ?>" alt="" class="h-100 w-100 object-cover">
                                                <div class="position-absolute team-linkdin">
                                                    <a href="<?php echo $linkedin_link; ?>" class="bg-prefix bg-white-prefix radius30 overflow-hidden d-flex align-items-center justify-content-center">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/images/LinkedIn_white.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal-member-content text-start w-auto h-100 d-flex align-items-lg-center">
                                                <div class="position-relative">
                                                    <div class="roboto-medium font24 leading24 space-0_24 text-172426"><?php echo $team_title; ?></div>
                                                    <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-30 tmb-20"><?php echo $designation; ?></div>
                                                    <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-40 modal-member-desc pe-4"><?php echo $team_content; ?></div>
                                                    <div class="carousel-arrow d-flex justify-content-start">
                                                        <button class="carousel-control-prev radius10 bg-1F6678 position-initial" type="button" data-bs-target="#modalCarouselControls" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon rotate-circle-active" aria-hidden="true"></span>
                                                        </button>
                                                        <button class="carousel-control-next radius10 bg-1F6678 position-initial" type="button" data-bs-target="#modalCarouselControls" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".team-card").forEach(function(card) {
                        card.addEventListener("click", function() {
                            const selectedId = this.getAttribute("data-id");
                            document.querySelectorAll(".carousel-item").forEach(function(item) {
                                item.classList.remove("active");
                                if (item.getAttribute("data-id") === selectedId) {
                                    item.classList.add("active");
                                }
                            });
                        });
                    });
                });
            </script>


        <?php elseif (get_row_layout() == 'reports_card') :
            $cards = get_sub_field('cards');

        ?>
            <section class="two-cards-section">
                <div class="container">
                    <div class="row row8">
                        <?php foreach ($cards as $card_single) :
                            $heading = $card_single['heading'];
                            $content = $card_single['content'];
                            $link = $card_single['link'];
                        ?>
                            <div class="col-lg-6 two-cards tmt-20">
                                <div class="bg-white report-cards radius30 res-radius20 dpt-50 dpb-50">
                                    <?php if (!empty($heading)): ?>
                                        <div class="basker-regular font46 space-0_46 leading52 text-172426 dmb-20 tmb-15 res-font25 res-leading32 res-space-0_25"><?php echo $heading; ?></div>
                                    <?php endif; ?>

                                    <?php if (!empty($content)): ?>
                                        <div class="roboto-regular font16 space-0_16 leading24 text-172426 col-lg-11 dmb-25 tmb-30"><?php echo $content; ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($link['url'])):
                                        $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                        <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                            href="<?php echo $link['url']; ?>" target="<?php echo $target_2; ?>">
                                            <?php echo $link['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'clients_feedback') :
            $heading = get_sub_field('heading');
            $feedback_selection = get_sub_field('feedback_selection');
            $feedback_ids = wp_list_pluck($feedback_selection, 'ID');
        ?>
            <script>
                const selectedFeedbackIDs = <?php echo json_encode($feedback_ids); ?>;
            </script>
            <section class="review-section position-relative">
                <div class="container">
                    <?php if (!empty($heading)): ?>
                        <div class="basker-regular font56 leading60 space-0_56 text-172426 text-center dmb-95 tmb-40 res-font30 res-leading44 res-space-03">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <div class="mx-auto col-lg-10 col-12">
                        <div class="review-cards-container row row11" id="feedbackContainer">
                            <div class="col-lg-4 col-12" id="col-0"></div>
                            <div class="col-lg-4 col-12" id="col-1"></div>
                            <div class="col-lg-4 col-12" id="col-2"></div>
                        </div>
                    </div>
                </div>
                <div class="bg-layer position-absolute bottom-0 w-100 d-flex justify-content-center align-items-center p-initial tmt-20">
                    <a id="loadMoreFeedback" class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none align-content-center transition" href="#">
                        View more
                    </a>
                </div>


                <script id="feedback-template" type="text/x-handlebars-template">
                    {{#each posts}}
                        <div class="review-cards bg-white radius20">
                            <div class="review-logo">
                                <img src="{{thumbnail}}" class="h-100" alt="">
                            </div>
                            <div class="roboto-regular font16 leading21 space-0_16 dmb-30 text-172426">{{{content}}}</div>
                            <div class="roboto-regular font14 leading19 space-0_14 text-172426"><b>{{title}}</b> - {{excerpt}}</div>
                        </div>
                    {{/each}}
                </script>
            </section>

        <?php elseif (get_row_layout() == 'reports_list') :
            $heading = get_sub_field('heading');
            $descriptions = get_sub_field('descriptions');

        ?>
            <section class="reports-cards-section  overflow-hidden">
                <div class="container">
                    <div class="col-lg-7 px-lg-3 mx-auto text-center dmb-30 tmb-40">
                        <div class="basker-regular font66 leading70 space-0_66 text-172426 dmb-10 res-font35 res-leading44 res-space-0_35"><?php echo $heading; ?></div>
                        <div class="roboto-regular font20 leading28 space-02 text-172426 res-font16 res-leading24 res-space-0_16 px-4">
                            <?php echo $descriptions; ?>
                        </div>
                    </div>
                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'reports_category',
                        'hide_empty' => true,
                    ]);

                    if (!empty($terms) && !is_wp_error($terms)) : ?>
                        <div class="d-flex align-items-center justify-content-center dmb-95 tmb-70 reports-button transition">
                            <div class="roboto-medium font14 leading19 space-0_14 text-172426 me-3 text-nowrap ps-4 ps-lg-0">
                                Filter by:
                            </div>
                            <div class="filter-button-row d-flex align-items-center justify-content-between text-nowrap overflow-auto">
                                <?php foreach ($terms as $term) : ?>
                                    <button data-category="<?php echo esc_attr($term->slug); ?>"
                                        class="category-btn filter-button roboto-medium font14 leading19 space-0_14 me-1 border-0 radius5">
                                        <?php echo esc_html($term->name); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>



                    <div class="row row8" id="reportsContainer">
                    </div>

                    <script id="reports-template" type="text/x-handlebars-template">
                        {{#each reports}}
                            <div class="col-lg-4 col-md-6 col-12 recent-cards dmt-100 tmt-25">
                                <div class="recent-card bg-white radius30 dpt-50 dpb-75 tpt-40 tpb-50">
                                    <div class="basker-regular font40 leading44 space-04 text-172426 dmb-30 res-font25 res-leading32 res-space-0_25">
                                        {{title}}
                                    </div>
                                    <div class="recent-card-img radius10 overflow-hidden dmb-30 tmb-25 res-radius20">
                                        <img src="{{thumbnail}}" alt="" class="w-100 h-100 object-cover">
                                    </div>
                                    <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-30 tmb-20 recent-card-desc">
                                        {{{content}}}
                                    </div>


                                    <div class="recent-card-buttons d-flex text-nowrap">
                                        <a class="btnA bg-172426-white-btn roboto-medium font16 space-0_16 radius5 text-decoration-none d-inline-flex justify-content-center align-items-center transition mx-1"
                                            href="/contact/">
                                            Get in touch
                                        </a>
                                        <a class="btnA bg-172426-white-btn roboto-medium font16 space-0_16 radius5 text-decoration-none d-inline-flex justify-content-center align-items-center transition mx-1"
                                            href="{{link}}">
                                            Learn more
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {{/each}}
                    </script>

                </div>
            </section>


        <?php elseif (get_row_layout() == 'table_of_contents') :
            $heading = get_sub_field('heading');
            $table_col = get_sub_field('table_col');

        ?>
            <section class="contents-table-section">
                <div class="container">
                    <div class="contents-table bg-white radius20">
                        <div class="basker-regular font56 leading60 space-0_56 text-172426 dmb-30 res-font35 res-leading44 res-space-0_35"><?php echo $heading; ?></div>
                        <div class="table-row row">
                            <?php foreach ($table_col as  $table_col_single):
                                $table_col_single_content = $table_col_single['content'];
                            ?>

                                <div class="table-col col-lg-3">
                                    <?php foreach ($table_col_single_content as $table_col_inner_content) :
                                        $point_heading = $table_col_inner_content['point_heading'];
                                        $points = $table_col_inner_content['points'];
                                    ?>
                                        <div class="roboto-medium font16 leading18 space-0_16 text-172426 dmb-20"><?php echo $point_heading; ?></div>
                                        <div class="check-ul full-ul roboto-regular font16 space-0_16 text-172426 leading24 dmb-35 tmb-45">
                                            <ul>
                                                <?php foreach ($points as $point) :
                                                    $point_single = $point['point'];
                                                ?>
                                                    <li><?php echo $point_single; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'hero_section_2') :
            $back_link = get_sub_field('back_link');
            $image = get_sub_field('image');
            $heading = get_sub_field('heading');
            $content = get_sub_field('content');
            $links = get_sub_field('links');
            $show_label = get_sub_field('show_label');

        ?>

            <section class="full-left-right-card-section">
                <div class="container">
                    <div class="full-left-right-card dpt-80 dpb-90 tpt-60 tpb-60 radius20">
                        <div class="row align-items-center flex-column-reverse flex-lg-row">
                            <div class="col-lg-5 col-12">
                                <div class="col-12 pe-lg-5">
                                    <div class="dmb-20 tmb-15">
                                        <?php if (!empty($back_link['url'])):
                                            $target_2 = ($back_link['target'] == '_blank') ? "_blank" : ""; ?>
                                            <a href="<?php echo $back_link['url']; ?>" target="<?php echo $target_2; ?>"
                                                class="bg-prefix bg-00DCC8-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-white radius5 d-inline-flex me-2">
                                                <?php echo $back_link['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($show_label == "yes") : ?>
                                            <div
                                                class="bg-prefix bg-white-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-white radius5 d-inline-flex me-2">
                                                <?php echo get_the_title(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="basker-regular font46 leading56 space-0_46 text-white dmb-20 res-font30 res-leading44 res-space-03">
                                        <?php echo $heading; ?>
                                    </div>
                                    <div class="roboto-regular font20 leading28 space-02 text-white dmb-25 pe-lg-5 res-font16 res-leading24 res-space-0_16 full-left-right-card-desc check-ul full-ul">
                                        <?php echo $content; ?>
                                    </div>

                                    <div class="full-text-img-buttons">
                                        <?php foreach ($links as $link_single) :
                                            $link_type = $link_single['link_type'];
                                            $link = $link_single['link'];
                                            $button_text = $link_single['button_text'];
                                            $button_file = $link_single['button_file'];

                                        ?>
                                            <?php if ($link_type == "link") : ?>
                                                <a class="btnA bg-00DCC8-btn roboto-medium font16 space-0_16 radius5 text-decoration-none d-inline-flex justify-content-center align-items-center transition mx-1"
                                                    href="<?php echo $link['url']; ?>">
                                                    <?php echo $link['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($link_type == "file") : ?>
                                                <a download class="btnA bg-00DCC8-btn roboto-medium font16 space-0_16 radius5 text-decoration-none d-inline-flex justify-content-center align-items-center transition mx-1"
                                                    href="<?php echo $button_file['url']; ?>">
                                                    <?php echo $button_text; ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="full-left-right-card-img tmb-80">
                                    <img src="<?php echo $image; ?>" alt="" class="w-100 h-100 object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'center_content') :

            $heading = get_sub_field('heading');
            $content = get_sub_field('content');

        ?>

            <section class="center-content-section">
                <div class="container">
                    <div class="col-lg-9 col-12 mx-auto text-center px-lg-4 px-2">
                        <div class="basker-regular font56 leading60 space-0_56 text-172426  dmb-20 res-font30 res-leading32 res-space-03 tmb-15 px-4 pg-lg-0"><?php echo $heading; ?></div>
                        <div class="roboto-regular font16 leading24 space-0_16 text-172426 px-lg-3 res-font16 res-leading24 res-space-0_16"><?php echo $content; ?></div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'counter') :
            $counter_card = get_sub_field('counter_card');

        ?>
            <section class="counter-section">
                <div class="container">
                    <div class="row row8">
                        <?php foreach ($counter_card as $counter_card_single) :
                            $counter_card_single_number = $counter_card_single['number'];
                            $counter_card_single_details = $counter_card_single['details'];
                        ?>
                            <div class="col-lg-4 tmb-15">
                                <div class="counter-card radius30 res-radius20 bg-white d-flex flex-column justify-content-center align-items-center text-center">
                                    <div class="basker-regular font90 leading100 space-09 res-font60 res-leading70 res-space-06"><?php echo $counter_card_single_number; ?></div>
                                    <div class="roboto-regular font16 leading24 space-0_16 text-172426"><?php echo $counter_card_single_details; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'single_testimonial') :
            $content = get_sub_field('content');
            $details = get_sub_field('details');

        ?>
            <section class="testimonial-section">
                <div class="container">
                    <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5 dmb-30 tmb-40">
                        Testimonial
                    </div>
                    <div class="row">
                        <div class="col-lg-1 col-12">
                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/quote.svg" alt="" class="quote">
                        </div>
                        <div class="col-lg-10 col-12">
                            <div class="basker-regular font46 leading56 space-0_46 text-172426 dmb-40 res-font30 res-leading44 res-space-03 pe-2 pe-lg-0 tmb-30"><?php echo $content; ?></div>
                            <div class="roboto-regular font16 leading24 space-0_16 text-172426"><?php echo $details; ?></div>
                        </div>
                    </div>
                </div>
            </section>



        <?php elseif (get_row_layout() == 'banner_card_with_content') :
            $heading = get_sub_field('heading');
            $content = get_sub_field('content');
            $link = get_sub_field('link');
            $banner_cards = get_sub_field('banner_cards');
        ?>
            <section class="industry-section overflow-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12 tmb-50">
                            <div class="basker-regular font50 leading56 space-05 text-172426 dmb-15 res-font30 res-leading44 res-space-03"><?php echo $heading; ?></div>
                            <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-20 tmb-40 col-lg-10 col-12"><?php echo $content; ?></div>

                            <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                href="<?php echo $link['url']; ?>">
                                <?php echo $link['title']; ?>
                            </a>

                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="industry-card-slider ps-lg-1 col-11 pe-3 pe-lg-0 col-lg-12">
                                <?php foreach ($banner_cards as $banner_card) :
                                    $banner_card_image = $banner_card['image'];
                                    $banner_card_page_link = $banner_card['page_link'];
                                ?>
                                    <a href="<?php echo $banner_card_page_link['url']; ?>" class="industry-card d-inline-block text-decoration-none radius20 overflow-hidden position-relative w-100">
                                        <img src="<?php echo $banner_card_image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                                        <div class="bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                        <div class="position-absolute bottom-0 w-100 px-4">
                                            <div class="d-flex justify-content-between align-items-center dmb-30">
                                                <div class="basker-regular font36 leading44 space-0_36 text-white"><?php echo $banner_card_page_link['title']; ?></div>
                                                <div class="right-arrow radius10 d-flex justify-content-center align-items-center">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'content_with_continue_slider') :
            $prefix = get_sub_field('prefix');
            $heading = get_sub_field('heading');
            $cards = get_sub_field('cards');


        ?>

            <section class="outcomes-slider-section overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                    <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5 dmb-15 tmb-25">
                                        <?php echo $prefix; ?>
                                    </div>
                                    <div class="basker-regular font50 leading56 space-05 text-172426 pe-lg-4 col-10 col-lg-12 res-font35 res-leading44 res-space-0_35 tmb-25">
                                        <?php echo $heading; ?>
                                    </div>
                                </div>
                                <div class="slick-arrow d-none d-lg-block">
                                    <div class="d-flex">
                                        <div
                                            class="prev-arrow cursor-pointer radius10 rotate-circle-active d-flex justify-content-center align-items-center me-3">
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="prev-arrow" />
                                        </div>
                                        <div
                                            class="next-arrow cursor-pointer radius10 d-flex justify-content-center align-items-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="next-arrow" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12 tmb-45">
                            <div class="outcomes-slider col-11 pe-3">
                                <?php $index = 0; ?>
                                <?php foreach ($cards as $card) :
                                    $card_title = $card['title'];
                                    $card_content = $card['content'];
                                    $index++;
                                ?>
                                    <div class="outcomes-card radius30 h-100">
                                        <div class="basker-regular font90 leading100 space-09 text-00DCC8 dmb-55 res-font60 res-leading70 res-space-06 tmb-35">
                                            <?php if ($index <= 9): ?>
                                                0<?php echo $index; ?>
                                            <?php else: ?>
                                                <?php echo $index; ?>
                                            <?php endif; ?>

                                        </div>
                                        <div class="basker-regular font30 leading56 text-172426 dmb-40 res-font25 res-leading32 res-space-0_25 tmb-20"><?php echo $card_title; ?></div>
                                        <div class="roboto-regular font16 leading24 space-0_16 text-172426"><?php echo $card_content; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="slick-arrow d-lg-none d-flex justify-content-center">
                            <div class="d-flex">
                                <div
                                    class="prev-arrow cursor-pointer radius10 rotate-circle-active d-flex justify-content-center align-items-center me-3">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="prev-arrow" />
                                </div>
                                <div
                                    class="next-arrow cursor-pointer radius10 d-flex justify-content-center align-items-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="next-arrow" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'events_list') : ?>
            <section class="event-cards-section">
                <div class="container">
                    <div class="row row17">




                        <?php

                        $events = tribe_get_events([
                            'posts_per_page' => 6,
                            'start_date'     => current_time('Y-m-d H:i:s'),
                            'eventDisplay'   => 'list',
                        ]);

                        if ($events) :
                            foreach ($events as $event) :
                                setup_postdata($event);
                                $event_id = $event->ID;
                                $event_image = get_the_post_thumbnail_url($event_id, 'large');
                                $event_date = tribe_get_start_date($event_id, false, 'Y-m-d H:i:s');
                                $event_timestamp = strtotime($event_date);
                                $formatted_date = date('d M Y', $event_timestamp);
                                $event_start_datetime = tribe_get_start_date($event_id, true, 'Y-m-d H:i:s');
                                $event_location = tribe_get_venue($event_id);
                                $event_button = get_field('events_button', $event_id);
                                $event_city = tribe_get_city($event_id);
                        ?>

                                <div class="col-lg-4 col-md-6 col-12 event-cards dmt-120 tmt-55">
                                    <div class="event-card">
                                        <a href="<?php echo get_permalink($event_id); ?>" class="text-decoration-none">
                                            <div class="event-img radius30 overflow-hidden card-hover position-relative dmb-20">
                                                <img src="<?php echo esc_url($event_image); ?>" alt="" class="w-100 h-100 object-cover img">
                                                <div class="evernt--layer position-absolute bottom-0 start-0 w-100"></div>
                                                <div class="position-absolute bottom-0 start-0 d-flex justify-content-center w-100 dmb-20">
                                                    <div class="event-card-schedule radius10 dpt-15 dpb-15 d-flex align-items-center" data-countdown="<?php echo esc_attr($event_start_datetime); ?>">
                                                        <div id="countdown-<?php echo esc_attr($event_id); ?>" class="text-white mt-2 roboto-medium font14"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="basker-regular font40 leading46 space-04 text-172426 dmb-10 res-font30 res-leading32 res-space-03 tmb-5"><?php echo get_the_title($event_id); ?></div>
                                            <div class="roboto-medium font20 leading26 space-02 text-172426 dmb-20 res-font16 res-leading24 res-space-0_16">
                                                <?php echo esc_html($event_city); ?> | <?php echo esc_html($formatted_date); ?>
                                            </div>
                                        </a>
                                        <?php if (!empty($event_button['url']) && !empty($event_button['title'])) : ?>
                                            <a href="<?php echo $event_button['url']; ?>"
                                                class="bg-prefix bg-00DCC8-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-172426 radius5 dmb-10 d-inline-flex me-2">
                                                <?php echo $event_button['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>



                        <?php
                            endforeach;
                            wp_reset_postdata();
                        else :
                            echo '<p>No upcoming events found.</p>';
                        endif;
                        ?>




                    </div>
                </div>
            </section>



        <?php elseif (get_row_layout() == 'the_agenda') :
            $heading = get_sub_field('heading');
            $schedule = get_sub_field('schedule');
            $media_type = get_sub_field('media_type');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $youtube = get_sub_field('youtube');
            $vimeo = get_sub_field('vimeo');
  $prefix_id = get_sub_field('prefix_id');
        ?>
            <section class="agenda-section" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">
                <div class="container">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-lg-7 col-12 pe-lg-5">
                            <div class="basker-regular font56 leading60 space-0_56 text-172426 dmb-55 res-font30 res-leading32 res-space-03 tmb-30"><?php echo $heading; ?>
                            </div>
                            <div class="agenda-content-container">
                                <?php foreach ($schedule as $schedule_single) :
                                    $start_time = $schedule_single['start_time'];
                                    $end_date = $schedule_single['end_date'];
                                    $single_row = $schedule_single['single_row'];
                                ?>
                                    <div class="dpb-20 dpt-15 agenda-col">
                                        <div class="roboto-regular font16 leading24 space-0_16 text-172426 "><?php echo $start_time; ?> - <?php echo $end_date; ?></div>

                                        <?php if (count($single_row) == 1): ?>
                                            <?php foreach ($single_row as $single_row_full) :
                                                $schedule_heading = $single_row_full['schedule_heading'];
                                                $schedule_details = $single_row_full['schedule_details'];
                                            ?>
                                                <div class="d-flex flex-column flex-lg-row ">
                                                    <div class="col-lg-5 col-12">
                                                        <?php if (!empty($schedule_heading)): ?>
                                                            <div
                                                                class="roboto-regular font16 leading24 space-0_16 text-172426 fw-bold col-lg-8 col-10">
                                                                <?php echo $schedule_heading; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <?php if (!empty($schedule_details)): ?>
                                                            <div class="roboto-regular font16 leading24 space-0_16 text-172426 pe-2 pe-lg-0 tmt-25">
                                                                <?php echo $schedule_details; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <?php if (!empty($single_row)) : ?>
                                                <div class="d-flex flex-column flex-lg-row agenda-wrapper">
                                                    <div class="col-lg-5 col-12">
                                                        <?php foreach ($single_row as $index => $single_row_full) :
                                                            $schedule_heading = $single_row_full['schedule_heading'];
                                                            $schedule_details = $single_row_full['schedule_details'];
                                                            if (!empty($schedule_heading)) :
                                                        ?>
                                                                <div
                                                                    class="roboto-regular font16 leading24 space-0_16 text-172426 fw-bold col-lg-8 col-10 d-flex opacity30 agenda-title cursor-pointer transition dmb-15<?php echo $index === 0 ? ' active' : ''; ?>">
                                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-black-arrow.svg"
                                                                        data-desc="<?php echo wp_kses_post(strip_tags($schedule_details)); ?>"
                                                                        class="agenda-arrow me-2 mt-2" alt="">
                                                                    <?php echo $schedule_heading; ?>
                                                                </div>
                                                        <?php endif;
                                                        endforeach; ?>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="roboto-regular font16 leading24 space-0_16 text-172426 pe-2 pe-lg-0 tmt-25 description"></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 ps-lg-2 tmb-30">
                            <div class="agenda-img radius30 overflow-hidden position-sticky bg-black">
                                <?php if ($media_type == 'image') : ?>
                                    <img src="<?php echo $image; ?>" alt="" class="w-100 h-100 object-cover">
                                <?php endif; ?>
                                <?php if ($media_type == 'video') : ?>
                                    <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                                        class="w-100 h-100 object-cover" data-object-fit="cover">
                                        <source src="<?php echo $video['url']; ?>"
                                            data-wf-ignore="true" />
                                    </video>
                                <?php endif; ?>
                                <?php if ($media_type == 'vimeo') : ?>
                                    <iframe class="w-100 h-100 object-cover vimeo-video"
                                        src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                                    </iframe>
                                <?php endif; ?>
                                <?php if ($media_type == 'youtube') : ?>
                                    <iframe class="w-100 h-100 object-cover"
                                        src="https://www.youtube.com/embed/<?php echo $youtube; ?>?enablejsapi=1&autoplay=1&mute=1&loop=1&playlist=<?php echo $video; ?>"
                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                                    </iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'previous_sponsors') :
            $sponsors_group = get_sub_field('sponsors_group');
              $prefix_id = get_sub_field('prefix_id');
        ?>
            <section class="event-logo-section overflow-hidden" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">
                <div class="container">
                    <div class="event-container text-center">
                        <?php foreach ($sponsors_group as $sponsors_group_single) :
                            $heading = $sponsors_group_single['heading'];
                            $gallery = $sponsors_group_single['gallery'];
                            $select_sponsors_archivement = $sponsors_group_single['select_sponsors_archivement'];

                        ?>
                            <?php if ($select_sponsors_archivement == "gold") : ?>
                                <div class="event-col dpb-60 dpt-50">
                                    <div class="basker-regular font46 leading56 space-0_46 text-172426 dmb-35 res-font30 res-leading32 res-space-03"><?php echo $heading; ?></div>
                                    <div class="d-flex justify-content-center overflow-auto">
                                        <?php foreach ($gallery as $single_image) : ?>
                                            <div
                                                class="event-logo radius10 border-D98E00 d-inline-flex align-items-center justify-content-center mx-2">
                                                <img src="<?php echo $single_image['url']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($select_sponsors_archivement == "silver") : ?>
                                <div class="event-col dpb-60 dpt-50">
                                    <div class="basker-regular font46 leading56 space-0_46 text-172426 dmb-35 res-font30 res-leading32 res-space-03"><?php echo $heading; ?></div>
                                    <div class="d-flex justify-content-lg-center overflow-auto">
                                        <?php foreach ($gallery as $single_image) : ?>
                                            <div
                                                class="event-logo radius10 border-C6C6C6 d-inline-flex align-items-center justify-content-center mx-2">
                                                <img src="<?php echo $single_image['url']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($select_sponsors_archivement == "bronze") : ?>
                                <div class="event-col dpb-60 dpt-50">
                                    <div class="basker-regular font46 leading56 space-0_46 text-172426 dmb-35 res-font30 res-leading32 res-space-03"><?php echo $heading; ?></div>
                                    <div class="d-flex justify-content-lg-center overflow-auto">
                                        <?php foreach ($gallery as $single_image) : ?>
                                            <div
                                                class="event-logo radius10 border-8E5410 d-inline-flex align-items-center justify-content-center mx-2">
                                                <img src="<?php echo $single_image['url']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'previous_speakers') :
            $heading = get_sub_field('heading');
            $select_speakers = get_sub_field('select_speakers');
              $prefix_id = get_sub_field('prefix_id');
        ?>
            <section class="event-speakers-slider-section overflow-hidden" id="<?php echo ($prefix_id !== '' ? $prefix_id : ''); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="basker-regular font50 leading56 space-05 text-172426 dmb-120 tmb-30 res-font30 res-leading32 res-space-03 text-center text-lg-start"><?php echo $heading; ?>
                            </div>
                            <div class="slick-arrow d-none d-lg-block">
                                <div class="d-flex">
                                    <div
                                        class="prev-arrow cursor-pointer radius10 rotate-circle-active d-flex justify-content-center align-items-center me-3">
                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="prev-arrow" />
                                    </div>
                                    <div
                                        class="next-arrow cursor-pointer radius10 d-flex justify-content-center align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="next-arrow" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12 tmb-35">
                            <div class="event-speakers-slider col-8">
                                <?php foreach ($select_speakers as $select_speaker) :
                                    $id = $select_speaker->ID;
                                    $title = $select_speaker->post_title;
                                    $content = $select_speaker->post_content;
                                    $speakerLogo = get_field('speakers_company_logo', $id);
                                ?>
                                    <div class="event-speakers-cards h-100">
                                        <div class="event-speakers-container radius30 h-100">
                                            <div class="event-img dmb-25 radius10 overflow-hidden">
                                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="h-100 w-100 object-cover"
                                                    alt="">
                                            </div>
                                            <div class="roboto-medium font20 leading24 space-02 text-172426 dmb-5 res-font20 res-leading24 res-space-02"><?php echo $title; ?></div>
                                            <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-15">
                                                <?php echo $content; ?></div>
                                            <div class="event-slider-logo">
                                                <img src="<?php echo $speakerLogo; ?>" class="h-100" alt="">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="slick-arrow d-lg-none d-flex justify-content-center">
                            <div class="d-flex">
                                <div
                                    class="prev-arrow cursor-pointer radius10 rotate-circle-active d-flex justify-content-center align-items-center me-3">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="prev-arrow" />
                                </div>
                                <div
                                    class="next-arrow cursor-pointer radius10 d-flex justify-content-center align-items-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/images/right-white-arrow.svg" alt="next-arrow" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'hero_section_3') :
            $back_link = get_sub_field('back_link');
            $image = get_sub_field('image');
            $heading = get_sub_field('heading');
            $content = get_sub_field('content');
            $links = get_sub_field('links');
            $show_label = get_sub_field('show_label');
        ?>
            <section class="about-hero-section">
                <div class="container">
                    <div class="row align-items-center flex-column-reverse flex-lg-row">
                        <div class="col-lg-6 col-12">
                            <div class="d-flex align-items-center dmb-15 tmb-25">
                                <?php if (!empty($back_link['url'])):
                                    $target_2 = ($back_link['target'] == '_blank') ? "_blank" : ""; ?>
                                    <a href="<?php echo $back_link['url']; ?>" target="<?php echo $target_2; ?>"
                                        class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block me-2 text-decoration-none">
                                        <?php echo $back_link['title']; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ($show_label == "yes") : ?>
                                    <div
                                        class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 py-2 px-4 d-inline-flex">
                                        <?php echo get_the_title(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="basker-regular font66 leading70 space-0_66 text-172426 col-lg-10 col-11 dmb-20 tmb-15 res-font25 res-leading32 res-space-0_25">
                                <?php echo $heading; ?>
                            </div>
                            <div class="roboto-regular font20 leading28 space-02 text-172426 col-lg-11 pe-3 pe-lg-0 dmb-25 tmb-40 res-font16 res-leading24 res-space-0_16">
                                <?php echo $content; ?>
                            </div>
                            <?php foreach ($links as $link_single) :
                                $link_type = $link_single['link_type'];
                                $link = $link_single['link'];
                                $button_text = $link_single['button_text'];
                                $button_file = $link_single['button_file'];
                            ?>
                                <?php if ($link_type == "link") : ?>
                                    <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white px-4 text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                        href="<?php echo $link['url']; ?>">
                                        <?php echo $link['title']; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ($link_type == "file") : ?>
                                    <a download class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white px-4 text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                        href="<?php echo $button_file['url']; ?>">
                                        <?php echo $button_text; ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-6 col-12 right-side-content">
                            <div class="col-lg-11 col-12 ps-lg-5 ms-auto">
                                <div class="about-hero-img radius20 overflow-hidden tmb-35">
                                    <img src="<?php echo $image; ?>" alt="" class="w-100 h-100 object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'available_jobs') :
            $job_cards = get_sub_field('job_cards');
        ?>

            <section class="associate-cards-section container">
                <?php foreach ($job_cards as $job_card) :
                    $job_card_heading = $job_card['heading'];
                    $job_card_locations = $job_card['locations'];
                    $job_card_content = $job_card['content'];
                ?>
                    <div class="associate-card bg-prefix bg-1F6678-prefix radius30 dmb-35 tmb-20">
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="basker-regular font30 leading32 space-03 text-172426 dmb-10 res-font28 res-leading32 res-space-0_25"><?php echo $job_card_heading; ?>
                                </div>
                                <div class="basker-regular font16 leading24 space-0_16 text-172426 dmb-30 tmb-25"><?php echo $job_card_locations; ?>
                                </div>
                                <div>
                                    <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-none d-lg-inline-flex justify-content-center align-items-center transition"
                                        href="#enquiryModal" data-bs-toggle="modal">
                                        Apply Now
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-12 tmb-45">
                                <div class="content-text roboto-regular font16 leading24 space-0_16 text-172426 dmb-15">
                                    <?php echo $job_card_content; ?>
                                </div>
                                <a href="javascript:void(0);"
                                    class="toggle-read roboto-medium font16 leading24 space-0_16 text-172426">Read more</a>
                            </div>
                        </div>
                        <div>
                            <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-lg-none d-inline-flex justify-content-center align-items-center transition"
                                href="#enquiryModal" data-bs-toggle="modal">
                                Apply Now
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <!-- modal -->
            <div class="modal enquiry-modal fade text-center" data-bs-backdrop="static" id="enquiryModal" aria-hidden="true" aria-labelledby="memberModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-white radius20 border-0">
                        <div class="close-div position-absolute">
                            <button type="button"
                                class="btn-close p-0 radius10 d-flex align-items-center justify-content-center"
                                data-bs-dismiss="modal" aria-label="Close">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/close.svg" alt="close-icon">
                            </button>
                        </div>
                        <div class="basker-regular font30 leading32 space-03 text-172426 res-font25 res-space-0_25">Enquiry for Associate Consultant</div>
                    </div>
                </div>
            </div>


        <?php elseif (get_row_layout() == 'text_banner') :
            $heading = get_sub_field('heading');
            $link = get_sub_field('link');
        ?>
            <section class="left-content-section">
                <div class="container">
                    <div class="basker-regular font66 leading70 space-0_66 text-172426 col-lg-10 dmb-20 tmb-30 res-font30 res-leading32 res-space-03">
                        <?php echo $heading; ?>
                    </div>
                    <a class="get-touch-btn btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                        href="<?php echo $link['url']; ?>">
                        <?php echo $link['title']; ?>
                    </a>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'text_hero_banner') :
            $heading = get_sub_field('heading');
            $descriptions = get_sub_field('descriptions');
        ?>
            <section class="clients-content-section container">
                <div
                    class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block dmb-20 tmb-25">
                    <?php echo get_the_title(); ?>
                </div>
                <div class="basker-regular font76 leading80 space-0_76 text-172426 dmb-20 tmb-15 col-lg-8 res-font35 res-leading44 res-space-0_35">
                    <?php echo $heading; ?>
                </div>
                <div class="roboto-regular font20 leading28 space-02 text-172426 col-lg-7 res-font16 res-leading24 res-space-0_16">
                    <?php echo $descriptions; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'our_services') :
            $cards = get_sub_field('cards');
        ?>
            <section class="client-left-right-cards-section container">
                <?php foreach ($cards as $card_single) :
                    $card_single_image = $card_single['image'];
                    $card_single_heading = $card_single['heading'];
                    $card_single_content = $card_single['content'];
                    $card_single_link = $card_single['link'];
                ?>
                    <div class="row align-items-center dmb-60 tmb-55 client-left-right-card">
                        <div class="col-lg-8 col-12 pe-lg-5">
                            <div class="pe-lg-2">
                                <div class="client-img radius20 overflow-hidden">
                                    <img src="<?php echo $card_single_image; ?>" alt="" class="w-100 h-100 object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="basker-regular font50 leading56 space-05 text-172426 dmb-15 res-font28 tmb-10"><?php echo $card_single_heading; ?></div>
                            <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-25 pe-4"><?php echo $card_single_content; ?></div>
                            <a class="learn-more-btn btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none
                         d-inline-flex justify-content-center align-items-center transition" href="<?php echo $card_single_link['url']; ?>">
                                <?php echo $card_single_link['title']; ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>


        <?php elseif (get_row_layout() == 'center_hero_section') :
            $back_link = get_sub_field('back_link');
            $image = get_sub_field('image');
            $heading = get_sub_field('heading');
            $descriptions = get_sub_field('descriptions');

        ?>
            <section class="client-service-hero-section container">
                <div class="d-flex align-items-center justify-content-center dmb-15 tmb-25">
                    <a href="<?php echo $back_link['url']; ?>"
                        class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block me-2 text-decoration-none">
                        <?php echo $back_link['title']; ?>
                    </a>
                    <div
                        class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 py-2 px-4 d-inline-flex">
                        <?php echo get_the_title(); ?>
                    </div>
                </div>
                <div class="basker-regular font66 leading70 space-0_66 text-172426 col-lg-9 px-3 px-lg-0  mx-auto text-center res-font35 res-leading44 res-space-0_35">
                    <?php echo $heading; ?>
                </div>
                <div class="col-lg-7 px-lg-5 mx-auto text-center dpt-15">
                    <div class="roboto-regular  font20 leading28 space-02 text-172426 res-font16 res-leading24 res">Become our event sponsor and unlock the opportunity to position your company at the forefront of industry recognition.</div>
                </div>
                <?php if (!empty($image)): ?>
                    <div class="client-service-img radius20 overflow-hidden dmt-60">
                        <img src="<?php echo $image; ?>" alt="" class="w-100 h-100 object-cover">
                    </div>
                <?php endif; ?>
            </section>

        <?php elseif (get_row_layout() == 'all_team_member') : ?>

            <section class="meet-the-team-section">
                <div class="container">
                    <div class="row row8 dmb-80" id="teamsContainer">

                    </div>

                    <script id="team-template" type="text/x-handlebars-template">
                        {{#each posts}}
                            <div class="col-lg-3 col-md-4 col-6 dmt-110 tem-card-col tmt-30">
                                <div data-bs-target="#memberModal" data-bs-toggle="modal" class="team-card cursor-pointer w-100">
                                    <div class="team-img overflow-hidden radius20 bg-1f66780d transition dmb-30 tmb-20 position-relative">
                                        <img src="{{thumbnail}}" alt="team" class="h-100 w-100 object-cover">
                                        <div class="position-absolute team-linkdin">
                                            <a href="{{linkedin_link}}" class="bg-prefix bg-white-prefix radius30 overflow-hidden d-flex align-items-center justify-content-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/images/LinkedIn_white.svg" alt="LinkedIn">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="roboto-medium font20 space-02 leading24 text-172426 mb-1">
                                        {{title}}
                                    </div>
                                    <div class="roboto-regular font16 space-0_16 leading24 text-172426">
                                        {{designation}}
                                    </div>
                                </div>
                            </div>
                        {{/each}}
                    </script>

                    <div class="d-flex justify-content-center mt-4">
                        <button id="loadMore"
                            class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white px-4 text-decoration-none  justify-content-center align-items-center transition">
                            Load more +
                        </button>
                    </div>

                </div>
            </section>


        <?php elseif (get_row_layout() == 'all_news') :
            $heading = get_sub_field('heading');
            $main_post = get_sub_field('main_post');

            $id = $main_post->ID;
            $main_post_title = $main_post->post_title;
            $main_post_date = $main_post->post_date;
            $news_content = get_field('news_content', $id);

            $args = array(
                'taxonomy' => 'category',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 1,
            );
            $cats = get_categories($args);
            $master = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);




        ?>
            <section class="insights-cards-section">
                <div class="container">
                    <div class="col-lg-6 col-12 mx-auto dmb-55 tmb-65 text-center">
                        <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block dmb-20 tmb-25">
                            Insights
                        </div>
                        <div class="basker-regular font66 space-0_66 leading70 text-172426 text-center dmb-20 res-font35 res-leading44 res-space-0_35">
                            <?php echo $heading; ?>
                        </div>
                        <div class="filter-button-row activity-category d-lg-flex align-items-center justify-content-center text-nowrap overflow-auto">
                            <button data-category="all"
                                class="category-btn filter-button activity-button tag-button roboto-medium font14 leading19 space-0_14 me-1 border-0 radius5 active">
                                View all
                            </button>
                            <?php foreach ($cats as $cat): ?>
                                <button data-category="<?php echo $cat->slug; ?>" class="category-btn filter-button activity-button tag-button roboto-medium font14 leading19 space-0_14 me-1 radius5 border-0">
                                    <?php echo $cat->name; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="latest-post-card dmb-60">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-12">
                                <div class="pe-lg-5">
                                    <div class="latest-post-img radius30 res-radius20 overflow-hidden tmb-30"><img src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" class="w-100 h-100 object-cover" alt=""></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="d-flex dmb-30 tmb-25">

                                    <?php
                                    $categories = get_the_category($id);
                                    if (!empty($categories)) :
                                    ?>

                                        <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 me-1 d-inline-block">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </div>

                                    <?php endif; ?>
                                    <div
                                        class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 me-1 d-inline-block">
                                        <?php

                                        $total_word_count = 0;
                                        foreach ($news_content as $content_single) {
                                            $content = $content_single['post_content'];
                                            $total_word_count += str_word_count(strip_tags($content));
                                        }

                                        $total_read_time = ceil($total_word_count / 200);
                                        echo $total_read_time . ' min read';
                                        ?>
                                    </div>
                                    <div
                                        class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 me-1 d-inline-block">
                                        <?php echo get_the_date('jS M, Y', $id); ?>
                                    </div>
                                </div>
                                <div class="basker-regular font46 leading56 space-0_46 text-172426 dmb-40 tmb-30 res-font30 res-leading32 res-space-03"><?php echo $main_post_title; ?></div>
                                <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                                    href="<?php echo get_permalink($id); ?>">
                                    Read post
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="row row10 dmb-60" id="postsContainer">
                    </div>
                    <script id="post-template" type="text/x-handlebars-template">
                        {{#each posts}}
                            <div class="col-lg-4 col-md-6 col-12 insights-col dmt-95 tmt-60 tmt-">
                                <a href="{{link}}" class="insights-card d-inline-flex flex-column justify-content-between text-decoration-none card-hover overflow-hidden w-100 h-100">
                                    <div>
                                        <div class="insights-card-img radius15 position-relative dmb-20 overflow-hidden">
                                            <img src="{{thumbnail}}" class="w-100 h-100 object-cover img" alt="">
                                            <div class="dmb-15">
                                                {{#each categories}}
                                                    <div class="bg-1F6678-blur-prefix roboto-medium font14 leading19 space-0_14 text-white position-absolute top-0 end-0 radius5 m-3 bg-prefix">{{name}}</div>
                                                {{/each}}
                                            </div>
                                        </div>
                                        <div class="roboto-medium font22 leading28 space-0_22 text-172426 dmb-25 col-lg-10 res-font18 res-leading26 res-space-0_18">{{title}}</div>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div
                                            class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 d-inline-block me-2">
                                            {{{read_time}}}
                                        </div>
                                        <div
                                            class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 d-inline-block me-2">
                                            {{date}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        {{/each}}
                    </script>

                    <div class="d-flex justify-content-center">
                        <button id="loadMorePost" class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white px-4 text-decoration-none justify-content-center align-items-center transition">
                            Load more +
                        </button>
                    </div>

                </div>
            </section>
        <?php elseif (get_row_layout() == 'faqs') :
            $faqs_display = get_sub_field('faqs_display');
            $prefix = get_sub_field('prefix');
            $heading = get_sub_field('heading');
            $select_faqs = get_sub_field('select_faqs');
        ?>

            <section class="faq-accordion-section">
                <div class="container">
                    <div class="col-lg-4 col-11 dmb-20">
                        <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5 text-uppercase tmb-25 dmb-15">
                            <?php echo $prefix; ?>
                        </div>
                        <div class="basker-regular font56 leading60 res-font35 res-leading44 res-space-0_35 text-172426">
                            <?php echo $heading; ?>
                        </div>
                    </div>
                    <?php if ($faqs_display == "all") :

                        $faq_master = new WP_Query([
                            'post_type' => 'faqs',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);

                    ?>
                        <?php if ($faq_master->have_posts()): ?>
                            <div class="ps-lg-1">
                                <?php
                                while ($faq_master->have_posts()):
                                    $faq_master->the_post();
                                    $id = get_the_ID();
                                    $post_title = get_the_title();
                                    $faq_sontent = get_field('content_faqs', $id);

                                ?>
                                    <div class="col-lg-9 closet-accordion ms-lg-auto">
                                        <div class="accordion-item overflow-hidden">
                                            <div
                                                class="closet-header position-relative dpt-20 dpb-20 d-flex justify-content-between align-items-center cursor-pointer transition">
                                                <div class="basker-regular font30 space-03 leading32 res-font25 res-leading32 res-space-0_35 text-172426"><?php echo $post_title; ?></div>
                                                <div
                                                    class="arrow-bg bg-505050 rounded-circle d-flex justify-content-center align-items-center">
                                                    <div class="accordion-arrow transition">
                                                        <img class="w-100 object-cover" src="<?php echo get_template_directory_uri(); ?>/templates/images/black-plus.svg" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="closet-content dmb-30">
                                                <div class="col-lg-10 col-11">
                                                    <div class="roboto-regular font16 leading19 space-0_16 dmt-20">
                                                        <?php echo $faq_sontent; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <?php if ($faqs_display == "selected") :
                        $select_faqs == get_sub_field('select_faqs');
                    ?>
                        <div class="ps-lg-1">
                            <div class="col-lg-9 closet-accordion ms-lg-auto">
                                <?php foreach ($select_faqs as $select_faq_single) :
                                    $select_faq_single_id = $select_faq_single->ID;
                                    $select_faq_single_title = $select_faq_single->post_title;
                                    $select_faq_single = get_field('content_faqs', $select_faq_single_id);
                                ?>
                                    <div class="accordion-item overflow-hidden">
                                        <div
                                            class="closet-header position-relative dpt-20 dpb-20 d-flex justify-content-between align-items-center cursor-pointer transition">
                                            <div class="basker-regular font30 space-03 leading32 res-font25 res-leading32 res-space-0_35 text-172426"><?php echo $select_faq_single_title; ?></div>
                                            <div
                                                class="arrow-bg bg-505050 rounded-circle d-flex justify-content-center align-items-center">
                                                <div class="accordion-arrow transition">
                                                    <img class="w-100 object-cover" src="<?php echo get_template_directory_uri(); ?>/templates/images/black-plus.svg" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="closet-content dmb-30">
                                            <div class="col-lg-10 col-11">
                                                <div class="roboto-regular font16 leading19 dmt-20">
                                                    <?php echo $select_faq_single; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>



        <?php elseif (get_row_layout() == 'policies') :
            $single_policy = get_sub_field('single_policy');
        ?>

            <section class="privacy-section position-relative">
                <div class="bg--layer position-fixed bottom-0 w-100"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 left-content">
                            <ul class="list-none position-sticky d-inline-flex justify-content-between flex-lg-column flex-row privacy-links mb-0 ps-0"
                                id="privacy-links">
                                <?php foreach ($single_policy as $key => $single_policy_list) :
                                    $heading = $single_policy_list['heading'];
                               
                                ?>
                                    <li class="dmb-10 tmb-40 me-2">
                                        <a class="roboto-medium font14 leading18 text-172426 radius5 py-2 px-2 d-inline-flex justify-content-center text-capitalize text-172426 text-decoration-none transition"
                                            href="#policy-<?php echo $key; ?>"><?php echo $heading; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-9 pe-lg-5">


                            <?php foreach ($single_policy as $key => $single_policy_list) :
                                $heading = $single_policy_list['heading'];
                                $content_repeater = $single_policy_list['content_repeater'];
                            ?>
                                <div class="single-content dpt-100 tpt-65 pe-lg-5" id="policy-<?php echo $key; ?>">
                                    <div class="basker-regular font56 leading60 res-font30 res-leading32 text-172426 text-capitalize dmb-25 tmb-15">
                                        <?php echo $heading; ?>
                                    </div>
                                    <?php foreach ($content_repeater as $key => $content_repeater_single) :
                                        $point_title = $content_repeater_single['point_title'];
                                        $descriptions = $content_repeater_single['descriptions'];
                                    ?>
                                        <div class="dmb-50">
                                            <div class="roboto-medium font16 space-0_16 leading24 text-172426 dmb-5">
                                                <?php echo $key + 1; ?>. <?php echo $point_title; ?>
                                            </div>
                                            <div class="roboto-regular font16 leading24 text-172426 dmb-20">
                                                <?php echo $descriptions; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'spacing') :
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');
            $desktop_mb = $desktop['margin_bottom'];
            $desktop_mb_main = (!empty($desktop['margin_bottom'])) ? " dpb-" : "";
            $tablet_mb = $tablet['margin_bottom'];
            $tablet_mb_main = (!empty($tablet['margin_bottom'])) ? " tpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = (!empty($mobile['margin_bottom'])) ? " mpb-" : "";
        ?>
            <div class="spacing <?php echo $desktop_mb_main;
                                echo $desktop_mb;
                                echo $tablet_mb_main;
                                echo $tablet_mb;
                                echo $mobile_mb_main;
                                echo $mobile_mb; ?>"></div>
<?php
        endif;
    endwhile;
endif;
?>