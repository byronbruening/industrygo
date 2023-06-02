<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'fact_news_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'fact-news' ),
		'panel' => 'fact_news_theme_options_panel',
	)
);

// Scroll to top enable setting.
$wp_customize->add_setting(
	'fact_news_enable_scroll_to_top',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_enable_scroll_to_top',
		array(
			'label'    => esc_html__( 'Enable scroll to top.', 'fact-news' ),
			'settings' => 'fact_news_enable_scroll_to_top',
			'section'  => 'fact_news_back_to_top_section',
			'type'     => 'checkbox',
		)
	)
);
