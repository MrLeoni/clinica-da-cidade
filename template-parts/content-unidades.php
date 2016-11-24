<?php
 /**
 * Template part for section "Unidades".
 *
 * @package Clinica_da_Cidade
 */
 
  // Making $args for query "complementos" post type
  // And getting only posts "complementos" from "unidades" custom taxonomy
  $unity_args = array(
    "post_type" => "complementos",
    "tax_query" => array(array("taxonomy" => "tipoComplemento", "field" => "slug", "terms" => "unidades")),
    "posts_per_page" => 9999,
    );
  // Querying posts
  $unity_posts = new WP_Query($unity_args);
 
?>

<section id="unidades">
  <div class="container">
    <div class="row">
      <?php while($unity_posts->have_posts()) : $unity_posts->the_post(); ?>
      <div class="col-sm-1">
        <div class="unidade-icon-box">
          <i class="ion-ios-location-outline"></i>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="unidade-content-box">
          <h3><?php the_title(); ?></h3>
          <?php the_content(); ?>
        </div>
      </div>
      <?php endwhile;
      wp_reset_postdata();?>
    </div>
  </div>
</section> 