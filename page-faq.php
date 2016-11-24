<?php
/**
 * Template name: FAQ
 * @package Clinica_da_Cidade
 */
 
 // Page Title
 $page_title = get_the_title();
 
 // ACF Fields
 $faq_title = get_field("faq_title");
 
 // Get page thumbnail and use for background image
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
 // Querying "FAQ" taxonomy of "Complementos" post type
 $faq_args = array(
    "post_type" => "complementos",
    "tax_query" => array(array("taxonomy" => "tipoComplemento", "field" => "slug", "terms" => "faq")),
    "posts_per_page" => 999,
    );
  // Querying posts
  $faq_posts = new WP_Query($faq_args);
 
get_header(); ?>

<section id="static-banner" style="background: linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url(<?php echo $thumb_url[0] ?>) no-repeat center top;">
  <div class="container">
    <h2><?php echo $page_title ?></h2>
  </div>
</section>

<section id="faq">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-title">
          <h2><?php echo $faq_title ?></h2>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="faq-topic-wrapper" id="accordion" role="tablist" aria-multiselectable="true">
          
          <?php while($faq_posts->have_posts()): $faq_posts->the_post(); ?>
          <div class="panel ">
            <div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse-<?php the_ID(); ?>">
                  <span></span><?php the_title(); ?>
                </a>
              </h4>
            </div>
            <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>">
              <div class="panel-body">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
          <?php endwhile;
          wp_reset_postdata(); ?>
          
        </div>
      </div>   
      
    </div>
  </div>
</section>
  


<?php get_template_part( 'template-parts/content', 'unidades' );
get_footer(); ?>