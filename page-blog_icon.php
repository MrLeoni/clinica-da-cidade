<?php
/**
 * Template name: Blog Icon
 * @package Clinica_da_Cidade
 */
 
 // Page Title
 $page_title = get_the_title();
 
 // Get page thumbnail and use for background image
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
 // Get page title, and use as parameter, find a category with de same name
 // Get the category ID (with the same name),
 // Use as parameter for querying posts
 $category = get_cat_ID($page_title);
 $blog_icon_args = array(
 	"cat" => "$category",
 	"posts_per_page" => 9999
 	);
 $blog_icon_posts = new WP_Query($blog_icon_args);
 
get_header(); ?>

  <section id="static-banner" style="background: linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url(<?php echo $thumb_url[0] ?>) no-repeat center top;">
    <div class="container">
      <h2><?php echo $page_title ?></h2>
    </div>
  </section>

  <?php if ($blog_icon_posts->have_posts()) : ?>
    <section id="blog-icon">
		  <div class="container">
			  <div class="row">
		      <?php while($blog_icon_posts->have_posts()): $blog_icon_posts->the_post(); ?>
		      
			      <div class="col-sm-6 col-md-4 icon-wrapper">
			        <div class="blog-icon-img-box">
			          <?php the_post_thumbnail("full"); ?>
			        </div>
			        <div class="blog-icon-content-box">
			          <h4><?php the_title(); ?></h4>
			          <?php the_content(); ?>
			        </div>
			      </div>
		      
		      <?php endwhile;
		      wp_reset_postdata(); ?>
	      </div>
			</div>
		</section>
  <?php else :
    	echo "<section id='blog-icon'><h2>Você ainda não tem nenhum post na categoria '$page_title'. Crie um post nessa categoria para que ele apareça nessa seção.</h2></section>";
  endif;

get_template_part( 'template-parts/content', 'unidades' );
get_footer(); ?>