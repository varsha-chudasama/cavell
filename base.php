<?php

use Curious\Setup;
use Curious\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?> id="body">
  <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
  <?php
  do_action('get_header');
  get_template_part('templates/header');

  include Wrapper\template_path();

  do_action('get_footer');
  get_template_part('templates/footer');
  ?>


  <?php wp_footer(); ?>
</body>

</html>