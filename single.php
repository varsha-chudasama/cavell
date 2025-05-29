       <?php
        $news_content = get_field('news_content');
        $article_by = get_field('article_by');

        ?>
       <div class="dpt-180 tpt-130"></div>

       <section class="insights-open-content-section">
           <div class="container px-p-0">
               <div class="row">
                   <div class="col-lg-3">
                       <div class="d-flex justify-content-between flex-column left-content position-sticky">
                           <div class="">
                               <div class="tmb-45 dmb-50 px-p-p">
                                   <a class="roboto-medium font14 leading26 text-172426 text-decoration-none"
                                       href="/insights/">Back
                                       to
                                       all</a>
                               </div>
                               <div class="ps-p-p">
                                   <ul class="list-none mb-0 ps-0 d-flex flex-lg-column flex-row" id="privacy-links">
                                       <?php foreach ($news_content as $key => $content_single) :
                                            $content_single_heading = $content_single['heading'];

                                        ?>
                                           <li class="ps-lg-3 dpt-10 dpb-10 tpt-0 tpb-0">
                                               <a class="roboto-regular font16 spacing-0_16 leading24 d-flex align-items-center text-172426 text-decoration-none"
                                                   href="#inslight-<?php echo $key; ?>"><?php echo $content_single_heading; ?></a>
                                           </li>
                                       <?php endforeach; ?>
                                   </ul>
                               </div>
                           </div>
                           <?php
                            $team_id = $article_by->ID;
                            $title = $article_by->post_title;
                            $team_image = get_the_post_thumbnail_url($team_id);
                            ?>
                           <div class="d-lg-flex align-items-center d-none">
                               <div class="left-content-img radius10 overflow-hidden me-4 bg-black">
                                    <img class="w-100 h-100 object-cover" src="<?php echo $team_image; ?>"
                                        alt="Blog-open">
                               </div>
                               <div>
                                   <div class="roboto-regular font16 leading21 text-172426">
                                       Article by
                                   </div>
                                   <div class="roboto-medium font16 leading21">
                                       <?php echo $title; ?>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-9 px-p-p tmt-50">
                       <div class="col-lg-10 pe-lg-5">
                           <div class="dmb-25 tmb-50">
                               <?php
                                $categories = get_the_category($id);
                                if (!empty($categories)) :
                                ?>
                                   <div
                                       class="bg-prefix bg-00DCC8-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5">
                                       <?php echo esc_html($categories[0]->name); ?>
                                   </div>
                               <?php endif; ?>
                               <div
                                   class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5">
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
                                   class="bg-prefix bg-1F6678-prefix roboto-medium font14 leading19 text-172426 d-inline-flex radius5">
                                   <?php echo get_the_date('jS M, Y', $id); ?>
                               </div>
                           </div>
                           <div
                               class="basker-regular font56 space-0_56 leading60 res-font30 res-leading32 res-space-03 text-172426 dmb-20 tmb-15 pe-3 pe-lg-0">
                               <?php echo get_the_title(); ?>
                           </div>
                           <div
                               class="roboto-regular font22 leading30 space-0_22 res-font16 res-leading24 res-space-0_16 text-172426 pe-5 pe-lg-0">
                               <?php echo get_the_content(); ?>
                           </div>
                       </div>

                       <?php foreach ($news_content as $key => $content_single) :
                            $content_single_media = $content_single['media'];
                            $content_single_heading = $content_single['heading'];
                            $content_single_post_content = $content_single['post_content'];
                            $content_single_image = $content_single['image'];
                            $content_single_video = $content_single['video'];
                            $content_single_youtube = $content_single['youtube'];
                            $content_single_vimeo = $content_single['vimeo'];

                            $link_option = $content_single['link_option'];
                            $link = $content_single['link'];
                            $button_text = $content_single['button_text'];
                            $button_file = $content_single['button_file'];


                        ?>
                           <div class="col-lg-11" id="inslight-<?php echo $key; ?>">
                                <div class="pe-lg-3">
                                    <div class="video-content position-relative radius20 overflow-hidden dmt-35 tmb-50 dmb-70">
    
                                        <?php if ($content_single_media == "thumbnail") : ?>
                                            <img class="w-100 h-100 object-cover" src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" alt="">
                                        <?php endif; ?>
    
    
                                        <?php if ($content_single_media == "image" || $content_single_media == "video" || $content_single_media == "youtube" || $content_single_media == "vimeo") : ?>
                                            <img class="w-100 h-100 object-cover" src="<?php echo $content_single_image; ?>" alt="">
                                        <?php endif; ?>
    
                                        <div class="position-absolute top-left-center cursor-pointer">
                                            <?php if ($content_single_media == "youtube") : ?>
                                                <div data-type="iframe" data-fancybox="gallery"
                                                    data-src="https://www.youtube.com/embed/<?php echo $content_single_youtube; ?>?autoplay=1&mute=1&playlist=<?php echo $content_single_youtube; ?>&loop=1"
                                             >
                                                   <div class="play-button play-btn d-flex align-items-center justify-content-center">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/play.svg" class="me-1" alt="">
                                                            <div class="roboto-medium font16 leading21 space-0_16 text-white">
                                                                Play Video
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php endif; ?>
    
                                            <?php if ($content_single_media == "vimeo") : ?>
                                                <div
                                                    data-type="iframe"
                                                    data-fancybox="gallery"
                                                    data-src="https://player.vimeo.com/video/<?php echo $content_single_vimeo; ?>?autoplay=1&muted=1&loop=1&background=1&badge=0"
                                                  >
                                                   <div class="play-button play-btn d-flex align-items-center justify-content-center">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/play.svg" class="me-1" alt="">
                                                            <div class="roboto-medium font16 leading21 space-0_16 text-white">
                                                                Play Video
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php endif; ?>
    
                                            <?php if ($content_single_media == "video") : ?>
    
                                                <div data-type="video" data-fancybox="gallery"
                                                    data-src="<?php echo $content_single_video['url']; ?>">
                                                        <div class="play-button play-btn d-flex align-items-center justify-content-center">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/images/play.svg" class="me-1" alt="">
                                                            <div class="roboto-medium font16 leading21 space-0_16 text-white">
                                                                Play Video
                                                            </div>
                                                        </div>
                                                </div>
    
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                           </div>

                           <div class="single-content pe-lg-5">
                               <div class="me-lg-5 pe-5 tmb-65">
                                   <div class="basker-regular font30 leading32 space-03 text-172426 dmb-15">
                                       <?php echo $content_single_heading; ?>
                                   </div>
                                   <div class="roboto-regular font16 leading24 res-space-0_16 text-172426 dmb-25">
                                       <?php echo $content_single_post_content; ?>
                                   </div>
                                   <?php if ($link_option == "link") :

                                    ?>
                                       <?php if (!empty($link['url'])):
                                            $target_2 = ($link['target'] == '_blank') ? "_blank" : ""; ?>
                                           <div class="tmb-65">
                                               <a
                                                   target="<?php echo $target_2; ?>"
                                                   class="btnA bg-172426-btn d-inline-flex align-items-center text-white radius5 text-decoration-none transition"
                                                   href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                           </div>
                                       <?php endif; ?>
                                   <?php endif; ?>

                                   <?php if ($link_option == "file") :

                                    ?>
                                       <?php if (!empty($button_file)): ?>
                                           <div class="tmb-65">
                                               <a download class="btnA bg-172426-btn d-inline-flex align-items-center text-white radius5 text-decoration-none transition"
                                                   href="<?php echo $button_file; ?>"><?php echo $button_text; ?></a>
                                           </div>
                                       <?php endif; ?>
                                   <?php endif; ?>
                               </div>
                               <div class="border border-707070 dmt-100 dmb-100 tmt-65 tmb-45"></div>

                           </div>
                       <?php endforeach; ?>


                        <?php
                            $team_id = $article_by->ID;
                            $title = $article_by->post_title;
                            $team_image = get_the_post_thumbnail_url($team_id);
                            ?>
                           <div class="d-flex align-items-center d-lg-none">
                               <div class="left-content-img radius10 overflow-hidden me-4 bg-black">
                                    <img class="w-100 h-100 object-cover" src="<?php echo $team_image; ?>"
                                        alt="Blog-open">
                               </div>
                               <div>
                                   <div class="roboto-regular font16 leading21 text-172426">
                                       Article by
                                   </div>
                                   <div class="roboto-medium font16 leading21">
                                       <?php echo $title; ?>
                                   </div>
                               </div>
                           </div>
                   </div>
               </div>
           </div>
       </section>

       <div class="dpt-180 tpb-90"></div>