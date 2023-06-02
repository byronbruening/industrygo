<?php
/**
 * Header Options settings
 */

$wp_customize->add_section(
	'fact_news_header_options_section',
	array(
		'title' => esc_html__( 'Header Options', 'fact-news' ),
		'panel' => 'fact_news_theme_options_panel',
	)
);

// Enable topbar Options.
$wp_customize->add_setting(
	'fact_news_enable_topbar',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_enable_topbar',
		array(
			'label'    => esc_html__( 'Enable Topbar.', 'fact-news' ),
			'section'  => 'fact_news_header_options_section',
			'settings' => 'fact_news_enable_topbar',
			'type'     => 'checkbox',
		)
	)
);
