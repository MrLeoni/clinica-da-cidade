<?php
/**
 * Template part for section "Banners".
 *
 * @package Clinica_da_Cidade
 */
 
  // Making $args for query "banners" post type
  $banner_args = array(
    "orderby" =>  "modified",
    "post_type" => "banner",
    "posts_per_page" => 99,
    );
  // Querying posts
  $banner_posts = new WP_Query($banner_args);
 
?>

<section id="banner">
  <div class="banner-wrapper">
    <ul id="bannerSlider">
      
      <?php /* Loop for displaying the posts */
      while($banner_posts->have_posts()) : $banner_posts->the_post(); 
      // Get "Link" field
      $banner_link = get_field("banner_link");
      $banner_texto = get_field("banner_link_texto");
      $banner_power = get_field("banner_power");
      ?>
      
        <li>
          <?php the_post_thumbnail(); ?>
          <div class="banner-content-box">
            <?php the_content(); 
            if($banner_power == "true"): ?>
            <a class="banner-link" href="<?php echo $banner_link ?>"><?php echo $banner_texto; ?></a>
            <?php else:
            // Empty
            endif; ?>
          </div>
        </li>
      
      <?php endwhile; // End of Loop
      wp_reset_postdata();?>
      
    </ul>
  </div>
</section>