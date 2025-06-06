<?php
/**
 * Start file handles bootstrap.
 *
 * @package Neve
 */

/**
 * Run theme functionality
 */
function neve_run() {
	define(
		'NEVE_COMPATIBILITY_FEATURES',
		[
			'single_customizer'         => true,
			'repeater_control'          => true,
			'malformed_div_on_shop'     => true,
			'custom_post_types_enh'     => true,
			'mega_menu'                 => true,
			'scroll_to_top_icons'       => true,
			'palette_logo'              => true,
			'custom_icon'               => true,
			'link_control'              => true,
			'page_header_support'       => true,
			'featured_post'             => true,
			'php81_react_ctrls_fix'     => true,
			'gradient_picker'           => true,
			'custom_post_types_sidebar' => true,
			'meta_custom_fields'        => true,
			'sparks'                    => true,
			'advanced_search_component' => true,
			'submenu_style'             => true,
			'blog_hover_effects'        => true,
			'hfg_d_search_iconbutton'   => true, // Dynamic icon selection or a button for search components
			'restrict_content'          => true,
			'theme_dedicated_menu'      => true, // Theme uses the new menu location for settings and sub-pages.
			'track'                     => true, // Track theme usage.
			'menu_icon_svg'             => true,
			'custom_payment_icons'      => true,
			'nested_ordering_control'   => true,
			'component_style_filter'    => true, // @see Abstract_Component->add_style() method.
		]
	);
	$vendor_file = trailingslashit( get_template_directory() ) . 'vendor/autoload.php';
	if ( is_readable( $vendor_file ) ) {
		require_once $vendor_file;
	}

	require_once 'autoloader.php';
	$autoloader = new \Neve\Autoloader();
	$autoloader->add_namespace( 'Neve', get_template_directory() . '/inc/' );

	if ( defined( 'NEVE_PRO_SPL_ROOT' ) ) {
		$autoloader->add_namespace( 'Neve_Pro', NEVE_PRO_SPL_ROOT );
	}

	$autoloader->register();

	if ( class_exists( '\\Neve\\Core\\Core_Loader' ) ) {
		new \Neve\Core\Core_Loader();
	}

	if ( class_exists( '\\Neve_Pro\\Core\\Loader' ) ) {
		/**
		 * Legacy code, compatibility with old pro version.
		 */
		if ( is_file( NEVE_PRO_SPL_ROOT . 'modules/header_footer_grid/components/Yoast_Breadcrumbs.php' ) ) {
			require_once NEVE_PRO_SPL_ROOT . 'modules/header_footer_grid/components/Yoast_Breadcrumbs.php';
		}
		if ( is_file( NEVE_PRO_SPL_ROOT . 'modules/header_footer_grid/components/Language_Switcher.php' ) ) {
			require_once NEVE_PRO_SPL_ROOT . 'modules/header_footer_grid/components/Language_Switcher.php';
		}
		\Neve_Pro\Core\Loader::instance();
	}
}

neve_run();
