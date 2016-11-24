<?php
/**
 * Clinica da Cidade functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clinica_da_Cidade
 */

if ( ! function_exists( 'clinica_da_cidade_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clinica_da_cidade_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Clinica da Cidade, use a find and replace
	 * to change 'clinica-da-cidade' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'clinica-da-cidade', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => esc_html__( 'Cabeçalho', 'clinica-da-cidade' ),
		'footer' => esc_html__( 'Rodapé', 'clinica-da-cidade' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'clinica_da_cidade_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'clinica_da_cidade_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clinica_da_cidade_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clinica_da_cidade_content_width', 640 );
}
add_action( 'after_setup_theme', 'clinica_da_cidade_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clinica_da_cidade_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'clinica-da-cidade' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Adicione widgets, eles serão exibidos na sidebar da página "Blog"', 'clinica-da-cidade' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));
		
	register_sidebar(
		array(
			'name'          => esc_html__( 'Rodapé', 'clinica-da-cidade' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Utilize o widget "Texto" para adicionar textos abaixo do logo no rodapé', 'clinica-da-cidade' ),
			'before_widget' => ' ',
			'after_widget'  => ' ',
			'before_title'  => ' ',
			'after_title'   => ' ',
		));
}
add_action( 'widgets_init', 'clinica_da_cidade_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clinica_da_cidade_scripts() {
	wp_enqueue_style( 'clinica-da-cidade-style', get_stylesheet_uri() );

	wp_enqueue_script( 'clinica-da-cidade-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'clinica-da-cidade-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clinica_da_cidade_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Enable custom post types
 */
 // Creating "Banner" post type
add_action('init', 'banner');
function banner() {
	$labels = array( 'name' => 'Banners', 'singular_name' => 'Banner' );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-format-image',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'banner' , $args );
}

// Creating "Newsletter" post type
add_action('init', 'newsletter');
function newsletter() {
	$labels = array( 'name' => 'Newsletter', 'singular_name' => 'Newsletter' );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-email-alt',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
		);
	register_post_type( 'newsletter' , $args );
}

// Creating "Complementos" post type
add_action('init', 'complementos');
function complementos() {
	$labels = array( 'name' => 'Complementos', 'singular_name' => 'Complemento' );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-plus',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
		);
	register_post_type( 'complementos' , $args );
}

// Creating "Local" a taxonomy for "Newsletter" post type
// hook into the init action and call create_taxonomy_local when it fires
add_action( 'init', 'create_taxonomy_local', 0 );
function create_taxonomy_local() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Locais', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Local', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Procurar Locais', 'textdomain' ),
		'all_items'         => __( 'Todos os Locais', 'textdomain' ),
		'parent_item'       => __( 'Parente Locais', 'textdomain' ),
		'parent_item_colon' => __( 'Parentes Locais:', 'textdomain' ),
		'edit_item'         => __( 'Editar Local', 'textdomain' ),
		'update_item'       => __( 'Atualizar Local', 'textdomain' ),
		'add_new_item'      => __( 'Adicionar Novo Local', 'textdomain' ),
		'new_item_name'     => __( '', 'textdomain' ),
		'menu_name'         => __( 'Locais', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'local' ),
	);
	register_taxonomy( 'local', 'newsletter', $args );
}

// Creating "Tipo de Complemento" a taxonomy for "Complemento" post type
// hook into the init action and call create_taxonomy_local when it fires
add_action( 'init', 'create_taxonomy_tipoComplemento', 0 );
function create_taxonomy_tipoComplemento() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Tipos', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Tipo', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Procurar Tipos', 'textdomain' ),
		'all_items'         => __( 'Todos os Tipos', 'textdomain' ),
		'parent_item'       => __( 'Parente Tipos', 'textdomain' ),
		'parent_item_colon' => __( 'Parentes Tipos:', 'textdomain' ),
		'edit_item'         => __( 'Editar Tipo', 'textdomain' ),
		'update_item'       => __( 'Atualizar Tipo', 'textdomain' ),
		'add_new_item'      => __( 'Adicionar Novo Tipo', 'textdomain' ),
		'new_item_name'     => __( '', 'textdomain' ),
		'menu_name'         => __( 'Tipos', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tipo' ),
	);
	register_taxonomy( 'tipoComplemento', 'complementos', $args );
}