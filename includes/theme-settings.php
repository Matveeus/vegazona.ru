<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; //exit if accessed directly
}


if ( ! function_exists( 'vegazona_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vegazona_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on vegazona, use a find and replace
		 * to change 'vegazona' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vegazona', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'vegazona' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'vegazona_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'vegazona_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vegazona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vegazona_content_width', 640 );
}
add_action( 'after_setup_theme', 'vegazona_content_width', 0 );


/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function vegazona_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'vegazona_woocommerce_setup' );


remove_filter( 'authenticate', 'wp_authenticate_username_password' );
add_filter( 'authenticate', 'wpse_115539_authenticate_username_password', 20, 3 );

/**
 * Remove Wordpress filer and write our own with changed error text.
 */
function wpse_115539_authenticate_username_password( $user, $username, $password ) {
    if ( is_a($user, 'WP_User') )
        return $user;

    if ( empty( $username ) || empty( $password ) ) {
        if ( is_wp_error( $user ) )
            return $user;

        $error = new WP_Error();

        if ( empty( $username ) )
            $error->add( 'empty_username', __('<strong>ERROR</strong>: The username field is empty.' ) );

        if ( empty( $password ) )
            $error->add( 'empty_password', __( '<strong>ERROR</strong>: The password field is empty.' ) );

        return $error;
    }

    $user = get_user_by( 'login', $username );

    if ( !$user )
        return new WP_Error( 'invalid_username', sprintf( __( '<span class="red-text">Неверный email или пароль</span>' ), wp_lostpassword_url() ) );

    $user = apply_filters( 'wp_authenticate_user', $user, $password );
    if ( is_wp_error( $user ) )
        return $user;

    if ( ! wp_check_password( $password, $user->user_pass, $user->ID ) )
        return new WP_Error( 'incorrect_password', sprintf( __( '<span class="red-text">Неверный email или пароль</span>' ),
        $username, wp_lostpassword_url() ) );

    return $user;
}

function wpf_dev_user_registration_email_exists( $msg ) {
    $msg = 'Учетная запись с таким адресом эл. почты уже зарегистрирована. Авторизуйтесь.';
    return $msg;
}
add_filter( 'woocommerce_registration_error_email_exists', 'wpf_dev_user_registration_email_exists' );