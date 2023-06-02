<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'fact_news_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'fact-news' ),
		'panel' => 'fact_news_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'fact_news_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'fact-news' ),
			'type'     => 'checkbox',
			'settings' => 'fact_news_breadcrumb_enable',
			'section'  => 'fact_news_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'fact_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'fact_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'fact-news' ),
		'section'         => 'fact_news_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'fact_news_breadcrumb_enable' )->value() );
		},
	)
);
