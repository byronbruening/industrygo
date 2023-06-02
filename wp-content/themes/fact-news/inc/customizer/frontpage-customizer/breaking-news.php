<?php
/**
 * Adore Themes Customizer
 *
 * @package Fact News
 *
 * Breaking News Section
 */

$wp_customize->add_section(
	'fact_news_breaking_news_section',
	array(
		'title' => esc_html__( 'Breaking News Section', 'fact-news' ),
		'panel' => 'fact_news_frontpage_panel',
	)
);

// Breaking News section enable settings.
$wp_customize->add_setting(
	'fact_news_breaking_news_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'fact_news_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Fact_News_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'fact_news_breaking_news_section_enable',
		array(
			'label'    => esc_html__( 'Enable Breaking News Section', 'fact-news' ),
			'type'     => 'checkbox',
			'settings' => 'fact_news_breaking_news_section_enable',
			'section'  => 'fact_news_breaking_news_section',
		)
	)
);

// Breaking News title settings.
$wp_customize->add_setting(
	'fact_news_breaking_news_title',
	array(
		'default'           => __( 'Breaking News', 'fact-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'fact_news_breaking_news_title',
	array(
		'label'           => esc_html__( 'Title', 'fact-news' ),
		'section'         => 'fact_news_breaking_news_section',
		'active_callback' => 'fact_news_if_breaking_news_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'fact_news_breaking_news_title',
		array(
			'selector'            => '.news-ticker-section .theme-wrapper',
			'settings'            => 'fact_news_breaking_news_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'fact_news_breaking_news_title_text_partial',
		)
	);
}

// breaking_news content type settings.
$wp_customize->add_setting(
	'fact_news_breaking_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'fact_news_breaking_news_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'fact-news' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'fact-news' ),
		'section'         => 'fact_news_breaking_news_section',
		'type'            => 'select',
		'active_callback' => 'fact_news_if_breaking_news_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'fact-news' ),
			'category' => esc_html__( 'Category', 'fact-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// breaking_news post setting.
	$wp_customize->add_setting(
		'fact_news_breaking_news_post_' . $i,
		array(
			'sanitize_callback' => 'fact_news_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'fact_news_breaking_news_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'fact-news' ), $i ),
			'section'         => 'fact_news_breaking_news_section',
			'type'            => 'select',
			'choices'         => fact_news_get_post_choices(),
			'active_callback' => 'fact_news_breaking_news_section_content_type_post_enabled',
		)
	);

}

// breaking_news category setting.
$wp_customize->add_setting(
	'fact_news_breaking_news_category',
	array(
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'fact_news_breaking_news_category',
	array(
		'label'           => esc_html__( 'Category', 'fact-news' ),
		'section'         => 'fact_news_breaking_news_section',
		'type'            => 'select',
		'choices'         => fact_news_get_post_cat_choices(),
		'active_callback' => 'fact_news_breaking_news_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function fact_news_if_breaking_news_enabled( $control ) {
	return $control->manager->get_setting( 'fact_news_breaking_news_section_enable' )->value();
}
function fact_news_breaking_news_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'fact_news_breaking_news_content_type' )->value();
	return fact_news_if_breaking_news_enabled( $control ) && ( 'post' === $content_type );
}
function fact_news_breaking_news_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'fact_news_breaking_news_content_type' )->value();
	return fact_news_if_breaking_news_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'fact_news_breaking_news_title_text_partial' ) ) :
	// Title.
	function fact_news_breaking_news_title_text_partial() {
		return esc_html( get_theme_mod( 'fact_news_breaking_news_title' ) );
	}
endif;
