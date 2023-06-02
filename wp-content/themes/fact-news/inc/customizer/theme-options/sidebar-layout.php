<?php
/**
 * Sidebar settings.
 */

$wp_customize->add_section(
	'fact_news_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'fact-news' ),
		'panel' => 'fact_news_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'fact_news_sidebar_position',
	array(
		'sanitize_callback' => 'fact_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'fact_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'fact-news' ),
		'section' => 'fact_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'fact-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'fact-news' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'fact_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'fact_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'fact_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'fact-news' ),
		'section' => 'fact_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'fact-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'fact-news' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'fact_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'fact_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'fact_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'fact-news' ),
		'section' => 'fact_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'fact-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'fact-news' ),
		),
	)
);
