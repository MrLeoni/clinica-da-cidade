<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Clinica_da_Cidade
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section id="single-post" style="margin-top: 300px">
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<?php
							while ( have_posts() ) : the_post();
							
								get_template_part( 'template-parts/content', get_post_format() );
								
								the_post_navigation();
								
								
							endwhile; // End of the loop.
							?>
						</div>
						<div class="sidebar-wrapper">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
