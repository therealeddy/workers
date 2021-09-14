<?php get_header(); ?>

<div class="front-page">

  <div class="area-banner">
    <button type="button" class="banner-home d-flex align-items-center justify-content-start" data-toggle="modal" data-target="#modal-banner">
      <video autoplay muted loop>
        <source src="<?php the_field('video_banner'); ?>" type="video/mp4">
      </video>
      <div class="container">
        <h1 class="gs_reveal gs_reveal_fromLeft"> <?php the_field('titulo_banner'); ?> </h1>
      </div>
    </button>
    <a href="#session-two" class="go-next ease-scroll">
      <i class="fas fa-chevron-down"></i>
    </a>
  </div>

  <div class="modal modal-video fade" id="modal-banner" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button class="btn-close-modal" type="button" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
          

          <?php if(get_field('inserir_link_vimeo_ou_upload') === 'upload'): ?>
            <video controls>
              <source src="<?php the_field('video_upload'); ?>" type="video/mp4">
            </video>
          <?php endif; ?>

          <?php if(get_field('inserir_link_vimeo_ou_upload') === 'vimeo'): ?>
            <iframe src="<?php the_field('video_vimeo'); ?>" frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen></iframe>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="integrar d-flex align-items-center" id="session-two">
    <div class="container">
      <h2 class="title-2 white gs_reveal gs_reveal_fromLeft">
      <?php the_field('titulo_segunda _sessao') ?>
      </h2>
    </div>
    <?php if( have_rows('topicos_segunda_sessao') ): ?>
      <div class="produtos">
        <div class="container">
          <div class="row d-flex justify-content-center">
          <?php $cont = 1; while( have_rows('topicos_segunda_sessao') ): the_row(); ?>
            <div class="col-lg-4 gs_reveal <?php echo $cont % 2 === 0 ? 'gs_reveal_fromTop' : 'gs_reveal_fromBottom'?>">
              <div class="title-item">
                <h3><?php echo get_sub_field('link')['title']; ?></h3>
                <p>0<?php echo $cont; ?>.</p>
              </div>

              <?php if(get_sub_field('arquivo_animado')['type'] === 'video'): ?>
                <a href="<?php echo get_sub_field('link')['url']; ?>" class="link-video">
                  <div class="hover-play"></div>
                  <video autoplay muted loop>
                    <source src="<?php echo get_sub_field('arquivo_animado')['url']; ?>" type="video/mp4">
                  </video>
                </a>
              <?php endif; ?>
              <?php if(get_sub_field('arquivo_animado')['type'] === 'image'): ?>
                <a href="<?php echo get_sub_field('link')['url']; ?>">
                  <div class="hover-play"></div>
                  <div class="img-produto" style="background-image: url(<?php echo get_sub_field('arquivo_animado')['url']; ?>)"></div>
                </a>
              <?php endif; ?>
            </div>
            <?php $cont++; endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="contruir-marcas">
    <div class="container">
      <h2 class="title-2 gs_reveal gs_reveal_fromLeft">
        <?php the_field('titulo_terceira_sessao'); ?>
      </h2>

      <?php if( have_rows('cases_terceira_sessao') ): ?>
        <div class="d-flex area-imagens">
          <?php $cont = 0; while( have_rows('cases_terceira_sessao') ): the_row(); ?>

            <?php if(get_sub_field('arquivo_animado')['type'] === 'video'): ?>
              <button type="button" class="img-back video gs_reveal <?php echo $cont === 0 ? 'gs_reveal_fromBottom' : 'gs_reveal_fromTop'?>" data-toggle="modal" data-target="#modal-case-<?php echo $cont ?>">
                <div class="hover-play"></div>
                <video autoplay muted loop>
                  <source src="<?php echo get_sub_field('arquivo_animado')['url']; ?>" type="video/mp4">
                </video>
              </button>
            <?php endif; ?>
            <?php if(get_sub_field('arquivo_animado')['type'] === 'image'): ?>
              <button type="button" class="img-back gs_reveal <?php echo $cont === 0 ? 'gs_reveal_fromBottom' : 'gs_reveal_fromTop'?>" style="background-image: url(<?php echo get_sub_field('arquivo_animado')['url']; ?>)" data-toggle="modal" data-target="#modal-case-<?php echo $cont ?>">
                <div class="hover-play"></div>
              </button>
            <?php endif; ?>

            <p class="<?php echo $cont === 0 ? 'title-image-left' : 'title-image-right'; ?>"><?php the_sub_field('titulo'); ?></p>
          <?php $cont++; endwhile; ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if( have_rows('cases_segunda_sessao') ): ?>
      <?php $cont = 0; while( have_rows('cases_segunda_sessao') ): the_row(); ?>
        <div class="modal modal-video fade" id="modal-case-<?php echo $cont ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
    <?php endif; ?>

  </div>

  <div class="desvendar d-flex justify-content-center flex-column">
    <div class="container content gs_reveal gs_reveal_fromLeft">
      <img src="<?php the_field('logotipo_secundaria', 'options') ?>" alt="logotipo" class="mb-4 logotipo">
      <h3 class="title-3">
      <?php the_field('texto_quarta_sessao') ?>
      </h3>
    </div>
  </div>

  <div>
    <div class="session-four" style="background-image: url(<?php the_field('imagem_quinta_sessao') ?>)"></div>
  </div>

  <?php if( have_rows('topicos_sexta_sessao') ): ?>
    <div class="session-five">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <?php $cont = 0; while( have_rows('topicos_sexta_sessao') ): the_row(); ?>
            <?php if(get_sub_field('arquivo_animado')['type'] === 'video'): ?>
              <div class="col-lg-4 gs_reveal <?php echo $cont % 2 === 0 ? 'gs_reveal_fromTop' : 'gs_reveal_fromBottom'?>">
                <a href="<?php echo get_sub_field('link'); ?>" class="img-back video">
                  <div class="hover-play"></div>
                  <video autoplay muted loop>
                    <source src="<?php echo get_sub_field('arquivo_animado')['url']; ?>" type="video/mp4">
                  </video>
                </a>
                <p class="<?php echo $cont === 0 ? 'title-image-left' : 'title-image-right'; ?>"><?php the_sub_field('titulo'); ?></p>
              </div>
            <?php endif; ?>
            <?php if(get_sub_field('arquivo_animado')['type'] === 'image'): ?>
              <div class="col-lg-4 gs_reveal <?php echo $cont % 2 === 0 ? 'gs_reveal_fromTop' : 'gs_reveal_fromBottom'?>">
                <a href="<?php echo get_sub_field('link'); ?>" class="img-back" style="background-image: url(<?php echo get_sub_field('arquivo_animado')['url']; ?>)">
                  <div class="hover-play"></div>
                </a>
                <p class="<?php echo $cont === 0 ? 'title-image-left' : 'title-image-right'; ?>"><?php the_sub_field('titulo'); ?></p>
              </div>
            <?php endif; ?>
          <?php $cont++; endwhile; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>