<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'fact_news_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'fact-news' ),
		'panel' => 'fact_news_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'fact_news_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'fact-news' ),
			'settings' => 'fact_news_pagination_enable',
			'section'  => 'fact_news_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'fact_news_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'fact_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'fact-news' ),
		'section'         => 'fact_news_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'fact-news' ),
			'numeric'  => __( 'Numeric', 'fact-news' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'fact_news_pagination_enable' )->value() );
		},
	)
);
