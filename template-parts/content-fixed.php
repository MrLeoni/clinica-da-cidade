<?php
/**
 * Template part for section "Agende sua consulta...".
 *
 * @package Clinica_da_Cidade
 */
 
  // Making $args for query "complementos" post type
  // And getting only posts "complementos" from "unidades" custom taxonomy
  $fixed_args = array(
    "post_type" => "complementos",
    "tax_query" => array(array("taxonomy" => "tipoComplemento", "field" => "slug", "terms" => "conteudo_fixo")),
    );
  // Querying posts
  $fixed_posts = new WP_Query($fixed_args);
 
  /* Loop for displaying the posts */
  while($fixed_posts->have_posts()) : $fixed_posts->the_post(); 
    // Get "Link" field
    $fixed_content_link = get_field("conteudo_fixo_link");
    $fixed_content_icon = get_field("conteudo_fixo_icon"); 
  ?>
    
      <div class="fixed-content hidden-xs">
        <a href="<?php echo $fixed_content_link ?>">
          <i class="<?php echo $fixed_content_icon ?>"></i>
          <?php the_content(); ?>
        </a>
      </div>
    
  <?php endwhile; // End of Loop
  wp_reset_postdata(); ?>