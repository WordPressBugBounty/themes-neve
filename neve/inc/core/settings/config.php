<?php
/**
 * Config related constants.
 *
 * @package Neve\Core\Settings
 */

namespace Neve\Core\Settings;

/**
 * Class Admin
 *
 * @package Neve\Core\Settings
 */
class Config {
	/**
	 * Link color - deprecated.
	 *
	 * @deprecated
	 */
	const MODS_LINK_COLOR = 'neve_link_color';
	/**
	 * Link hover color - deprecated.
	 *
	 * @deprecated
	 */
	const MODS_LINK_HOVER_COLOR           = 'neve_link_hover_color';
	const MODS_GLOBAL_COLORS              = 'neve_global_colors';
	const MODS_GLOBAL_CUSTOM_COLORS       = 'neve_global_custom_colors';
	const MODS_TEXT_COLOR                 = 'neve_text_color';
	const MODS_CONTAINER_WIDTH            = 'neve_container_width';
	const MODS_SITEWIDE_CONTENT_WIDTH     = 'neve_sitewide_content_width';
	const MODS_OTHERS_CONTENT_WIDTH       = 'neve_other_pages_content_width';
	const MODS_ARCHIVE_CONTENT_WIDTH      = 'neve_blog_archive_content_width';
	const MODS_SINGLE_CONTENT_WIDTH       = 'neve_single_post_content_width';
	const MODS_SHOP_ARCHIVE_CONTENT_WIDTH = 'neve_shop_archive_content_width';
	const MODS_SHOP_SINGLE_CONTENT_WIDTH  = 'neve_single_product_content_width';
	const MODS_ADVANCED_LAYOUT_OPTIONS    = 'neve_advanced_layout_options';
	const MODS_BUTTON_PRIMARY_STYLE       = 'neve_button_appearance';
	const MODS_BUTTON_SECONDARY_STYLE     = 'neve_secondary_button_appearance';
	const MODS_BUTTON_PRIMARY_PADDING     = 'neve_button_padding';
	/**
	 * Background color - deprecated.
	 *
	 * @deprecated
	 */
	const MODS_BACKGROUND_COLOR            = 'background_color';
	const MODS_BUTTON_SECONDARY_PADDING    = 'neve_secondary_button_padding';
	const MODS_TYPEFACE_GENERAL            = 'neve_typeface_general';
	const MODS_TYPEFACE_H1                 = 'neve_h1_typeface_general';
	const MODS_TYPEFACE_H2                 = 'neve_h2_typeface_general';
	const MODS_TYPEFACE_H3                 = 'neve_h3_typeface_general';
	const MODS_TYPEFACE_H4                 = 'neve_h4_typeface_general';
	const MODS_TYPEFACE_H5                 = 'neve_h5_typeface_general';
	const MODS_TYPEFACE_H6                 = 'neve_h6_typeface_general';
	const MODS_FONT_GENERAL                = 'neve_body_font_family';
	const MODS_FONT_GENERAL_VARIANTS       = 'neve_body_font_family_variants';
	const MODS_FONT_HEADINGS               = 'neve_headings_font_family';
	const MODS_COLOR_HEADINGS              = 'neve_headings_color';
	const MODS_DEFAULT_CONTAINER_STYLE     = 'neve_default_container_style';
	const MODS_SINGLE_POST_CONTAINER_STYLE = 'neve_single_post_container_style';

	const MODS_BUTTON_TYPEFACE           = 'neve_button_typeface';
	const MODS_SECONDARY_BUTTON_TYPEFACE = 'neve_secondary_button_typeface';

	const MODS_TYPEFACE_ARCHIVE_POST_TITLE   = 'neve_archive_typography_post_title';
	const MODS_TYPEFACE_ARCHIVE_POST_EXCERPT = 'neve_archive_typography_post_excerpt';
	const MODS_TYPEFACE_ARCHIVE_POST_META    = 'neve_archive_typography_post_meta';

	const MODS_TYPEFACE_SINGLE_POST_TITLE         = 'neve_single_post_typography_post_title';
	const MODS_TYPEFACE_SINGLE_POST_META          = 'neve_single_post_typography_post_meta';
	const MODS_TYPEFACE_SINGLE_POST_COMMENT_TITLE = 'neve_single_post_typography_comments_title';

	const MODS_FORM_FIELDS_PADDING          = 'neve_form_fields_padding';
	const MODS_FORM_FIELDS_SPACING          = 'neve_form_fields_spacing';
	const MODS_FORM_FIELDS_BACKGROUND_COLOR = 'neve_form_fields_background_color';
	const MODS_FORM_FIELDS_BORDER_WIDTH     = 'neve_form_fields_border_width';
	const MODS_FORM_FIELDS_BORDER_RADIUS    = 'neve_form_fields_border_radius';
	const MODS_FORM_FIELDS_BORDER_COLOR     = 'neve_form_fields_border_color';
	const MODS_FORM_FIELDS_LABELS_SPACING   = 'neve_label_spacing';
	const MODS_FORM_FIELDS_TYPEFACE         = 'neve_input_typeface';
	const MODS_FORM_FIELDS_COLOR            = 'neve_input_text_color';
	const MODS_FORM_FIELDS_LABELS_TYPEFACE  = 'neve_label_typeface';

	const MODS_ARCHIVE_POST_META_AUTHOR_AVATAR_SIZE = 'neve_author_avatar_size';
	const MODS_SINGLE_POST_META_AUTHOR_AVATAR_SIZE  = 'neve_single_post_avatar_size';
	const MODS_SINGLE_POST_ELEMENTS_SPACING         = 'neve_single_post_elements_spacing';

	const MODS_CONTENT_VSPACING             = 'neve_content_vspacing';
	const MODS_SINGLE_POST_VSPACING_INHERIT = 'neve_post_inherit_vspacing';
	const MODS_SINGLE_POST_CONTENT_VSPACING = 'neve_post_content_vspacing';

	const MODS_POST_TYPE_VSPACING_INHERIT = 'inherit_vspacing';
	const MODS_POST_TYPE_VSPACING         = 'content_vspacing';

	const OPTION_LOCAL_GOOGLE_FONTS_HOSTING = 'nv_pro_enable_local_fonts';
	const OPTION_POSTS_PER_PAGE             = 'posts_per_page';

	const MODS_TPOGRAPHY_FONT_PAIRS = 'neve_font_pairs';

	/**
	 * This is only used in a dynamic context for all allowed post types
	 */
	const MODS_CONTENT_WIDTH                = 'content_width';
	const MODS_COVER_HEIGHT                 = 'cover_height';
	const MODS_COVER_PADDING                = 'cover_padding';
	const MODS_COVER_BACKGROUND_COLOR       = 'cover_background_color';
	const MODS_COVER_OVERLAY_OPACITY        = 'cover_overlay_opacity';
	const MODS_COVER_TEXT_COLOR             = 'cover_text_color';
	const MODS_COVER_BLEND_MODE             = 'cover_blend_mode';
	const MODS_COVER_TITLE_ALIGNMENT        = 'title_alignment';
	const MODS_COVER_TITLE_POSITION         = 'title_position';
	const MODS_COVER_BOXED_TITLE_PADDING    = 'cover_title_boxed_padding';
	const MODS_COVER_BOXED_TITLE_BACKGROUND = 'cover_title_boxed_background_color';

	const MODS_POST_COMMENTS_PADDING               = 'neve_comments_boxed_padding';
	const MODS_POST_COMMENTS_BACKGROUND_COLOR      = 'neve_comments_boxed_background_color';
	const MODS_POST_COMMENTS_TEXT_COLOR            = 'neve_comments_boxed_text_color';
	const MODS_POST_COMMENTS_FORM_PADDING          = 'neve_comments_form_boxed_padding';
	const MODS_POST_COMMENTS_FORM_BACKGROUND_COLOR = 'neve_comments_form_boxed_background_color';
	const MODS_POST_COMMENTS_FORM_TEXT_COLOR       = 'neve_comments_form_boxed_text_color';

	const CSS_PROP_BORDER_COLOR               = 'border-color';
	const CSS_PROP_BACKGROUND_COLOR           = 'background-color';
	const CSS_PROP_BACKGROUND                 = 'background';
	const CSS_PROP_COLOR                      = 'color';
	const CSS_PROP_MAX_WIDTH                  = 'max-width';
	const CSS_PROP_BORDER_RADIUS_TOP_LEFT     = 'border-top-left-radius';
	const CSS_PROP_BORDER_RADIUS_TOP_RIGHT    = 'border-top-right-radius';
	const CSS_PROP_BORDER_RADIUS_BOTTOM_RIGHT = 'border-bottom-right-radius';
	const CSS_PROP_BORDER_RADIUS_BOTTOM_LEFT  = 'border-bottom-left-radius';
	const CSS_PROP_BORDER_RADIUS              = 'border-radius';
	const CSS_PROP_BORDER_WIDTH               = 'border-width';
	const CSS_PROP_BORDER                     = 'border';
	const CSS_PROP_FLEX_BASIS                 = 'flex-basis';
	const CSS_PROP_PADDING                    = 'padding';
	const CSS_PROP_PADDING_RIGHT              = 'padding-right';
	const CSS_PROP_PADDING_LEFT               = 'padding-left';
	const CSS_PROP_MARGIN                     = 'margin';
	const CSS_PROP_MARGIN_LEFT                = 'margin-left';
	const CSS_PROP_MARGIN_RIGHT               = 'margin-right';
	const CSS_PROP_MARGIN_TOP                 = 'margin-top';
	const CSS_PROP_MARGIN_BOTTOM              = 'margin-bottom';
	const CSS_PROP_RIGHT                      = 'right';
	const CSS_PROP_LEFT                       = 'left';
	const CSS_PROP_WIDTH                      = 'width';
	const CSS_PROP_HEIGHT                     = 'height';
	const CSS_PROP_MIN_HEIGHT                 = 'min-height';
	const CSS_PROP_FONT_SIZE                  = 'font-size';
	const CSS_PROP_FILL_COLOR                 = 'fill';
	const CSS_PROP_LETTER_SPACING             = 'letter-spacing';
	const CSS_PROP_LINE_HEIGHT                = 'line-height';
	const CSS_PROP_FONT_WEIGHT                = 'font-weight';
	const CSS_PROP_TEXT_TRANSFORM             = 'text-transform';
	const CSS_PROP_FONT_FAMILY                = 'font-family';
	const CSS_PROP_BOX_SHADOW                 = 'box-shadow';
	const CSS_PROP_MIX_BLEND_MODE             = 'mix-blend-mode';
	const CSS_PROP_OPACITY                    = 'opacity';
	const CSS_PROP_GRID_TEMPLATE_COLS         = 'grid-template-columns';
	const CSS_PROP_DIRECTIONAL_ONE_AXIS       = 'directional-one-axis';
	const CSS_PROP_CUSTOM_BTN_TYPE            = 'btn-type';
	const CSS_PROP_CUSTOM_FONT_WEIGHT_FAMILY  = 'btn-type';

	const CSS_SELECTOR_BTN_PRIMARY_NORMAL          = 'buttons_primary_normal';
	const CSS_SELECTOR_BTN_PRIMARY_HOVER           = 'buttons_primary_hover';
	const CSS_SELECTOR_BTN_SECONDARY_NORMAL        = 'buttons_secondary_normal';
	const CSS_SELECTOR_BTN_SECONDARY_HOVER         = 'buttons_secondary_hover';
	const CSS_SELECTOR_BTN_SECONDARY_DEFAULT       = 'buttons_secondary_default';
	const CSS_SELECTOR_BTN_SECONDARY_DEFAULT_HOVER = 'buttons_secondary_default_hover';
	const CSS_SELECTOR_BTN_PRIMARY_PADDING         = 'buttons_primary_padding';
	const CSS_SELECTOR_BTN_SECONDARY_PADDING       = 'buttons_secondary_padding';
	const CSS_SELECTOR_TYPEFACE_GENERAL            = 'typeface_general';
	const CSS_SELECTOR_TYPEFACE_H1                 = 'typeface_h1';
	const CSS_SELECTOR_TYPEFACE_H2                 = 'typeface_h2';
	const CSS_SELECTOR_TYPEFACE_H3                 = 'typeface_h3';
	const CSS_SELECTOR_TYPEFACE_H4                 = 'typeface_h4';
	const CSS_SELECTOR_TYPEFACE_H5                 = 'typeface_h5';
	const CSS_SELECTOR_TYPEFACE_H6                 = 'typeface_h6';

	const CSS_SELECTOR_ARCHIVE_POST_TITLE   = 'archive_entry_title';
	const CSS_SELECTOR_ARCHIVE_POST_EXCERPT = 'archive_entry_summary';
	const CSS_SELECTOR_ARCHIVE_POST_META    = 'archive_entry_meta_list';

	const CSS_SELECTOR_SINGLE_POST_TITLE         = 'single_post_entry_title';
	const CSS_SELECTOR_SINGLE_POST_META          = 'single_post_entry_meta_list';
	const CSS_SELECTOR_SINGLE_POST_COMMENT_TITLE = 'single_post_comment_title';

	const CSS_SELECTOR_FORM_INPUTS_WITH_SPACING = 'form_inputs_no_search';
	const CSS_SELECTOR_FORM_INPUTS              = 'form_inputs';
	const CSS_SELECTOR_FORM_INPUTS_LABELS       = 'form_labels';
	const CSS_SELECTOR_FORM_BUTTON              = 'form_buttons';
	const CSS_SELECTOR_FORM_BUTTON_HOVER        = 'form_buttons_hover';
	const CSS_SELECTOR_FORM_SEARCH_INPUTS       = 'search_form_inputs';

	const CONTENT_DEFAULT_PADDING = 30;

	/**
	 * Keys for directional values.
	 *
	 * @var string[]
	 */
	public static $directional_keys = [ 'top', 'right', 'bottom', 'left' ];

	/**
	 * Holds tag->css selector mapper.
	 *
	 * @var array Mapper.
	 */
	public static $css_selectors_map = [
		self::CSS_SELECTOR_TYPEFACE_H1                 => 'h1, .single h1.entry-title',
		self::CSS_SELECTOR_TYPEFACE_H2                 => 'h2',
		self::CSS_SELECTOR_TYPEFACE_H3                 => 'h3, .woocommerce-checkout h3',
		self::CSS_SELECTOR_TYPEFACE_H4                 => 'h4',
		self::CSS_SELECTOR_TYPEFACE_H5                 => 'h5',
		self::CSS_SELECTOR_TYPEFACE_H6                 => 'h6',
		self::CSS_SELECTOR_TYPEFACE_GENERAL            => 'body, .site-title',
		self::CSS_SELECTOR_BTN_PRIMARY_PADDING         => '.button.button-primary, .wp-block-button.is-style-primary .wp-block-button__link,  .wc-block-grid .wp-block-button .wp-block-button__link',
		self::CSS_SELECTOR_BTN_SECONDARY_PADDING       => '.button.button-secondary:not(.secondary-default), .wp-block-button.is-style-secondary .wp-block-button__link',
		self::CSS_SELECTOR_BTN_PRIMARY_NORMAL          => '.button.button-primary,
				button, input[type=button],
				.btn, input[type="submit"],
				/* Buttons in navigation */
				ul[id^="nv-primary-navigation"] li.button.button-primary > a,
				.menu li.button.button-primary > a,  .wp-block-button.is-style-primary .wp-block-button__link,  .wc-block-grid .wp-block-button .wp-block-button__link',
		self::CSS_SELECTOR_BTN_PRIMARY_HOVER           => '.button.button-primary:hover,
				ul[id^="nv-primary-navigation"] li.button.button-primary > a:hover,
				.menu li.button.button-primary > a:hover, .wp-block-button.is-style-primary .wp-block-button__link:hover,  .wc-block-grid .wp-block-button .wp-block-button__link:hover',
		self::CSS_SELECTOR_BTN_SECONDARY_NORMAL        => '.button.button-secondary:not(.secondary-default),  .wp-block-button.is-style-secondary .wp-block-button__link',
		self::CSS_SELECTOR_BTN_SECONDARY_HOVER         => '.button.button-secondary:not(.secondary-default):hover,  .wp-block-button.is-style-secondary .wp-block-button__link:hover',
		self::CSS_SELECTOR_BTN_SECONDARY_DEFAULT       => '.button.button-secondary.secondary-default',
		self::CSS_SELECTOR_BTN_SECONDARY_DEFAULT_HOVER => '.button.button-secondary.secondary-default:hover',
		self::CSS_SELECTOR_ARCHIVE_POST_TITLE          => '.blog .blog-entry-title, .archive .blog-entry-title',
		self::CSS_SELECTOR_ARCHIVE_POST_EXCERPT        => '.blog .entry-summary, .archive .entry-summary, .blog .post-pages-links',
		self::CSS_SELECTOR_ARCHIVE_POST_META           => '.blog .nv-meta-list li, .archive .nv-meta-list li',
		self::CSS_SELECTOR_SINGLE_POST_TITLE           => '.single h1.entry-title',
		self::CSS_SELECTOR_SINGLE_POST_META            => '.single .nv-meta-list li',
		self::CSS_SELECTOR_SINGLE_POST_COMMENT_TITLE   => '.single .comment-reply-title',
		self::CSS_SELECTOR_FORM_INPUTS_WITH_SPACING    => 'form:not([role="search"]):not(.woocommerce-cart-form):not(.woocommerce-ordering):not(.cart) input:read-write:not(#coupon_code), form textarea, form select, .widget select',
		self::CSS_SELECTOR_FORM_INPUTS                 => 'form input:read-write, form textarea, form select, form select option, form.wp-block-search input.wp-block-search__input, .widget select',
		self::CSS_SELECTOR_FORM_INPUTS_LABELS          => 'form label, .wpforms-container .wpforms-field-label',
		self::CSS_SELECTOR_FORM_BUTTON                 => 'form input[type="submit"], form button:not(.search-submit)[type="submit"], form *[value*="ubmit"], #comments input[type="submit"]',
		self::CSS_SELECTOR_FORM_BUTTON_HOVER           => 'form input[type="submit"]:hover, form button:not(.search-submit)[type="submit"]:hover, form *[value*="ubmit"]:hover, #comments input[type="submit"]:hover',
		self::CSS_SELECTOR_FORM_SEARCH_INPUTS          => 'form.search-form input:read-write',
	];

	/**
	 * The default Font pairings available for all instances.
	 *
	 * Default preview size for fonts is 24px for heading and 16px for body.
	 *
	 * @var array[]
	 */
	public static $typography_default_pairs = [
		[
			'headingFont' => [
				'font'        => 'Inter',
				'fontSource'  => 'Google',
				'previewSize' => '25px',
			],
			'bodyFont'    => [
				'font'       => 'Inter',
				'fontSource' => 'Google',
			],
		],
		[
			'headingFont' => [
				'font'        => 'Playfair Display',
				'fontSource'  => 'Google',
				'previewSize' => '27px',
			],
			'bodyFont'    => [
				'font'        => 'Source Sans Pro',
				'fontSource'  => 'Google',
				'previewSize' => '18px',
			],
		],
		[
			'headingFont' => [
				'font'       => 'Montserrat',
				'fontSource' => 'Google',
			],
			'bodyFont'    => [
				'font'       => 'Open Sans',
				'fontSource' => 'Google',
			],
		],
		[
			'headingFont' => [
				'font'       => 'Nunito',
				'fontSource' => 'Google',
			],
			'bodyFont'    => [
				'font'       => 'Lora',
				'fontSource' => 'Google',
			],
		],
		[
			'headingFont' => [
				'font'       => 'Lato',
				'fontSource' => 'Google',
			],
			'bodyFont'    => [
				'font'       => 'Karla',
				'fontSource' => 'Google',
			],
		],
		[
			'headingFont' => [
				'font'        => 'Outfit',
				'fontSource'  => 'Google',
				'previewSize' => '25px',
			],
			'bodyFont'    => [
				'font'       => 'Spline Sans',
				'fontSource' => 'Google',
			],
		],
		[
			'headingFont' => [
				'font'        => 'Lora',
				'fontSource'  => 'Google',
				'previewSize' => '25px',
			],
			'bodyFont'    => [
				'font'       => 'Ubuntu',
				'fontSource' => 'Google',
			],
		],
		[
			'headingFont' => [
				'font'        => 'Prata',
				'fontSource'  => 'Google',
				'previewSize' => '25px',
			],
			'bodyFont'    => [
				'font'        => 'Hanken Grotesk',
				'fontSource'  => 'Google',
				'previewSize' => '17px',
			],
		],
		[
			'headingFont' => [
				'font'        => 'Albert Sans',
				'fontSource'  => 'Google',
				'previewSize' => '25px',
			],
			'bodyFont'    => [
				'font'        => 'Albert Sans',
				'fontSource'  => 'Google',
				'previewSize' => '17px',
			],
		],
		[
			'headingFont' => [
				'font'        => 'Fraunces',
				'fontSource'  => 'Google',
				'previewSize' => '25px',
			],
			'bodyFont'    => [
				'font'        => 'Hanken Grotesk',
				'fontSource'  => 'Google',
				'previewSize' => '17px',
			],
		],
	];
}
