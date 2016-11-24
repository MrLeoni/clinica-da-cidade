<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clinica_da_Cidade
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nada Encontrado', 'clinica-da-cidade' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>
		
			<p class="not-found-msg"><?php esc_html_e( 'Não conseguimos encontrar nada relacionado à sua pesquisa. Tente novamente com palavras diferentes.', 'clinica-da-cidade' ); ?></p>
			<div class="search-box"><?php get_search_form(); ?></div>
			
		<?php else : ?>
		
			<p class="not-found-msg"><?php esc_html_e( 'Parece que não conseguimos encontrar o que você procura. Talvez uma buscar ajude?', 'clinica-da-cidade' ); ?></p>
			<div class="search-box"><?php get_search_form(); ?></div>
			
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
