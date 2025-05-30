<?php
$report_archive_content = get_field('report_archive_content', 'option');
$report_hero_image = get_field('report_hero_image');

$report_archive_content_labels = $report_archive_content['labels'];
$report_archive_content_links = $report_archive_content['links'];
$back_link = $report_archive_content['back_link'];

?>

<section class="full-text-image-card-section dpt-155">
    <div class="container">
        <div class="full-text-img-card dpt-50 dpb-45 tpt-15 tpb-60 radius30 res-radius20">
            <div class="row align-items-center flex-column-reverse flex-lg-row">
                <div class="col-lg-7 col-12">
                    <div class="col-12 pe-4">
                        <div class="prefix-container dmb-15">
                            <?php if (!empty($back_link['url'])):
                                $target_2 = ($back_link['target'] == '_blank') ? "_blank" : ""; ?>
                                <a href="<?php echo $back_link['url']; ?>"
                                    class="bg-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-white radius5 d-inline-flex me-2" target="<?php echo $target_2; ?>">
                                    <?php echo $back_link['title']; ?>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($report_archive_content_labels)): ?>
                                <?php foreach ($report_archive_content_labels as $report_archive_content_label) :
                                    $report_archive_content_label_single = $report_archive_content_label['label'];
                                ?>
                                    <div
                                        class="bg-prefix text-decoration-none roboto-medium font14 leading19 space-0_14 text-white radius5 d-inline-flex me-2">
                                        <?php echo $report_archive_content_label_single; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="basker-regular font66 leading70 space-0_66 text-white dmb-15 res-font30 res-leading32 res-space-03 dmb-15">
                            <?php echo get_the_title(); ?>
                        </div>
                        <div class="roboto-regular font20 leading28 space-02 text-white dmb-25 pe-lg-5 res-font16 res-leading24 res-space-0_16 tmb-40">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                        <div class="full-text-img-buttons">
                            <?php if (!empty($report_archive_content_links)): ?>
                                <?php foreach ($report_archive_content_links as $report_archive_content_link) :
                                    $report_archive_content_link_single = $report_archive_content_link['link'];
                                ?>
                                    <?php if (!empty($report_archive_content_link_single['url'])):
                                        $target_2 = ($report_archive_content_link_single['target'] == '_blank') ? "_blank" : ""; ?>
                                        <a class="btnA bg-00DCC8-btn roboto-medium font16 space-0_16 radius5 text-decoration-none d-inline-flex justify-content-center align-items-center transition mx-lg-1 tmb-10"
                                            href="  <?php echo $report_archive_content_link_single['url']; ?>" target="<?php echo $target_2; ?>">
                                            <?php echo $report_archive_content_link_single['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 ps-lg-5">
                    <?php if (!empty($report_hero_image)): ?>
                        <div class="full-text-img w-100 radius30 res-radius20 overflow-hidden dmb-30">
                            <img src="<?php echo $report_hero_image; ?>" alt="" class="w-100 h-100 object-cover">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'templates/page-builder.php'; ?>