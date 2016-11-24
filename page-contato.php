<?php
/**
 * Template name: Contato
 * @package Clinica_da_Cidade
 */
 
 // Page Title
 $page_title = get_the_title();
 
 // Get page thumbnail and use for background image
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
get_header(); ?>

<section id="static-banner" style="background: linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url(<?php echo $thumb_url[0] ?>) no-repeat center top;">
  <div class="container">
    <h2><?php echo $page_title ?></h2>
  </div>
</section>
  
<div class="contact-bg">
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <?php while(have_posts()): the_post();
            the_content();
          endwhile; ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_template_part( 'template-parts/content', 'unidades' );
get_footer(); ?>