<?php get_header(); 
wp_reset_query(); ?>

<div class="header-black"></div>

<div class="area-page">
  <div class="container">
    <h1 class="mb-5"><?php the_title(); ?></h1>
    <div class="content-page"><?php the_content() ?></div>
  </div>
</div>

<?php get_footer(); ?>
