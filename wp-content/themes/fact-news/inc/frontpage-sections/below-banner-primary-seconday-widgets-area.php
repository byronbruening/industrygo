<?php
$full_width = ! is_active_sidebar( 'below-banner-secondary-widgets-area' ) ? 'full-width' : '';
if ( is_active_sidebar( 'below-banner-primary-widgets-area' ) || is_active_sidebar( 'below-banner-secondary-widgets-area' ) ) :
	?>
	<div class="main-widget-section below-banner-widget-section">
		<div class="theme-wrapper">
			<div class="below-banner-widgets-section-wrap main-widget-section-wrap secondary-right-position <?php echo esc_attr( $full_width ); ?>">
				<div class="below-banner-primary primary-widgets-area">
					<?php dynamic_sidebar( 'below-banner-primary-widgets-area' ); ?>
				</div>
				<div class="below-banner-secondary secondary-widgets-area">
					<?php dynamic_sidebar( 'below-banner-secondary-widgets-area' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
