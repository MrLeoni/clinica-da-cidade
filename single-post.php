<?php
/**
 * The template for displaying blog posts.
 *
 * @package Clinica_da_Cidade
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		  
		  <section id="static-banner" class="blog-bg">
				<!-- empty -->
			</section>
			
			<section id="single-post">
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<?php
							while ( have_posts() ) : the_post();
							
								get_template_part( 'template-parts/content', "blog" );
								
								the_post_navigation(array(
								  "in_same_term" => true,
								  "prev_text" => "<i class='ion-arrow-left-c'></i> Post Anterior",
								  "next_text" => "Próximo Post <i class='ion-arrow-right-c'></i>",
								));
								
							endwhile; // End of the loop.
							?>
						</div>
						<div class="sidebar-wrapper hidden-xs">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
