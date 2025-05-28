import Handlebars from 'handlebars';

export class Filter {
    init() {


        $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = 12;

            function loadPosts(page) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_teams',
                        page: page,
                        posts_per_page: postsPerPage
                    },
                    success: function (response) {
                        if (response.success) {
                            renderPosts(response.data.posts);

                            if (response.data.posts.length < postsPerPage) {
                                $('#loadMore').hide();
                            } else {
                                $('#loadMore').show();
                            }
                        } else {
                            console.error('No posts found.');
                            $('#loadMore').hide();
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    }
                });
            }

            function renderPosts(posts) {
                const source = $("#team-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#teamsContainer').append(html);
            }

            $('#loadMore').click(function () {
                currentPage++;
                loadPosts(currentPage);
            });

            loadPosts(currentPage);
        });

    $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = 6;

            function loadPosts(category, page) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_posts',
                        category: category,
                        page: page,
                        posts_per_page: postsPerPage
                    },
                    success: function (response) {
                        if (response.success) {
                            renderPosts(response.data.posts);



                            if (response.data.posts.length < postsPerPage) {

                                $('#loadMorePost').hide();
                            } else {

                                $('#loadMorePost').show();
                            }
                        } else {
                            console.error('No posts found.');
                            $('#loadMorePost').hide();
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    }
                });
            }

            function renderPosts(posts) {
                const source = $("#post-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#postsContainer').append(html);
            }


            $('.category-btn').click(function () {
                currentPage = 1;
                $('#postsContainer').empty();
                const category = $(this).data('category');

                $('.category-btn').removeClass('active');
                $(this).addClass('active');

                loadPosts(category, currentPage);
            });

            $('#loadMorePost').click(function () {
                currentPage++;
                loadPosts($('.category-btn.active').data('category'), currentPage);
            });

            loadPosts('all', currentPage);
        });

	

    }


}