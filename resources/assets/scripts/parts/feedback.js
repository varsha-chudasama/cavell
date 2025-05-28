import Handlebars from 'handlebars';

export class Feedback {
    init() {
        this.feedbackFilter();
        this.reportsFilter();

    }

    feedbackFilter() {
        jQuery(document).ready(function ($) {
            let currentPage = 1;
            const postsPerPage = 6;
            const source = document.getElementById('feedback-template').innerHTML;
            const template = Handlebars.compile(source);
            function loadFeedback() {
                $.ajax({
                    url: ajax_params.ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'load_feedback_posts',
                        page: currentPage,
                        posts_per_page: postsPerPage,
                        post_ids: selectedFeedbackIDs
                    },
                    beforeSend: function () {
                        $('#loadMoreFeedback').text('Loading...');
                    },
                    success: function (response) {
                        if (response.success && response.data.posts.length > 0) {
                            // const html = template({ posts: response.data.posts });
                            // $('#feedbackContainer').append(html);
                            renderFeedback(response.data.posts)
                            currentPage++;
                            if (!response.data.has_more) {
                                $('#loadMoreFeedback').hide();
                            } else {
                                $('#loadMoreFeedback').text('View more');
                            }
                        } else {
                            $('#loadMoreFeedback').hide();
                        }
                    },
                    error: function () {
                        $('#loadMoreFeedback').text('Try Again');
                    }
                });
            }
            loadFeedback();
            $('#loadMoreFeedback').on('click', function (e) {
                e.preventDefault();
                loadFeedback();
            });
        });

         function renderFeedback(posts) {
            // Clear previous content if needed
            // $('#col-0, #col-1, #col-2').empty();

            posts.forEach(function(post, index) {
                // Create the HTML block manually
                var html = `
                    <div class="review-cards bg-white radius20 mb-4">
                        <div class="review-logo">
                            <img src="${post.thumbnail}" class="h-100" alt="">
                        </div>
                        <div class="roboto-regular font16 leading21 space-0_16 dmb-30 text-172426">${post.content}</div>
                        <div class="roboto-regular font14 leading19 space-0_14 text-172426"><b>${post.title}</b> - ${post.excerpt}</div>
                    </div>
                `;

                // Determine column based on index
                var columnIndex = index % 3;
                $('#col-' + columnIndex).append(html);
            });
        }
    }

    reportsFilter() {
        jQuery(document).ready(function ($) {
            function loadReports(category = '') {
                $.ajax({
                    url: ajaxurl, // WordPress provides this variable if added properly in localized script
                    method: 'POST',
                    data: {
                        action: 'load_reports_by_category',
                        category: category
                    },
                    beforeSend: function () {
                        $('#reportsContainer').html('<div class="text-center">Loading...</div>');
                    },
                    success: function (response) {
                        var template = Handlebars.compile($('#reports-template').html());
                        var html = template({ reports: response });
                        $('#reportsContainer').html(html);
                    }
                });
            }

            // Initial load (all reports)
            loadReports();

            // Filter buttons
            $('.category-btn').on('click', function () {
                var category = $(this).data('category');
                $('.category-btn').removeClass('active');
                $(this).addClass('active');
                loadReports(category);
            });
        });

    }
}
