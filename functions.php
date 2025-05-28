<?php
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');



if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Theme Options',
      'menu_title' => 'Theme Options',
      'menu_slug' => 'theme-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}


add_action('init', 'feedback_custom_post_type');
function feedback_custom_post_type()
{
  register_post_type(
    'feedback',
    array(
      'labels' => array(
        'name' => __("Feedback", 'textdomain'),
        'singular_name' => __("Feedback", 'textdomain'),
        'add_new' => __("Add Feedback", 'textdomain'),
        'add_new_item' => __("Add New Feedback", 'textdomain'),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'feedback', 'with_front' => false),
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),

      'menu_icon' => 'dashicons-feedback',
      'show_in_rest' => true,
    )
  );
}

add_action('init', 'teams_custom_post_type');
function teams_custom_post_type()
{
  register_post_type(
    'teams',
    array(
      'labels' => array(
        'name' => __("Team", 'textdomain'),
        'singular_name' => __("Team", 'textdomain'),
        'add_new' => __("Add Team", 'textdomain'),
        'add_new_item' => __("Add New Team", 'textdomain'),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'teams', 'with_front' => false),
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),

      'menu_icon' => 'dashicons-admin-users',
      'show_in_rest' => true,
    )
  );
}

add_action('init', function () {
  register_post_type('reports', array(
    'labels' => array(
      'name' => __("Research Reports", 'textdomain'),
      'singular_name' => __("Research Report", 'textdomain'),
      'add_new' => __("Add Research Report", 'textdomain'),
      'add_new_item' => __("Add New Research Report", 'textdomain'),
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
    'rewrite' => array('slug' => 'reports', 'with_front' => false),

    'menu_icon' => 'dashicons-text-page',
    'show_in_rest' => true,
  ));

  register_taxonomy('reports_category', 'reports', array(
    'labels' => array(
      'name' => __('Research Report Categories', 'textdomain'),
      'singular_name' => __('Research Report Category', 'textdomain'),
      'search_items' => __('Search Categories', 'textdomain'),
      'all_items' => __('All Categories', 'textdomain'),
      'edit_item' => __('Edit Category', 'textdomain'),
      'update_item' => __('Update Category', 'textdomain'),
      'add_new_item' => __('Add New Category', 'textdomain'),
      'new_item_name' => __('New Category Name', 'textdomain'),
      'menu_name' => __('Categories', 'textdomain'),
    ),
    'hierarchical' => true,
    'public' => true,
    'rewrite' => array('slug' => 'reports-category', 'with_front' => false),
    'show_in_rest' => true,
  ));
});


// Enqueue JS
function enqueue_feedback_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('feedback-ajax', get_template_directory_uri() . '/resources/assets/scripts/parts/feedback.js', ['jquery'], '1.0', true);
  wp_localize_script('feedback-ajax', 'ajax_params', [
    'ajax_url' => admin_url('admin-ajax.php'),
  ]);
}
add_action('wp_enqueue_scripts', 'enqueue_feedback_scripts');

function load_feedback_posts()
{
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 3;
  $post_ids = isset($_POST['post_ids']) ? array_map('intval', $_POST['post_ids']) : [];

  if (empty($post_ids)) {
    wp_send_json_success(['posts' => [], 'has_more' => false]);
  }

  $args = [
    'post_type' => 'feedback',
    'post__in' => $post_ids,
    'orderby' => 'post__in',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
  ];

  $query = new WP_Query($args);
  $posts = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $id = get_the_ID();
      $posts[] = [
        'title' => get_the_title($id),
        'content' => apply_filters('the_content', get_post_field('post_content', $id)),
        'excerpt' => get_the_excerpt($id),
        'thumbnail' => get_the_post_thumbnail_url($id),
      ];
    }
    wp_reset_postdata();
  }

  // Check if there are more posts
  $total_found = $query->found_posts;
  $has_more = ($paged * $posts_per_page) < $total_found;

  wp_send_json_success([
    'posts' => $posts,
    'has_more' => $has_more
  ]);
}


add_action('wp_ajax_load_feedback_posts', 'load_feedback_posts');
add_action('wp_ajax_nopriv_load_feedback_posts', 'load_feedback_posts');



add_action('wp_ajax_load_reports_by_category', 'load_reports_by_category');
add_action('wp_ajax_nopriv_load_reports_by_category', 'load_reports_by_category');

function load_reports_by_category()
{
  $category = sanitize_text_field($_POST['category'] ?? '');

  $args = [
    'post_type' => 'reports',
    'posts_per_page' => -1,
  ];

  if (!empty($category)) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'reports_category',
        'field'    => 'slug',
        'terms'    => $category,
      ]
    ];
  }

  $query = new WP_Query($args);

  $reports = [];

  while ($query->have_posts()) {
    $query->the_post();

    $reports[] = [
      'title'     => get_the_title(),
      'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
      'content'   => get_the_content(),
      'link'      => get_permalink(),
    ];
  }

  wp_send_json($reports);
}


function enqueue_event_countdown_script()
{
  if (!is_admin()) {
    wp_enqueue_script(
      'event-countdown',
      get_template_directory_uri() . '/resources/assets/scripts/parts/countdown.js',
      array(),
      '1.0',
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'enqueue_event_countdown_script');


function cavell_include_page_builder()
{
  ob_start();
  include get_template_directory() . '/templates/page-builder.php';
  return ob_get_clean();
}
add_shortcode('page_builder', 'cavell_include_page_builder');


add_action('init', 'speakers_custom_post_type');
function speakers_custom_post_type()
{
  register_post_type(
    'speakers',
    array(
      'labels' => array(
        'name' => __("Speakers", 'textdomain'),
        'singular_name' => __("Speakers", 'textdomain'),
        'add_new' => __("Add Speakers", 'textdomain'),
        'add_new_item' => __("Add New Speakers", 'textdomain'),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'speakers', 'with_front' => false),
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),

      'menu_icon' => 'dashicons-admin-users',
      'show_in_rest' => true,
    )
  );
}


add_action('init', 'faqs_custom_post_type');
function faqs_custom_post_type()
{
  register_post_type(
    'faqs',
    array(
      'labels' => array(
        'name' => __("Faqs", 'textdomain'),
        'singular_name' => __("Faqs", 'textdomain'),
        'add_new' => __("Add Faqs", 'textdomain'),
        'add_new_item' => __("Add New Faqs", 'textdomain'),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'faqs', 'with_front' => false),
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),

      'menu_icon' => 'dashicons-admin-users',
      'show_in_rest' => true,
    )
  );
}


function enqueue_custom_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/resources/assets/scripts/parts/filter.js', ['jquery'], '1.0', true);

  wp_localize_script('custom-ajax', 'ajax_params', [
    'ajax_url' => admin_url('admin-ajax.php')
  ]);
}


add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function load_teams()
{
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 3;

  $args = [
    'post_type' => 'teams',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
  ];

  $query = new WP_Query($args);
  $posts = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $id = get_the_ID();

      $posts[] = [
        'title' => get_the_title(),
        'thumbnail' => get_the_post_thumbnail_url($id, 'medium_large'),
        'designation' => get_field('designation'),
        'linkedin_link' => get_field('linkedin_link'),
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success(['posts' => $posts]);
}
add_action('wp_ajax_load_teams', 'load_teams');
add_action('wp_ajax_nopriv_load_teams', 'load_teams');







function load_posts()
{
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 3;

  $args = [
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
  ];

  if ($category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $category,
      ],
    ];
  }

  $query = new WP_Query($args);
  $posts = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $id = get_the_ID();
      $categories = get_the_terms($id, 'category');
      $category_data = [];
      if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
          $category_data[] = [
            'name' => $category->name,
            'slug' => $category->slug,
          ];
        }
      }
      $posts[] = [
        'title' => get_the_title(),
        'content' => get_the_content(),
        'excerpt' => get_the_excerpt(),
        'link' => get_permalink($id),
        'thumbnail' => get_the_post_thumbnail_url($id,'medium_large'),
        'date' => get_the_date('d F Y', $id),
        'date' =>  $content = get_post_field('post_content', $select_post_single_id);
                                        $word_count = str_word_count(strip_tags($content));
                                        $read_time = ceil($word_count / 200);


 
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success(['posts' => $posts]);
}
add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');
