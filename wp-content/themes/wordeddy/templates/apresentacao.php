<?php
/**
 * Template Name: Apresentação
 */
get_header(); ?>

<div class="apresentacao">
  <div class="area-banner">
    <button type="button" class="banner-apresentacao d-flex align-items-center" data-toggle="modal" data-target="#modal-apresentacao">
      <video autoplay muted loop>
        <source src="<?php the_field('video_banner'); ?>" type="video/mp4">
      </video>
      <div class="container d-flex justify-content-center">
        <h1 class="gs_reveal gs_reveal_fromTop"> <?php the_field('titulo_banner'); ?> </h1>
      </div>
    </button>
    <a href="#destaques" class="go-next ease-scroll">
      <i class="fas fa-chevron-down"></i>
    </a>
  </div>

  <div class="modal modal-video fade" id="modal-apresentacao" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button class="btn-close-modal" type="button" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
          <iframe src="<?php the_field('video_vimeo'); ?>" frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

    <div class="back-blue" id="destaques">
      <div class="container">
        <div class="content"></div>
      </div>
    </div>

    <?php if(get_field('video_destaque')['type'] === 'video'): ?>
      <video autoplay muted loop class="video-destaque">
        <source src="<?php echo get_field('video_destaque')['url']; ?>" type="video/mp4">
      </video>
    <?php endif; ?>
    <?php if(get_field('video_destaque')['type'] === 'image'): ?>
      <img src="<?php echo get_field('video_destaque')['url']; ?>" alt="photo" class="imagem-destaque">
    <?php endif; ?>

    <?php if( have_rows('destaques') ): ?>
      <div class="slider gallery">
        <?php while( have_rows('destaques') ): the_row(); ?>
          <div class="item-gallery">
            <?php if(get_sub_field('arquivo')['type'] === 'video'): ?>
              <video autoplay muted loop>
                <source src="<?php echo get_sub_field('arquivo')['url']; ?>" type="video/mp4">
              </video>
            <?php endif; ?>
            <?php if(get_sub_field('arquivo')['type'] === 'image'): ?>
              <img src="<?php echo get_sub_field('arquivo')['url']; ?>" alt="photo">
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    
    <div class="back-blue bottom">
      <div class="container">
        <div class="content big"></div>
      </div>
    </div>

  <?php if( have_rows('videos') ): ?>
    <div class="area-videos">
      <div class="container">
        <div class="row">
          <?php $cont = 0; while( have_rows('videos') ): the_row(); ?>
            <div class="col-lg-4">
              <button type="button" class="item-video gs_reveal gs_reveal_fromRight" style="background-image: url(<?php echo get_sub_field('thumb'); ?>)" data-toggle="modal" data-target="#modal-video-<?php echo $cont; ?>">
                <div class="content">
                  <img src="<?php bloginfo('template_directory'); ?>/images/btn-play.png" alt="btn-play">
                  <p><?php echo get_sub_field('titulo'); ?></p>
                  <p class="d-none link-video"><?php echo get_sub_field('video'); ?></p>
                </div>
              </button>
            </div>
          <?php $cont++; endwhile; ?>
        </div>
      </div>

      <?php $cont = 0; while( have_rows('videos') ): the_row(); ?>
        <div class="modal modal-video fade" id="modal-video-<?php echo $cont; ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button class="btn-close-modal" type="button" data-dismiss="modal" aria-label="Close">
                  <i class="fas fa-times"></i>
                </button>
                <iframe src="<?php the_sub_field('video'); ?>" frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      <?php $cont++; endwhile; ?>
    </div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>