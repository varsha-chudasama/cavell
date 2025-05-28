<?php
/* Template Name: Events Calendar */
?>

<?php
$event_id = get_the_ID();
$event_location = tribe_get_venue($event_id);
$event_image = get_the_post_thumbnail_url($event_id, 'large');
$event_city = tribe_get_city($event_id);
$event_map_embed = tribe_get_embedded_map($event_id);
$event_country = tribe_get_country($event_id);
$event_address = tribe_get_address($event_id);
$event_phone = tribe_get_phone($event_id);
$event_date = tribe_get_start_date($event_id, false, 'Y-m-d H:i:s');
$event_timestamp = strtotime($event_date);
$formatted_date = date('d M Y', $event_timestamp);
$add_background_video = get_field('add_background_video');
$events_video_group = get_field('events_video_group');
$events_video = $events_video_group['events_video'];
$events_video_file = $events_video_group['events_video_file'];
$events_youtube = $events_video_group['events_youtube'];
$events_vimeo = $events_video_group['events_vimeo'];
$venue_id = tribe_get_venue_id($event_id);
$events_location_content = get_field('events_location_content', $venue_id);

$events_faqs = get_field('events_faqs');
$faq_heading = $events_faqs['heading'];
$faq_sub_heading = $events_faqs['sub_heading'];
$select_faqs = $events_faqs['select_faqs'];

?>


<?php if ($add_background_video == "yes") : ?>
    <section class="event-hero-section">
        <div class="event-full-banner position-relative bg-black">
            <?php if ($events_video == "file") : ?>
                <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                    class="w-100 h-100 object-cover" data-object-fit="cover">
                    <source src="<?php echo $events_video_file['url']; ?>" data-wf-ignore="true" />
                </video>
            <?php endif; ?>
            <?php if ($events_video == "youtube") : ?>
                <iframe class="w-100 h-100 object-cover"
                    src="https://www.youtube.com/embed/<?php echo $events_youtube; ?>?enablejsapi=1&autoplay=1&mute=1&loop=1&playlist=<?php echo $events_youtube; ?>"
                    frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
            <?php endif; ?>
            <?php if ($events_video == "vimeo") : ?>
                <iframe class="w-100 h-100 object-cover vimeo-video"
                    src="https://player.vimeo.com/video/<?php echo $events_vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                    frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                </iframe>

            <?php endif; ?>
            <div class="bg-black-layer position-absolute bottom-0 start-0 w-100"></div>
            <div
                class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                <div class="text-center col-10 col-lg-12">
                    <div class="d-flex justify-content-center align-items-center dmb-15 TMB-25">
                        <div
                            class="bg-prefix bg-00DCC8 roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block me-2">
                            Event
                        </div>
                        <div
                            class="bg-prefix bg-white roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block me-2">
                            <?php echo $event_city; ?>, <?php echo $event_country; ?>
                        </div>
                        <div
                            class="bg-prefix bg-white roboto-medium font14 leading18 space-0_14 text-172426 radius5 py-2 px-4 d-inline-flex">
                            <?php echo esc_html($formatted_date); ?>
                        </div>
                    </div>
                    <div class="basker-regular font76 leading80 space-0_76 text-white dmb-10 res-font35 res-leading44 res-space-0_35">
                        <?php echo get_the_title($event_id) ?>
                    </div>
                    <div class="roboto-regular font16 leading24 space-0_16 text-white dmb-25"><?php echo get_the_excerpt($event_id); ?>
                    </div>
                    <div
                        class="event-card-schedule radius10 dpt-15 dpb-15 d-flex justify-content-center align-items-center w-fit mx-auto"
                        data-event-date="<?php echo esc_attr($event_date); ?>">

                        <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                            <div class="roboto-medium font30 leading26 space-03 text-white countdown-days">00</div>
                            <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Days</div>
                        </div>
                        <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                            <div class="roboto-medium font30 leading26 space-03 text-white countdown-hours">00</div>
                            <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Hours</div>
                        </div>
                        <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                            <div class="roboto-medium font30 leading26 space-03 text-white countdown-minutes">00</div>
                            <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Mins</div>
                        </div>
                        <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                            <div class="roboto-medium font30 leading26 space-03 text-white countdown-seconds">00</div>
                            <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Secs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($add_background_video == "no") : ?>
    <section class="event-container-hero-section">
        <div class="container">
            <div class="event-full-banner position-relative radius20 overflow-hidden">
                <img src="<?php echo $event_image; ?>" alt="" class="w-100 h-100 object-cover">
                <div class="bg-blue-layer h-100 position-absolute bottom-0 start-0 w-100"></div>
                <div
                    class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <div class="d-flex justify-content-center align-items-center dmb-15 tmb-25">
                            <div
                                class="bg-prefix bg-00DCC8 roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block me-2">
                                Event
                            </div>
                            <div
                                class="bg-prefix bg-white roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block me-2">
                                <?php echo $event_location; ?>, <?php echo $event_city; ?>
                            </div>
                            <div
                                class="bg-prefix bg-white roboto-medium font14 leading18 space-0_14 text-172426 radius5 py-2 px-4 d-inline-flex">
                                <?php echo esc_html($formatted_date); ?>
                            </div>
                        </div>
                        <div class="basker-regular font76 leading80 space-0_76 text-white dmb-10 res-font35 res-leading44 res-space-0_35">
                            <?php echo get_the_title($event_id) ?>
                        </div>
                        <div class="roboto-regular font16 leading24 space-0_16 text-white dmb-25"> <?php echo get_the_excerpt($event_id); ?>
                        </div>
                        <div
                            class="event-card-schedule radius10 dpt-15 dpb-15 d-flex justify-content-center align-items-center w-fit mx-auto"
                            data-event-date="<?php echo esc_attr($event_date); ?>">

                            <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                                <div class="roboto-medium font30 leading26 space-03 text-white countdown-days">00</div>
                                <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Days</div>
                            </div>
                            <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                                <div class="roboto-medium font30 leading26 space-03 text-white countdown-hours">00</div>
                                <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Hours</div>
                            </div>
                            <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                                <div class="roboto-medium font30 leading26 space-03 text-white countdown-minutes">00</div>
                                <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Mins</div>
                            </div>
                            <div class="event-card-time d-flex flex-column justify-content-center align-items-center px-3">
                                <div class="roboto-medium font30 leading26 space-03 text-white countdown-seconds">00</div>
                                <div class="roboto-regular font12 leading26 space-0_12 text-white opacity-50">Secs</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
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


<?php echo do_shortcode('[page_builder]'); ?>


<div class="dpt-160"></div>
<section class="location-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 ">
                <div class="col-lg-11 pe-lg-5">
                    <div class="location-img radius30 overflow-hidden tmb-30">
                        <?php echo $event_map_embed; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="ps-lg-2 pe-lg-5">
                    <div
                        class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 space-0_18 text-172426 radius5 d-inline-block dmb-20">
                        Location
                    </div>
                    <div class="basker-regular font56 leading60 space-0_56 text-172426 dmb-30 res-font25 res-leading32 res-space-0_25 tmb-20"><?php echo $event_location; ?></div>
                    <div class="d-inline-flex flex-column">
                        <div
                            class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 py-2 px-4 w-fit dmb-15">
                            <?php echo $event_address; ?>
                        </div>
                        <div
                            class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading18 space-0_14 text-172426 radius5 py-2 px-4 w-fit dmb-15">
                            <?php echo $event_phone; ?>
                        </div>
                    </div>
                    <div class="roboto-regular font16 leading24 space-0_16 text-172426 dmb-30 pe-3 pe-lg-0 tmb-40">
                        <?php echo $events_location_content; ?>
                    </div>
                    <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition"
                        href="/">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="dpt-110"></div>
<section class="faq-accordion-section">
    <div class="container">
        <div class="col-lg-4 col-11 dmb-20">
            <div class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5 text-uppercase tmb-25 dmb-15">
                <?php echo $faq_heading; ?>
            </div>
            <div class="basker-regular font56 leading60 res-font35 res-leading44 res-space-0_35 text-172426">
                <?php echo $faq_sub_heading; ?>
            </div>
        </div>
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
    </div>
</section>