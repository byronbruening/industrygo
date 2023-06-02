<?php

// Featured Posts Widget.
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

// Grid Posts Widget.
require get_template_directory() . '/inc/widgets/grid-posts-widget.php';

// Trending Posts Widget.
require get_template_directory() . '/inc/widgets/trending-posts-widget.php';

// Express List Widget.
require get_template_directory() . '/inc/widgets/express-list-widget.php';

// Posts Carousel Widget.
require get_template_directory() . '/inc/widgets/posts-carousel-widget.php';

// Most Read Widget.
require get_template_directory() . '/inc/widgets/most-read-widget.php';

// Social Widget.
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function fact_news_register_widgets() {

	register_widget( 'Fact_News_Featured_Posts_Widget' );

	register_widget( 'Fact_News_Grid_Posts_Widget' );

	register_widget( 'Fact_News_Trending_Posts_Widget' );

	register_widget( 'Fact_News_Express_List_Widget' );

	register_widget( 'Fact_News_Posts_Carousel_Widget' );

	register_widget( 'Fact_News_Most_Read_Widget' );

	register_widget( 'Fact_News_Social_Widget' );

}
add_action( 'widgets_init', 'fact_news_register_widgets' );
