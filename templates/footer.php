<?php
$footer_banner = get_field('footer_banner');
$custom_banner = get_field('custom_banner');

$banner_section = get_field('banner_section', 'option');
$banner_section_image = $banner_section['image'];
$banner_section_heading = $banner_section['heading'];
$banner_section_link = $banner_section['link'];
$logo = get_field('logo', 'option');
$content = get_field('content', 'option');
$button = get_field('button', 'option');
$social_media = get_field('social_media', 'option');
$menu_column = get_field('menu_column', 'option');
$menu_column_links = $menu_column['links'];
$sub_footer_links = get_field('sub_footer_links', 'option');
$sub_footer_links_repeater = $sub_footer_links['links'];
$copy_rights_content = get_field('copy_rights_content', 'option');
$website_develop_by = get_field('website_develop_by', 'option');
$copy_rights_content = get_field('copy_rights_content', 'option');
$website_develop_by_link = get_field('website_develop_by_link', 'option');
?>

<?php if ($footer_banner == "global") : ?>
    <section class="cavell-full-banner">
        <div class="container">
            <div class="cavell-full-banner-img position-relative radius20 overflow-hidden">
                <img class="w-100 h-100 object-cover" src="<?php echo $banner_section_image['url']; ?>" alt="banner-image">
                <div class="position-absolute top-left-center w-100 z-3">
                    <div class="mx-auto">
                        <div class="basker-regular font60 space-06 leading60 text-white text-center dmb-20 res-font35 res-leading44 res-space-0_35 px-4 px-lg-0">
                            <?php echo $banner_section_heading; ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btnA bg-172426-white-btn roboto-medium font16 leading21 text-white text-capitalize radius5 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                                href="<?php echo $banner_section_link['url']; ?>">
                                <?php echo $banner_section_link['title']; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity10"></div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($footer_banner == "custom") :
    $banner_image = $custom_banner['banner_image'];
    $banner_title = $custom_banner['banner_title'];
    $banner_button_type = $custom_banner['banner_button_type'];
    $banner_link = $custom_banner['banner_link'];
    $banner_file = $custom_banner['banner_file'];
    $banner_text = $custom_banner['banner_text'];

?>
    <section class="cavell-full-banner">
        <div class="container">
            <div class="cavell-full-banner-img position-relative radius20 overflow-hidden">
                <img class="w-100 h-100 object-cover" src="<?php echo $banner_image; ?>" alt="banner-image">
                <div class="position-absolute top-left-center w-100 z-3">
                    <div class="mx-auto">
                        <div class="basker-regular font60 space-06 leading60 text-white text-center dmb-20 res-font35 res-leading44 res-space-0_35 px-4 px-lg-0">
                            <?php echo $banner_title; ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <?php if ($banner_button_type == "link") : ?>
                                <a class="btnA bg-172426-white-btn roboto-medium font16 leading21 text-white text-capitalize radius5 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                                    href="<?php echo $banner_link['url']; ?>">
                                    <?php echo $banner_link['title']; ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($banner_button_type == "pdf") : ?>
                                <a download target="_blank" class="btnA bg-172426-white-btn roboto-medium font16 leading21 text-white text-capitalize radius5 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                                    href="<?php echo $banner_file['url']; ?>">
                                    <?php echo $banner_text; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity10"></div>
            </div>
        </div>
    </section>
<?php endif; ?>

<footer class="footer tmt-80 tmb-40 dmt-75 dmb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="col-lg-5 col-10 tmb-50">
                        <div class="col-7">
                            <div class="footer-logo tmb-15 dmb-25">
                                <img src="<?php echo $logo; ?>" class="h-100" alt="">
                            </div>
                            <div class="roboto-regular font16 leading24 space-0_16 text-172426">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-inline-flex justify-content-center align-items-center transition dmt-120 tmt-35 d-lg-none"
                            href="<?php echo $button['url']; ?>">
                            <?php echo $button['title']; ?>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 tmb-20">
                        <ul class="list-none ps-0 mb-0 d-flex flex-wrap">
                            <?php foreach ($menu_column_links as $menu_column_link) :
                                $menu_column_link_single = $menu_column_link['link'];
                            ?>
                                <li class="dmb-20 col-6">
                                    <a href="<?php echo $menu_column_link_single['url'] ?>"
                                        class="text-decoration-none roboto-regular font16 leading21 space-0_16 text-172426 res-font14 res-space-0_14"><?php echo $menu_column_link_single['title'] ?></a>
                                </li>
                            <?php endforeach; ?>



                        </ul>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-row">
                    <div class="col-lg-5">
                        <a class="btnA bg-172426-btn roboto-medium font16 space-0_16 radius5 text-white text-decoration-none d-lg-inline-flex justify-content-center align-items-center transition dmt-120 d-none"
                            href="">
                            Member login
                        </a>
                    </div>
                    <div class="col-lg-7">
                        <ul class="social-media list-none ps-0 tmb-55 dmb-35 d-flex align-items-center dmt-90 tmt-0">
                            <?php foreach ($social_media as $social_media_single) :
                                $social_media_single_icon = $social_media_single['icon'];
                                $social_media_single_url = $social_media_single['url'];
                            ?>
                                <li class="mx-2">
                                    <a href="<?php echo $social_media_single_url; ?>" target="_blank" class="d-flex align-items-center justify-content-center">
                                        <img src="<?php echo $social_media_single_icon; ?>" alt="">
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="col-lg-11 col-12 ms-auto tmb-40">
                    <div class="footer-form radius20">
                        <div>Subscribe to our newsletter for the latest updates.</div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="footer-menu list-none ps-0 mb-0 d-flex justify-content-center d-lg-none">
            <li class="mx-2">
                <a href=""
                    class="text-decoration-none roboto-regular font14 leading21 space-0_14 text-172426">Terms</a>
            </li>
            <li class="mx-2">
                <a href=""
                    class="text-decoration-none roboto-regular font14 leading21 space-0_14 text-172426">Policies</a>
            </li>
            <li class="mx-2">
                <a href=""
                    class="text-decoration-none roboto-regular font14 leading21 space-0_14 text-172426">Legal</a>
            </li>
        </ul>
        <div class="dmt-30 tmt-20 tmb-20 border-bottom dmb-30"></div>
        <div class="row">
            <div class="col-lg-7 d-flex justify-content-center justify-content-lg-start">
                <div class="col-lg-4 tmb-30">
                    <div class="roboto-regular font14 leading21 space-0_14 text-172426 ">
                        <?php echo $copy_rights_content; ?>
                    </div>
                </div>
                <div class="col-lg-4 ps-5 d-lg-flex d-none">
                    <ul class="footer-menu list-none ps-0 mb-0 d-flex">
                        <?php foreach ($sub_footer_links_repeater as $sub_footer_links_repeater_opem) :
                            $sub_footer_links_repeater_opem_links = $sub_footer_links_repeater_opem['link'];
                        ?>
                            <li class="mx-2">
                                <a href="<?php echo $sub_footer_links_repeater_opem_links['url']; ?>"
                                    class="text-decoration-none roboto-regular font14 leading21 space-0_14 text-172426"><?php echo $sub_footer_links_repeater_opem_links['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <a href="<?php echo $website_develop_by_link; ?>" target="_blank"
                    class="text-decoration-none roboto-regular font14 leading21 space-0_14 text-172426 d-flex justify-content-center justify-content-lg-end">
                    <?php echo $website_develop_by; ?>
                </a>
            </div>
        </div>
    </div>
</footer>