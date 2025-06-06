<?php
/**
 * Single post layout section.
 *
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      20/08/2018
 *
 * @package Neve\Customizer\Options
 */

namespace Neve\Customizer\Options;

use HFG\Traits\Core;
use Neve\Core\Settings\Config;
use Neve\Customizer\Defaults\Layout;
use Neve\Customizer\Defaults\Utils;
use Neve\Customizer\Types\Control;
use Neve\Customizer\Defaults\Single_Post;

/**
 * Class Layout_Single_Post
 *
 * @package Neve\Customizer\Options
 */
class Layout_Single_Post extends Base_Layout_Single {
	use Core;
	use Layout;
	use Single_Post;
	use Utils;

	/**
	 * Returns the post type.
	 *
	 * @return string
	 */
	public function get_post_type() {
		return 'post';
	}

	/**
	 * @return string
	 */
	public function get_cover_selector() {
		return '.single .nv-post-cover';
	}

	/**
	 * Function that should be extended to add customizer controls.
	 *
	 * @return void
	 */
	public function add_controls() {
		parent::add_controls();
		$this->add_tabs();
		$this->add_sidebar_layout();

		$this->control_content_order();
		$this->content_vspacing();
		$this->add_subsections();
		$this->header_layout();
		$this->post_meta();
		$this->comments();

		add_action( 'customize_register', [ $this, 'adjust_headings' ], PHP_INT_MAX );
	}

	/**
	 * Adds the tabs for the single post layout.
	 *
	 * @return void
	 */
	private function add_tabs() {
		$tab_slotting = [
			'general' => [
				'neve_single_post_sidebar_layout',
				'neve_single_post_content_width',
				'neve_post_header_layout',
				'neve_post_page_elements_heading',
				'neve_layout_single_post_elements_order',
				'neve_single_post_meta_fields',

				'neve_comments_heading',
				'neve_post_comments_section_heading',
				'neve_post_comment_section_title',

				'neve_post_comments_form_heading',
				'neve_post_comment_form_title',
				'neve_post_comment_form_button_style',

				'neve_single_post_upsell_control_features',
			],
			'style'   => [
				'neve_post_cover_background_color',
				'neve_post_cover_text_color',
				'neve_post_cover_title_boxed_background_color',

				'neve_post_page_settings_heading',
				'neve_post_inherit_vspacing',
				'neve_post_content_vspacing',

				'neve_comments_heading',
				'neve_post_comments_section_heading',
				'neve_comments_boxed_layout',
				'neve_comments_boxed_padding',
				'neve_comments_boxed_background_color',
				'neve_comments_boxed_text_color',

				'neve_post_comments_form_heading',
				'neve_comments_form_boxed_layout',
				'neve_comments_form_boxed_padding',
				'neve_comments_form_boxed_background_color',
				'neve_comments_form_boxed_text_color',

				'neve_single_post_typography_post_title_accordion_wrap',
				'neve_single_post_typography_post_title',
				'neve_single_post_typography_post_meta_accordion_wrap',
				'neve_single_post_typography_post_meta',
				'neve_single_post_typography_comments_title_accordion_wrap',
				'neve_single_post_typography_comments_title',

				'neve_single_post_upsell_control_features',
			],
		];

		foreach ( $tab_slotting as $slug => $args ) {
			$tab_slotting[ $slug ] = array_fill_keys( $args, [] );
		}

		$this->add_control(
			new Control(
				$this->section . '_tabs',
				[
					'transport' => 'refresh',
				],
				[
					'priority' => -100,
					'section'  => $this->section,
					'tabs'     => [
						'general' => [
							'label' => __( 'General', 'neve' ),
							'icon'  => 'layout',
						],
						'style'   => [
							'label' => __( 'Design', 'neve' ),
							'icon'  => 'admin-customizer',
						],
					],
					'controls' => $tab_slotting,
				],
				'Neve\Customizer\Controls\Tabs'
			)
		);
	}

	/**
	 * Adds Sidebar Layout controls.
	 *
	 * @return void
	 */
	private function add_sidebar_layout() {
		$layout_id = 'neve_single_post_sidebar_layout';
		$width_id  = 'neve_single_post_content_width';

		$this->add_control(
			new Control(
				$layout_id,
				array(
					'sanitize_callback' => array( $this, 'sanitize_sidebar_layout' ),
					'default'           => $this->get_v4_defaults( $layout_id, $this->sidebar_layout_alignment_default( $layout_id ) ),
				),
				array(
					'label'       => __( 'Sidebar Layout', 'neve' ),
					'description' => $this->get_sidebar_control_description( $layout_id ),
					'section'     => $this->section,
					'priority'    => 0,
					'choices'     => $this->sidebar_layout_choices( $layout_id ),
				),
				'\Neve\Customizer\Controls\React\Radio_Image'
			)
		);

		$width_default = $this->sidebar_layout_width_default( $width_id );

		$this->add_control(
			new Control(
				$width_id,
				array(
					'sanitize_callback' => 'absint',
					'transport'         => $this->selective_refresh,
					'default'           => $width_default,
				),
				array(
					'label'       => esc_html__( 'Content Width (%)', 'neve' ),
					'section'     => $this->section,
					'type'        => 'neve_range_control',
					'input_attrs' => [
						'min'        => 50,
						'max'        => 100,
						'defaultVal' => $width_default,
					],
					'priority'    => 1,
				),
				'Neve\Customizer\Controls\React\Range'
			)
		);
	}

	/**
	 * Add sections headings.
	 */
	private function add_subsections() {

		$headings = [
			'page_elements'    => [
				'title'            => esc_html__( 'Page Elements', 'neve' ),
				'priority'         => 95,
				'controls_to_wrap' => 2,
				'expanded'         => false,
			],
			'page_settings'    => [
				'title'            => esc_html__( 'Page', 'neve' ) . ' ' . esc_html__( 'Settings', 'neve' ),
				'priority'         => 106,
				'controls_to_wrap' => 2,
				'expanded'         => false,
			],
			'comments_section' => [
				'title'           => esc_html__( 'Comments Section', 'neve' ),
				'priority'        => 150,
				'expanded'        => true,
				'accordion'       => false,
				'active_callback' => function() {
					return $this->element_is_enabled( 'comments' );
				},
			],
			'comments_form'    => [
				'title'           => esc_html__( 'Submit Form Section', 'neve' ),
				'priority'        => 175,
				'expanded'        => true,
				'accordion'       => false,
				'active_callback' => function() {
					return $this->element_is_enabled( 'comments' );
				},
			],
		];

		foreach ( $headings as $heading_id => $heading_data ) {
			$this->add_control(
				new Control(
					'neve_post_' . $heading_id . '_heading',
					[
						'sanitize_callback' => 'sanitize_text_field',
					],
					[
						'label'            => $heading_data['title'],
						'section'          => $this->section,
						'priority'         => $heading_data['priority'],
						'class'            => $heading_id . '-accordion',
						'expanded'         => $heading_data['expanded'],
						'accordion'        => false,
						'controls_to_wrap' => array_key_exists( 'controls_to_wrap', $heading_data ) ? $heading_data['controls_to_wrap'] : 0,
						'active_callback'  => array_key_exists( 'active_callback', $heading_data ) ? $heading_data['active_callback'] : '__return_true',
					],
					'Neve\Customizer\Controls\Heading'
				)
			);
		}
	}

	/**
	 * Add header layout controls.
	 */
	private function header_layout() {
		$this->add_control(
			new Control(
				'neve_post_cover_meta_before_title',
				[
					'sanitize_callback' => 'neve_sanitize_checkbox',
					'default'           => false,
				],
				[
					'label'           => esc_html__( 'Display meta before title', 'neve' ),
					'section'         => $this->section,
					'type'            => $this->is_post ? 'hidden' : 'neve_toggle_control',
					'priority'        => 40,
					'active_callback' => [ $this, 'is_cover_layout' ],
				],
				'Neve\Customizer\Controls\Checkbox'
			)
		);
	}

	/**
	 * Add content order control.
	 */
	private function control_content_order() {
		$ar_choices = [
			'original' => esc_html__( 'Original', 'neve' ),
			'1-1'      => '1:1',
			'4-3'      => '4:3',
			'16-9'     => '16:9',
			'2-1'      => '2:1',
			'4-5'      => '4:5',
			'3-4'      => '3:4',
			'2-3'      => '2:3',
		];

		$all_components = [
			'title-meta'      => [
				'label'    => __( 'Title & Meta', 'neve' ),
				'controls' => [
					'neve_post_title_alignment'           => [
						'type' => 'responsive-button-group',
					],
					'neve_post_title_position'            => [
						'type' => 'responsive-button-group',
					],
					'neve_post_cover_container'           => [
						'type'    => 'select',
						'choices' => $this->get_container_width_choices(),
					],
					'neve_post_cover_meta_before_title'   => [
						'type' => 'toggle',
					],
					'neve_single_post_metadata_separator' => [
						'label' => __( 'Post meta separator', 'neve' ),
						'type'  => 'text',
					],
					'neve_single_post_author_avatar'      => [
						'type' => 'toggle',
					],
					'neve_single_post_avatar_size'        => [
						'type' => 'responsive-range',
					],
					'neve_single_post_show_last_updated_date' => [
						'type' => 'toggle',
					],
					'neve_post_cover_title_boxed_layout'  => [
						'type' => 'toggle',
					],
					'neve_post_cover_title_boxed_padding' => [
						'type' => 'responsive-spacing',
					],
				],
			],
			'thumbnail'       => [
				'label'    => __( 'Thumbnail', 'neve' ),
				'controls' => [
					'neve_post_thumbnail_size'         => [
						'label'   => esc_html__( 'Image Size', 'neve' ),
						'type'    => 'select',
						'choices' => $this->get_image_size_as_choices(),
					],
					'neve_post_thumbnail_aspect_ratio' => [
						'label'   => esc_html__( 'Image Aspect Ratio', 'neve' ),
						'type'    => 'select',
						'choices' => $ar_choices,
					],
					'neve_post_cover_height'           => [
						'type' => 'responsive-range',
					],
					'neve_post_cover_padding'          => [
						'type' => 'responsive-spacing',
					],
					'neve_post_cover_hide_thumbnail'   => [
						'label' => __( 'Hide featured image', 'neve' ),
						'type'  => 'toggle',
					],
					'neve_post_cover_blend_mode'       => [
						'label'   => __( 'Blend mode', 'neve' ),
						'type'    => 'select',
						'choices' => $this->get_blend_mode_choices(),
					],
					'neve_post_cover_overlay_opacity'  => [
						'label' => __( 'Overlay opacity', 'neve' ),
						'type'  => 'range',
					],
				],
			],
			'content'         => [
				'label'    => __( 'Content', 'neve' ),
				'controls' => [],
			],
			'tags'            => [
				'label'    => __( 'Tags', 'neve' ),
				'controls' => [],
			],
			'post-navigation' => [
				'label'    => __( 'Post navigation', 'neve' ),
				'controls' => [],
			],
			'comments'        => [
				'label'    => __( 'Comments', 'neve' ),
				'controls' => [],
			],
		];

		$order_default_components = $this->get_v4_defaults( 'neve_layout_single_post_elements_order', $this->post_ordering() );

		/**
		 * Filters the elements on the single post page.
		 *
		 * @param array $all_components Single post page components.
		 *
		 * @since 2.11.4
		 */
		$components = apply_filters( 'neve_single_post_elements', $all_components );

		$this->add_control(
			new Control(
				'neve_post_thumbnail_size',
				[
					'default'           => 'neve-blog',
					'sanitize_callback' => function( $value ) {
						return array_key_exists( $value, $this->get_image_size_as_choices() ) ? $value : 'neve-blog';
					},
				],
				[
					'section'         => $this->section,
					'type'            => 'hidden',
					'active_callback' => function() {
						return ! $this->is_cover_layout();
					},
				]
			)
		);

		$this->add_control(
			new Control(
				'neve_post_thumbnail_aspect_ratio',
				[
					'default'           => 'original',
					'sanitize_callback' => function( $value ) use ( $ar_choices ) {
						return array_key_exists( $value, $ar_choices ) ? $value : 'original';
					},
				],
				[
					'section'         => $this->section,
					'type'            => 'hidden',
					'active_callback' => function() {
						return ! $this->is_cover_layout();
					},
				]
			)
		);

		$this->add_control(
			new Control(
				'neve_layout_single_post_elements_order',
				[
					'sanitize_callback' => [ $this, 'sanitize_post_elements_ordering' ],
					'default'           => wp_json_encode( $order_default_components ),
				],
				[
					'label'      => esc_html__( 'Elements Order', 'neve' ),
					'section'    => $this->section,
					'components' => $components,
					'priority'   => 100,
				],
				'Neve\Customizer\Controls\React\Ordering'
			)
		);

		$this->add_control(
			new Control(
				'neve_single_post_elements_spacing',
				[
					'sanitize_callback' => 'neve_sanitize_range_value',
					'transport'         => $this->selective_refresh,
					'default'           => '{"desktop":60,"tablet":60,"mobile":60}',
				],
				[
					'label'                 => esc_html__( 'Spacing between elements', 'neve' ),
					'section'               => $this->section,
					'type'                  => 'hidden',
					'input_attrs'           => [
						'max'        => 500,
						'units'      => [ 'px', 'em', 'rem' ],
						'defaultVal' => [
							'mobile'  => 60,
							'tablet'  => 60,
							'desktop' => 60,
							'suffix'  => [
								'mobile'  => 'px',
								'tablet'  => 'px',
								'desktop' => 'px',
							],
						],
					],
					'priority'              => 105,
					'live_refresh_selector' => true,
					'live_refresh_css_prop' => [
						'cssVar' => [
							'responsive' => true,
							'vars'       => '--spacing',
							'selector'   => '.nv-single-post-wrap',
							'suffix'     => 'px',
						],
					],
				],
				'\Neve\Customizer\Controls\React\Responsive_Range'
			)
		);
	}

	/**
	 * Add content spacing control.
	 */
	private function content_vspacing() {
		$this->add_control(
			new Control(
				Config::MODS_SINGLE_POST_VSPACING_INHERIT,
				[
					'sanitize_callback' => 'neve_sanitize_vspace_type',
					'default'           => 'inherit',
				],
				[
					'label'              => esc_html__( 'Content Vertical Spacing', 'neve' ),
					'section'            => $this->section,
					'priority'           => 107,
					'choices'            => [
						'inherit'  => [
							'tooltip' => esc_html__( 'Inherit', 'neve' ),
							'icon'    => 'text',
						],
						'specific' => [
							'tooltip' => esc_html__( 'Custom', 'neve' ),
							'icon'    => 'text',
						],
					],
					'footer_description' => [
						'inherit' => [
							'template'         => esc_html__( 'Customize the default vertical spacing <ctaButton>here</ctaButton>.', 'neve' ),
							'control_to_focus' => Config::MODS_CONTENT_VSPACING,
						],
					],
				],
				'\Neve\Customizer\Controls\React\Radio_Buttons'
			)
		);

		$default_value = get_theme_mod( Config::MODS_CONTENT_VSPACING, $this->content_vspacing_default() );
		$this->add_control(
			new Control(
				Config::MODS_SINGLE_POST_CONTENT_VSPACING,
				[
					'default'   => $default_value,
					'transport' => $this->selective_refresh,
				],
				[
					'label'                 => __( 'Custom Value', 'neve' ),
					'sanitize_callback'     => [ $this, 'sanitize_spacing_array' ],
					'section'               => $this->section,
					'input_attrs'           => [
						'units'     => [ 'px', 'vh' ],
						'axis'      => 'vertical',
						'dependsOn' => [ Config::MODS_SINGLE_POST_VSPACING_INHERIT => 'specific' ],
					],
					'default'               => $default_value,
					'priority'              => 107,
					'live_refresh_selector' => true,
					'live_refresh_css_prop' => [
						'cssVar'      => [
							'vars'       => '--c-vspace',
							'selector'   => 'body.single:not(.single-product) .neve-main',
							'responsive' => true,
							'fallback'   => '',
						],
						'directional' => true,
					],
				],
				'\Neve\Customizer\Controls\React\Spacing'
			)
		);
	}

	/**
	 * Add post meta controls.
	 */
	private function post_meta() {

		$components = apply_filters(
			'neve_meta_filter',
			[
				'author'   => __( 'Author', 'neve' ),
				'category' => __( 'Category', 'neve' ),
				'date'     => __( 'Date', 'neve' ),
				'comments' => __( 'Comments', 'neve' ),
			]
		);

		$default_value = get_theme_mod( 'neve_single_post_meta_fields', self::get_default_single_post_meta_fields() );

		$this->add_control(
			new Control(
				'neve_single_post_meta_fields',
				[
					'sanitize_callback' => 'neve_sanitize_meta_repeater',
					'default'           => $default_value,
				],
				[
					'label'            => esc_html__( 'Meta Order', 'neve' ),
					'section'          => $this->section,
					'fields'           => [
						'hide_on_mobile' => [
							'type'  => 'checkbox',
							'label' => __( 'Hide on mobile', 'neve' ),
						],
					],
					'components'       => $components,
					'allow_new_fields' => 'no',
					'priority'         => 105,
				],
				'\Neve\Customizer\Controls\React\Repeater'
			)
		);

		$default_separator = get_theme_mod( 'neve_metadata_separator', esc_html( '/' ) );
		$this->add_control(
			new Control(
				'neve_single_post_metadata_separator',
				[
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => $default_separator,
				],
				[
					'priority'    => 120,
					'section'     => $this->section,
					'label'       => esc_html__( 'Separator', 'neve' ),
					'description' => esc_html__( 'For special characters make sure to use Unicode. For example > can be displayed using \003E.', 'neve' ),
					'type'        => $this->is_post ? 'hidden' : 'text',
				]
			)
		);

		$author_avatar_default = get_theme_mod( 'neve_author_avatar', false );
		$this->add_control(
			new Control(
				'neve_single_post_author_avatar',
				[
					'sanitize_callback' => 'neve_sanitize_checkbox',
					'default'           => $author_avatar_default,
				],
				[
					'label'    => esc_html__( 'Show Author Avatar', 'neve' ),
					'section'  => $this->section,
					'type'     => $this->is_post ? 'hidden' : 'neve_toggle_control',
					'priority' => 125,
				]
			)
		);

		$avatar_size_default = get_theme_mod( 'neve_author_avatar_size', '{ "mobile": 20, "tablet": 20, "desktop": 20 }' );
		$this->add_control(
			new Control(
				'neve_single_post_avatar_size',
				[
					'sanitize_callback' => 'neve_sanitize_range_value',
					'default'           => $avatar_size_default,
				],
				[
					'label'           => esc_html__( 'Avatar Size', 'neve' ),
					'section'         => $this->section,
					'type'            => $this->is_post ? 'hidden' : 'neve_responsive_range_control',
					'units'           => [ 'px' ],
					'input_attr'      => [
						'mobile'  => [
							'min'          => 20,
							'max'          => 50,
							'default'      => 20,
							'default_unit' => 'px',
						],
						'tablet'  => [
							'min'          => 20,
							'max'          => 50,
							'default'      => 20,
							'default_unit' => 'px',
						],
						'desktop' => [
							'min'          => 20,
							'max'          => 50,
							'default'      => 20,
							'default_unit' => 'px',
						],
					],
					'input_attrs'     => [
						'min'        => self::RELATIVE_CSS_UNIT_SUPPORTED_MIN_VALUE,
						'max'        => 50,
						'defaultVal' => [
							'mobile'  => 20,
							'tablet'  => 20,
							'desktop' => 20,
							'suffix'  => [
								'mobile'  => 'px',
								'tablet'  => 'px',
								'desktop' => 'px',
							],
						],
						'units'      => [ 'px', 'em', 'rem' ],
					],
					'priority'        => 130,
					'active_callback' => function () {
						return get_theme_mod( 'neve_single_post_author_avatar', false );
					},
					'responsive'      => true,
				],
				'Neve\Customizer\Controls\React\Responsive_Range'
			)
		);

		$this->add_control(
			new Control(
				'neve_single_post_show_last_updated_date',
				[
					'sanitize_callback' => 'neve_sanitize_checkbox',
					'default'           => get_theme_mod( 'neve_show_last_updated_date', false ),
				],
				[
					'label'    => esc_html__( 'Use last updated date instead of the published one', 'neve' ),
					'section'  => $this->section,
					'type'     => $this->is_post ? 'hidden' : 'neve_toggle_control',
					'priority' => 135,
				]
			)
		);
	}

	/**
	 * Add comments controls.
	 */
	private function comments() {

		$this->add_control(
			new Control(
				'neve_post_comment_section_title',
				[
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'label'           => esc_html__( 'Section title', 'neve' ),
					'description'     => esc_html__( 'The following magic tags are available for this field: {title} and {comments_number}. Leave this field empty for default behavior.', 'neve' ),
					'priority'        => 155,
					'section'         => $this->section,
					'type'            => 'text',
					'active_callback' => function() {
						return $this->element_is_enabled( 'comments' );
					},
				]
			)
		);

		$this->add_boxed_layout_controls(
			'comments',
			[
				'priority'                  => 160,
				'section'                   => $this->section,
				'padding_default'           => $this->padding_default(),
				'background_default'        => 'var(--nv-light-bg)',
				'color_default'             => 'var(--nv-text-color)',
				'boxed_selector'            => '.nv-is-boxed.nv-comments-wrap',
				'text_color_css_selector'   => '.nv-comments-wrap.nv-is-boxed, .nv-comments-wrap.nv-is-boxed a',
				'border_color_css_selector' => '.nv-comments-wrap.nv-is-boxed .nv-comment-article',
				'toggle_active_callback'    => function() {
					return $this->element_is_enabled( 'comments' );
				},
				'active_callback'           => function() {
					return $this->element_is_enabled( 'comments' ) && get_theme_mod( 'neve_comments_boxed_layout', false );
				},
			]
		);

		$this->add_control(
			new Control(
				'neve_post_comment_form_title',
				[
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'label'           => esc_html__( 'Section title', 'neve' ),
					'priority'        => 180,
					'section'         => $this->section,
					'type'            => 'text',
					'active_callback' => function() {
						return $this->element_is_enabled( 'comments' );
					},
				]
			)
		);

		$this->add_control(
			new Control(
				'neve_post_comment_form_button_style',
				[
					'default'           => 'primary',
					'sanitize_callback' => 'neve_sanitize_button_type',
				],
				[
					'label'           => esc_html__( 'Button style', 'neve' ),
					'section'         => $this->section,
					'priority'        => 185,
					'type'            => 'select',
					'choices'         => [
						'primary'   => esc_html__( 'Primary', 'neve' ),
						'secondary' => esc_html__( 'Secondary', 'neve' ),
					],
					'active_callback' => function() {
						return $this->element_is_enabled( 'comments' );
					},
				]
			)
		);

		$this->add_control(
			new Control(
				'neve_post_comment_form_button_text',
				[
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'label'           => esc_html__( 'Button text', 'neve' ),
					'priority'        => 190,
					'section'         => $this->section,
					'type'            => 'text',
					'active_callback' => function() {
						return $this->element_is_enabled( 'comments' );
					},
				]
			)
		);

		$this->add_boxed_layout_controls(
			'comments_form',
			[
				'priority'                => 195,
				'section'                 => $this->section,
				'padding_default'         => $this->padding_default(),
				'is_boxed_default'        => true,
				'background_default'      => 'var(--nv-light-bg)',
				'color_default'           => 'var(--nv-text-color)',
				'boxed_selector'          => '.nv-is-boxed.comment-respond',
				'text_color_css_selector' => '.comment-respond.nv-is-boxed, .comment-respond.nv-is-boxed a',
				'toggle_active_callback'  => function() {
					return $this->element_is_enabled( 'comments' );
				},
				'active_callback'         => function() {
					return $this->element_is_enabled( 'comments' ) && get_theme_mod( 'neve_comments_form_boxed_layout', true );
				},
			]
		);
	}

	/**
	 * Change heading controls properties.
	 */
	public function adjust_headings() {
		$this->change_customizer_object( 'control', 'neve_comments_heading', 'controls_to_wrap', 15 );
	}

	/**
	 * Active callback for sharing controls.
	 *
	 * @param string $element Post page element.
	 *
	 * @return bool
	 */
	public function element_is_enabled( $element ) {
		$default_order = apply_filters(
			'neve_single_post_elements_default_order',
			$this->get_v4_defaults(
				'neve_layout_single_post_elements_order',
				array(
					'title-meta',
					'thumbnail',
					'content',
					'tags',
					'comments',
				)
			)
		);

		$content_order = get_theme_mod( 'neve_layout_single_post_elements_order', wp_json_encode( $default_order ) );
		$content_order = json_decode( $content_order, true );
		if ( ! in_array( $element, $content_order, true ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Sanitize content order control.
	 */
	public function sanitize_post_elements_ordering( $value ) {
		$allowed = [
			'thumbnail',
			'title-meta',
			'content',
			'tags',
			'post-navigation',
			'comments',
			'author-biography',
			'related-posts',
			'sharing-icons',
		];

		if ( empty( $value ) ) {
			return wp_json_encode( $allowed );
		}

		$decoded = json_decode( $value, true );

		foreach ( $decoded as $val ) {
			if ( ! in_array( $val, $allowed, true ) ) {
				return wp_json_encode( $allowed );
			}
		}

		return $value;
	}

	/**
	 * Fuction used for active_callback control property.
	 *
	 * @return bool
	 */
	public static function is_cover_layout() {
		return get_theme_mod( 'neve_post_header_layout' ) === 'cover';
	}

	/**
	 *  Fuction used for active_callback control property for boxed title.
	 *
	 * @return bool
	 */
	public function is_boxed_title() {
		if ( ! self::is_cover_layout() ) {
			return false;
		}
		return get_theme_mod( 'neve_post_cover_title_boxed_layout', false );
	}

	/** 
	 * Get the image size as choices.
	 * 
	 * @return array
	 */
	private function get_image_size_as_choices() {

		$image_size_values = get_intermediate_image_sizes(); // phpcs:ignore WordPressVIPMinimum.Functions.RestrictedFunctions.get_intermediate_image_sizes_get_intermediate_image_sizes

		// Needed in VIP environment to at least provide the blog image size.
		if ( ! in_array( 'neve-blog', $image_size_values, true ) ) {
			array_push( $image_size_values, 'neve-blog' );
		}

		array_push( $image_size_values, 'full' );
		
		$image_size_choices = array_map(
			function( $value ) {
				return ucwords( str_replace( [ '-', '_' ], ' ', $value ) );
			},
			array_combine( $image_size_values, $image_size_values )
		);

		return $image_size_choices;
	}
}
