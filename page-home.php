<?php
/**
 * Template name: Home
 * @package Clinica_da_Cidade
 */
 
 // ACF Fields
 // Results Section
 $result_image = get_field("results_image");
 $result_text = get_field("results_text");
 $result_link_title = get_field("results_link_title");
 $result_link = get_field("results_link");

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
			get_template_part( 'template-parts/content', 'banner' );
			get_template_part( 'template-parts/content', 'fixed' );  
			?>
			
			<section id="exames-results">
			  <div class="container">
			    <div class="row">
			      <div class="col-sm-4 hidden-xs">
              <img class="exames-img" src="<?php echo $result_image["url"]; ?>" alt="<?php echo $result_image["alt"]; ?>">
			      </div>
			      <div class="col-sm-4">
			        <p><?php echo $result_text ?></p>
			        <a href="<?php echo $result_link ?>" title="<?php echo $result_link_title ?>"><?php echo $result_link_title ?></a>
			      </div>
			    </div>
			  </div>
			</section>
			
			<div class="home-info-bg">
			  <section id="home-info">
  			  <div class="container">
  			    <div class="row">
  			      <div class="col-sm-12">
  			        <h3 class="info-title">Clínica da Cidade</h3>
  			        <p class="info-subtitle">é saúde para todos</p>
  			        <div class="content-wrapper">
    			        <?php while(have_posts()) : the_post();
    			          the_content();
    			          endwhile; ?>
  			        </div>
  			      </div>
  			    </div>
  			  </div>
			  </section>
			</div>
			
			<?php 
			$blog_icon_args = array("category_name" => "especialidades", "posts_per_page" => 3);
			$blog_icon_posts = new WP_Query($blog_icon_args);
			
      if ($blog_icon_posts->have_posts()) : ?>
	      <section id="blog-icon">
				  <div class="container">
					  <div class="row">
					  	<div class="col-sm-12">
					  		<div class="row">
					  			<div class="col-sm-offset-3 col-sm-6">
					  				<h2>Especialidades médicas</h2>
					  			</div>
					  		</div>
					  	</div>
				      <?php while($blog_icon_posts->have_posts()): $blog_icon_posts->the_post(); ?>
				      
					      <div class="col-sm-4">
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
				      <div class="col-sm-12 link-box">
				      	<a href="<?php echo esc_html(home_url("/especialidades")) ?>"><p>Ver todas</p></a>
				      </div>
			      </div>
					</div>
				</section>
	    <?php else : 
	      	echo "<section id='blog_icon'><h2>Você ainda não tem nenhum post na categoria 'especialidades'. Crie um post nessa categoria para que ele apareça nessa seção.</h2></section>";
      endif; ?>
      
      <?php
      $reviews_args = array(
      	"post_type" => "complementos",
    		"tax_query" => array(array("taxonomy" => "tipoComplemento", "field" => "slug", "terms" => "review")),
    		"posts_per_page" => 9999
    	);
    	$reviews_posts = new WP_Query($reviews_args);
    	
    	if ($reviews_posts->have_posts()) : ?>
    		<section id="review">
    			<div class="container">
    				<div class="row">
    					<div class="col-sm-offset-2 col-sm-8">
    						<ul id="reviewSlider">
    							<?php while($reviews_posts->have_posts()): $reviews_posts->the_post(); ?>
    							<li>
    								<h4><?php the_title(); ?></h4>
    								<?php the_content(); ?>
    							</li>
    							<?php endwhile;
    							wp_reset_postdata(); ?>
    						</ul>
    					</div>
    				</div>
    			</div>
    		</section>
    	<?php else :
    		echo "<section id='review'><h4>Você ainda não tem nenhum post em complemento com o tipo 'review'. Crie um post em colpmeneto e marque o tipo como 'review' para que ele apareça nessa seção.</h4></section>";
    	endif;
      ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_template_part( 'template-parts/content', 'unidades' );
get_footer(); ?>