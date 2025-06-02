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
                              
                                    <div class="carousel-item h-100">
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
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>