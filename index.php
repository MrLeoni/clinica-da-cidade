<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clinica_da_Cidade
 */
 
// Querying posts in "Blog" category only
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$custom_args = array(
	"category_name"	=>	"blog",
	"paged"	=> $paged
);
$custom_query = new WP_Query ( $custom_args );

// Pagination parameters
$big = 999999999; // need an unlikely integer
$pagination_args = array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	"mid_size"	=>	3,
	"prev_text" => '<i class="ion-arrow-left-c"></i> Recentes',
	"next_text" => 'Antigos <i class="ion-arrow-right-c"></i>',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $custom_query->max_num_pages
);

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section id="static-banner" class="blog-bg">
				<!-- empty -->
			</section>
			
			<section id="blog-index">
				<div class="container">
					<div class="row">
						<?php
							if($custom_query->have_posts()):
							while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
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
						<?php
							else:
								// Empty
							endif;	
						?>
						<div class="sidebar-wrapper hidden-xs">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
