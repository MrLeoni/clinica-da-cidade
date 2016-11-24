<?php
/**
 * Template name: Blog Image
 * @package Clinica_da_Cidade
 */
 
 // Page Title
 $page_title = get_the_title();
 
 // ACF Fields
 $blog_title = get_field("blog_title");
 
 // Get page thumbnail and use for background image
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);
 
 // Get page title, and use as parameter, find a category with de same name
 // Get the category ID (with the same name),
 // Use as parameter for querying posts
 $category = get_cat_ID($page_title);
 $blog_img_args = array(
 	"cat" => "$category",
 	"posts_per_page" => 12
 );
 $blog_img_posts = new WP_Query( $blog_img_args );
 
get_header(); ?>

  <section id="static-banner" style="background: linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url(<?php echo $thumb_url[0] ?>) no-repeat center top;">
  	<div class="container">
      <h2><?php echo $page_title ?></h2>
    </div>
  </section>

  <?php if ($blog_img_posts->have_posts()) : ?>
    <section id="blog-image">
		  <div class="container">
			  <div class="row">
			  	
			  	<div class="col-sm-12">
			  		<div class="blog-title">
			  			<h2><?php echo $blog_title ?></h2>
			  		</div>
			  	</div>
			  	
		      <?php while($blog_img_posts->have_posts()): $blog_img_posts->the_post(); ?>
		      
			      <div class="col-md-4 col-sm-offset-0 col-sm-6 col-xs-offset-2 col-xs-8">
			        <div class="blog-image-img-box">
			          <?php the_post_thumbnail("full"); ?>
			        </div>
			        <div class="blog-image-content-box">
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
  		echo "<section id='blog-image'><h2>Você ainda não tem nenhum post na categoria '$page_title'. Crie um post nessa categoria para que ele apareça nessa seção.</h2></section>";
  endif;

get_template_part( 'template-parts/content', 'unidades' );
get_footer(); ?>