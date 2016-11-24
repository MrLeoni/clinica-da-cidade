<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clinica_da_Cidade
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title regular-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; 
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'clinica-da-cidade' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
