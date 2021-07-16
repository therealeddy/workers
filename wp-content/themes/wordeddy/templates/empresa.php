<?php
/**
 * Template Name: A empresa
 */
get_header();
wp_reset_query(); ?>

<div class="empresa">

  <div class="banner">
    <div class="header-black"></div>
    <div class="banner-content" style="background-image: url(<?php the_field('background') ?>)">
      <div class="container">
        <div class="row d-flex align-items-center gs_reveal gs_reveal_fromLeft">
          <div class="col-lg-4">
            <h1 class="title-empresa">
              <?php the_field('titulo'); ?>
            </h1>
          </div>
          <div class="col-lg-8">
            <img src="<?php the_field('imagem_banner') ?>" alt="image">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if(have_rows('conteudo')): $cont = 1; while ( have_rows('conteudo') ) : the_row(); ?>
    <?php if( get_row_layout() == 'planejamento' ): ?>
      <div class="planejamento">
        <div class="container p-relative">
          <div class="title-opera gs_reveal gs_reveal_fromTop">
            <p>0<?php echo $cont; ?>.</p>
            <h3><?php the_sub_field('titulo'); ?></h3>
          </div>
          <img src="<?php the_sub_field('imagem'); ?>" alt="planejamento" class="gs_reveal gs_reveal_fromBottom">
        </div>
      </div>
    <?php $cont++; elseif(get_row_layout() == 'implementacao' ):  ?>
      <div class="implementacao">
        <div class="container py-5">
          <div class="title-opera py-5 gs_reveal gs_reveal_fromTop">
            <p>0<?php echo $cont; ?>.</p>
            <h3><?php the_sub_field('titulo'); ?></h3>
          </div>
        </div>
        <img src="<?php the_sub_field('imagem'); ?>" alt="implementacao" class="gs_reveal gs_reveal_fromLeft">
      </div>
    <?php $cont++; elseif(get_row_layout() == 'operacao' ): ?>
      <div class="operacao">
        <div class="container">
          <div class="title-opera pb-5 mb-5 gs_reveal gs_reveal_fromTop">
            <p>0<?php echo $cont; ?>.</p>
            <h3><?php the_sub_field('titulo'); ?></h3>
          </div>
          <?php if( have_rows('itens') ): ?>
          <div class="row">
            <?php $i = 0; while( have_rows('itens') ): the_row(); ?>
            <div class="col-lg-4">
              <div class="item-single gs_reveal <?php echo $i % 2 === 0 ? 'gs_reveal_fromTop' : 'gs_reveal_fromBottom'?>">
                <img src="<?php the_sub_field('imagem') ?>" alt="imagem">
                <div class="title"><?php the_sub_field('titulo'); ?></div>
              </div>
            </div>
            <?php $i++; endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  
  <?php endwhile; endif; ?>
</div>


<?php get_footer(); ?>
