<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clinica_da_Cidade
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section id="static-banner" class="blog-bg">
				<!-- empty -->
			</section>
			
			<section id="blog-index" class="archive">
				<div class="container">
					<div class="row">
						<?php
							if(have_posts()): ?>
							
							<div class="col-sm-9">
								<header class="page-header">
									<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
								</header><!-- .page-header -->
							</div>
							
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="col-sm-offset-0 col-sm-9 col-xs-offset-2 col-xs-8 regular-post clearfix">
									<?php the_title( '<h2 class="entry-title regular-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
									the_post_thumbnail("full");
									the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" class="read-more-btn fill" title="<?php the_title(); ?>">Leia Mais</a>
								</div>
							<?php endwhile; wp_reset_postdata();?>
							
							<div class="col-sm-offset-0 col-sm-9">
								<div class="pagination">
									<?php echo paginate_links($pagination_args); ?>
								</div>
							</div>
							<div class="sidebar-wrapper hidden-xs">
								<?php get_sidebar(); ?>
							</div>
						<?php
							else: 
						?>
								<div class="col-sm-offset-0 col-sm-9 col-xs-offset-2 col-xs-8 regular-post">
									<?php get_template_part( 'template-parts/content', 'none' ); ?>
								</div>
								<div class="sidebar-wrapper not-found-sidebar hidden-xs">
									<?php get_sidebar(); ?>
								</div>
						<?php
							endif;	
						?>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
