<?php get_template_part('parts/head'); ?>

<header class="main-header">
  <div class="content container d-flex align-items-center justify-content-between">
    <a href="<?php bloginfo('url') ?>" class="d-block">
      <img src="<?php the_field('logotipo', 'options') ?>" alt="logotipo" class="logotipo">
    </a>
    <button type="button">
      Menu <i class="fas fa-ellipsis-v"></i>
    </button>
  </div>

  <div class="menu-open-modal">
    <button type="button" class="bg-close"></button>
    <div class="menu-open">
      <div class="d-flex justify-content-end w-100">
        <button class="btn-close">
          Close <i class="fas fa-times"></i>
        </button>
      </div>

      <?php wp_nav_menu(array('menu' => 'primary', 'items_wrap' => '<ol id="%1$s" class="%2$s">%3$s</ol>',)); ?>
      
      <?php if(get_field('whatsapp', 'options')): ?>
        <div class="whats-talk">
          <p class="talk">Let's talk.</p>
          <div class="area-number">
            <p class="num"><?php the_field('whatsapp', 'options') ?></p>
            <div class="text-whats d-flex align-items-center">
              <p>WhatsApp</p>
              <i class="fab fa-whatsapp"></i>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</header>