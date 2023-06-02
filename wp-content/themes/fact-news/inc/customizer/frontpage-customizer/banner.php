<?php
/**
 * Adore Themes Customizer
 *
 * @package Fact News
 *
 * Banner Section
 */

$wp_customize->add_section(
	'fact_news_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'fact-news' ),
		'panel' => 'fact_news_frontpage_panel',
	)
);

// Banner enable setting.
$wp_customize->add_setting(
	'fact_news_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'fact-news' ),
			'type'     => 'checkbox',
			'settings' => 'fact_news_banner_section_enable',
			'section'  => 'fact_news_banner_section',
		)
	)
);

// Banner Section Sub Heading.
$wp_customize->add_setting(
	'fact_news_banner_section_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Fact_News_Sub_Section_Heading_Custom_Control(
		$wp_customize,
		'fact_news_banner_section_sub_heading',
		array(
			'label'           => esc_html__( 'Banner Slider Section', 'fact-news' ),
			'settings'        => 'fact_news_banner_section_sub_heading',
			'section'         => 'fact_news_banner_section',
			'active_callback' => 'fact_news_if_banner_enabled',
		)
	)
);

// banner slider content type settings.
$wp_customize->add_setting(
	'fact_news_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'fact_news_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Banner Slider Content type:', 'fact-news' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'fact-news' ),
		'section'         => 'fact_news_banner_section',
		'type'            => 'select',
		'active_callback' => 'fact_news_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'fact-news' ),
			'category' => esc_html__( 'Category', 'fact-news' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// banner post setting.
	$wp_customize->add_setting(
		'fact_news_banner_slider_post_' . $i,
		array(
			'sanitize_callback' => 'fact_news_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'fact_news_banner_slider_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'fact-news' ), $i ),
			'section'         => 'fact_news_banner_section',
			'type'            => 'select',
			'choices'         => fact_news_get_post_choices(),
			'active_callback' => 'fact_news_banner_section_content_type_post_enabled',
		)
	);

}

// banner category setting.
$wp_customize->add_setting(
	'fact_news_banner_slider_category',
	array(
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'fact_news_banner_slider_category',
	array(
		'label'           => esc_html__( 'Category', 'fact-news' ),
		'section'         => 'fact_news_banner_section',
		'type'            => 'select',
		'choices'         => fact_news_get_post_cat_choices(),
		'active_callback' => 'fact_news_banner_section_content_type_category_enabled',
	)
);

// Posts Tab Sub Heading.
$wp_customize->add_setting(
	'fact_news_posts_tab_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Fact_News_Sub_Section_Heading_Custom_Control(
		$wp_customize,
		'fact_news_posts_tab_sub_heading',
		array(
			'label'           => esc_html__( 'Posts Tab Section', 'fact-news' ),
			'settings'        => 'fact_news_posts_tab_sub_heading',
			'section'         => 'fact_news_banner_section',
			'active_callback' => 'fact_news_if_banner_enabled',
		)
	)
);

// Latest News Tab Enable.
$wp_customize->add_setting(
	'fact_news_latest_news_tab_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_latest_news_tab_enable',
		array(
			'label'           => esc_html__( 'Enable Latest News Tab', 'fact-news' ),
			'type'            => 'checkbox',
			'settings'        => 'fact_news_latest_news_tab_enable',
			'section'         => 'fact_news_banner_section',
			'active_callback' => 'fact_news_if_banner_enabled',
		)
	)
);

// Random News Tab Enable.
$wp_customize->add_setting(
	'fact_news_random_news_tab_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_random_news_tab_enable',
		array(
			'label'           => esc_html__( 'Enable Random News Tab', 'fact-news' ),
			'type'            => 'checkbox',
			'settings'        => 'fact_news_random_news_tab_enable',
			'section'         => 'fact_news_banner_section',
			'active_callback' => 'fact_news_if_banner_enabled',
		)
	)
);

/*========================Active Callback==============================*/
function fact_news_if_banner_enabled( $control ) {
	return $control->manager->get_setting( 'fact_news_banner_section_enable' )->value();
}

// banner slider
function fact_news_banner_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'fact_news_banner_slider_content_type' )->value();
	return fact_news_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function fact_news_banner_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'fact_news_banner_slider_content_type' )->value();
	return fact_news_if_banner_enabled( $control ) && ( 'category' === $content_type );
}