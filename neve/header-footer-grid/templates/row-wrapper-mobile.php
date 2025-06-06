<?php
/**
 * Template used for component rendering wrapper.
 *
 * Name:    Header Footer Grid
 *
 * @version 1.0.0
 * @package HFG
 */
namespace HFG;

use HFG\Core\Builder\Abstract_Builder;
use HFG\Core\Builder\Header as HeaderBuilder;
use HFG\Core\Components\MenuIcon;

$row_index        = current_row();
$interaction_type = row_setting( Abstract_Builder::LAYOUT_SETTING );
$classes          = [ 'header-menu-sidebar', 'tcb', 'menu-sidebar-panel', $interaction_type, 'hfg-pe' ];
$is_contained     = in_array( $interaction_type, [ 'full_canvas', 'dropdown' ], true );
$close_contained  = $interaction_type === 'dropdown';
$inner_classes    = 'header-menu-sidebar-inner tcb ' . ( $is_contained ? ' container' : '' );
$item_attributes  = apply_filters( 'neve_nav_toggle_data_attrs', '' );
$close_classes    = 'close-sidebar-panel navbar-toggle-wrapper' . ( $close_contained ? ' container' : '' );
$submenu_style    = row_setting( 'layout', 'slide_left' );
$menu_icon_class  = apply_filters( 'neve_menu_icon_classes', 'hamburger is-active ' );

$menu_icon = component_setting( MenuIcon::MENU_ICON );
$menu_svg  = component_setting( MenuIcon::MENU_SVG );
if ( ! in_array( $menu_icon, [ 'donner', 'dots', 'svg', 'wave' ], true ) ) {
	$menu_icon = 'default';
}
if ( $menu_icon === 'svg' && empty( $menu_svg ) ) {
	$menu_icon = 'default';
}
?>
<div
		id="header-menu-sidebar" class="<?php echo esc_attr( join( ' ', $classes ) ); ?>"
		data-row-id="<?php echo esc_attr( $row_index ); ?>">
	<div id="header-menu-sidebar-bg" class="header-menu-sidebar-bg">
		<?php
		if ( $submenu_style !== 'dropdown' ) {
			?>
		<div class="<?php echo esc_attr( $close_classes ); ?>">
			<button type="button" class="<?php echo esc_attr( $menu_icon_class ); ?> navbar-toggle active" <?php echo ( $item_attributes );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					value="<?php esc_attr_e( 'Navigation Menu', 'neve' ); ?>"
					aria-label="<?php esc_attr_e( 'Navigation Menu', 'neve' ); ?> "
					<?php echo MenuIcon::aria_expanded_behaviour(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php
			if ( $menu_icon_class === 'hamburger is-active ' ) {
				?>
					<span class="bars">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</span>
				<?php
			} else {
				?>
				<span class="hamburger-box <?php echo esc_attr( 'icon-' . $menu_icon ); ?>">
					<?php
					if ( $menu_icon === 'svg' ) {
						echo neve_kses_svg( $menu_svg ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} else {
						?>
						<span class="hamburger-inner"></span>
						<?php
					}
					?>
				</span>
				<?php
			}
			?>
				<span class="screen-reader-text">
			<?php
			esc_html_e( 'Navigation Menu', 'neve' );
			?>
					</span>
			</button>
		</div>
			<?php
		}
		?>
		<div id="header-menu-sidebar-inner" class="<?php echo esc_attr( $inner_classes ); ?>">
			<?php
			/**
			 * Executes actions before the content of the menu sidebar that appears on mobile devices.
			 *
			 * @since 3.0.6
			 */
			do_action( 'neve_before_mobile_menu_content' );
			?>
			<?php render_components( HeaderBuilder::BUILDER_NAME ); ?>
			<?php
			/**
			 * Executes actions after the content of the menu sidebar that appears on mobile devices.
			 *
			 * @since 3.0.6
			 */
			do_action( 'neve_after_mobile_menu_content' );
			?>
		</div>
	</div>
</div>
<div class="header-menu-sidebar-overlay hfg-ov hfg-pe" <?php echo MenuIcon::aria_expanded_behaviour( true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>></div>
