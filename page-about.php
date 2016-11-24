<?php
/**
 * Template name: Sobre
 * @package Clinica_da_Cidade
 */
 
 // Get page thumbnail and use for background image
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
 // ACF Fields - Parallax
 $parallax_text = get_field("parallax_text");
 $parallax_image = get_field("parallax_img");
 
get_header(); ?>

<section id="static-banner" style="background: linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url(<?php echo $thumb_url[0] ?>) no-repeat center top;">
  <div class="container">
    <h2><?php the_title(); ?></h2>
  </div>
</section>

<div class="bg-about">
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php while(have_posts()): the_post();
            the_content();
          endwhile; ?>
          <div class="about-contato-box">
            <div class="row">
              <div class="col-md-8">
                <p>Surgiu alguma dúvida?</p>
                <p>Fale conosco.</p>
              </div>
              <div class="col-md-4">
                <a href="<?php echo esc_html(home_url("/contato")) ?>" class="contato-btn">Contato</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<section id="about-parallax" style="background: linear-gradient(rgba(0, 174, 188, 0.8),rgba(0, 174, 188, 0.8)), url(<?php echo $parallax_image["url"]; ?>) no-repeat center;">
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-2 col-sm-8">
        <p><?php echo $parallax_text ?></p>
      </div>
    </div>
  </div>
</section>

<?php
  get_template_part( 'template-parts/content', 'infra' );
  get_template_part( 'template-parts/content', 'unidades' );
  get_footer();
?>