<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Clinica_da_Cidade
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section id="static-banner" class="blog-bg">
				<!-- empty -->
			</section>
			
			<section class="error-404 not-found">
				<div class="container">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( '404 Página não encontrada', 'clinica-da-cidade' ); ?></h1>
					</header><!-- .page-header -->
					
					<div class="page-content">
						<p class="not-found-msg"><?php esc_html_e( 'Parece que não conseguimos encontrar o que você procura. Talvez uma buscar ajude?', 'clinica-da-cidade' ); ?></p>
						<div class="search-box"><?php get_search_form(); ?></div>
					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
