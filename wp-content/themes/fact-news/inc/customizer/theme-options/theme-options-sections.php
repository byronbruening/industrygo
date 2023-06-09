<?php

/**
 * Theme Options Customizer.
 */

$wp_customize->add_panel(
	'fact_news_theme_options_panel',
	array(
		'title'    => esc_html__( 'Theme Options', 'fact-news' ),
		'priority' => 150,
	)
);

$theme_options_customizer = array( 'header-options', 'font-options', 'sidebar-layout', 'breadcrumb', 'archive-options', 'pagination', 'single-post', 'footer', 'back-to-top' );

foreach ( $theme_options_customizer as $customizer ) {
	require get_template_directory() . '/inc/customizer/theme-options/' . $customizer . '.php';

}
