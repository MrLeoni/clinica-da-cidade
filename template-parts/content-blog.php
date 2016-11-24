<?php
/**
 * Template part for displaying blog posts.
 *
 * @package Clinica_da_Cidade
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post-box"); ?> >
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title regular-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
	
	<div class="entry-meta">
	  <?php
	  the_date("", "<p class='post-date'><i class='ion-android-calendar'></i>", "</p>" );
		the_tags( "<p class='post-tags'><i class='ion-ios-pricetags-outline'></i>", ",", "</p>");
		?>
	</div>

	<div class="entry-content">
		<?php	the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
