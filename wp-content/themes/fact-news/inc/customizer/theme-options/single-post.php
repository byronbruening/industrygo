<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'fact_news_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'fact-news' ),
		'panel' => 'fact_news_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'fact_news_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'fact-news' ),
			'settings' => 'fact_news_enable_single_category',
			'section'  => 'fact_news_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'fact_news_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'fact-news' ),
			'settings' => 'fact_news_enable_single_author',
			'section'  => 'fact_news_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'fact_news_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'fact-news' ),
			'settings' => 'fact_news_enable_single_date',
			'section'  => 'fact_news_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'fact_news_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'fact-news' ),
			'settings' => 'fact_news_enable_single_tag',
			'section'  => 'fact_news_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'fact_news_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'fact-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'fact_news_related_posts_title',
	array(
		'label'           => esc_html__( 'Related Posts Title', 'fact-news' ),
		'section'         => 'fact_news_single_page_options',
		'settings'        => 'fact_news_related_posts_title',
	)
);
