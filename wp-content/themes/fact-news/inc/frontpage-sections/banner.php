<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Fact News
 */

// Banner Section.
$banner_section = get_theme_mod( 'fact_news_banner_section_enable', false );

if ( false === $banner_section ) {
	return;
}

$slider_content_ids  = array();
$banner_content_type = get_theme_mod( 'fact_news_banner_slider_content_type', 'post' );

if ( $banner_content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'fact_news_banner_slider_post_' . $i );
	}

	$banner_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $slider_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'fact_news_banner_slider_category' );
	$banner_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

?>

<div id="fact_news_banner_section" class="main-banner-section style-2 adore-navigation">
	<div class="theme-wrapper">
		<div class="main-banner-section-wrapper">

			<!-- banner slider -->
			<div class="banner-slider-outer">
				<div class="banner-slider">
					<?php
					$banner_query = new WP_Query( $banner_args );
					if ( $banner_query->have_posts() ) {
						while ( $banner_query->have_posts() ) :
							$banner_query->the_post();
							?>
							<div class="post-item-outer">
								<div class="post-item overlay-post slider-item" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
									<div class="blog-banner">
										<div class="post-overlay">
											<div class="post-item-content">
												<div class="entry-cat">
													<?php the_category( '', '', get_the_ID() ); ?>
												</div>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<ul class="entry-meta">
													<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="far fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
													<li class="post-date"> <span class="far fa-calendar-alt"></span><?php echo esc_html( get_the_date() ); ?></li>
													<li class="post-comment"><span class="far fa-comment"></span><?php echo absint( get_comments_number( get_the_ID() ) ); ?></li>
												</ul>
											</div>   
										</div>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
			<!-- end banner slider -->

			<?php
			$latest_news_enable = get_theme_mod( 'fact_news_latest_news_tab_enable', true );
			$random_news_enable = get_theme_mod( 'fact_news_random_news_tab_enable', true );

			if ( $latest_news_enable === true || $random_news_enable === true ) {

				?>
				<!-- Post Tab -->
				<div class="post-tabs-wrapper">
					<div class="post-tabs-head">
						<ul class="post-tabs">
							<?php if ( $latest_news_enable === true ) : ?>
								<li><a href="#tab-1" class="latest"><i class="far fa-clock"></i><?php echo esc_html( 'Latest News', 'fact-news' ); ?></a></li>
							<?php endif; ?>
							<?php if ( $random_news_enable === true ) : ?>
								<li><a href="#tab-3" class="latest"><i class="fas fa-random"></i><?php echo esc_html( 'Random News', 'fact-news' ); ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="post-tab-content-wrapper">
						<?php if ( $latest_news_enable === true ) : ?>
							<div class="post-tab-container" id="tab-1">
								<?php
								$latest_news_args  = array(
									'post_type'      => 'post',
									'post_status'    => 'publish',
									'posts_per_page' => absint( 5 ),
								);
								$latest_news_query = new WP_Query( $latest_news_args );
								if ( $latest_news_query->have_posts() ) :
									while ( $latest_news_query->have_posts() ) :
										$latest_news_query->the_post();
										?>
										<div class="post-item post-list">
											<div class="post-item-image">
												<?php the_post_thumbnail( 'thumbnail' ); ?>
											</div>
											<div class="post-item-content">
												<h3 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>  
												<ul class="entry-meta">
													<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="far fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
													<li class="post-date"> <span class="far fa-calendar-alt"></span><?php echo esc_html( get_the_date() ); ?></li>
													<li class="post-comment"><span class="far fa-comment"></span><?php echo absint( get_comments_number( get_the_ID() ) ); ?></li>
												</ul>
											</div>
										</div>
										<?php
									endwhile;
									wp_reset_postdata();
								endif;
								?>
							</div>
						<?php endif; ?>
						
						<?php if ( $random_news_enable === true ) : ?>
							<div class="post-tab-container" id="tab-3">
								
								<?php
								$random_posts_args = array(
									'posts_per_page'      => 5,
									'post_type'           => 'post',
									'ignore_sticky_posts' => true,
									'orderby'             => 'rand',
								);
								$random_query      = new WP_Query( $random_posts_args );
								if ( $random_query->have_posts() ) {
									while ( $random_query->have_posts() ) :
										$random_query->the_post();
										?>

										<div class="post-item post-list">
											<div class="post-item-image">
												<?php the_post_thumbnail( 'thumbnail' ); ?>
											</div>
											<div class="post-item-content">
												<h3 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>  
												<ul class="entry-meta">
													<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="far fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
													<li class="post-date"> <span class="far fa-calendar-alt"></span><?php echo esc_html( get_the_date() ); ?></li>
													<li class="post-comment"><span class="far fa-comment"></span><?php echo absint( get_comments_number( get_the_ID() ) ); ?></li>
												</ul>
											</div>
										</div>

										<?php
									endwhile;
									wp_reset_postdata();
								}
								?>

							</div>
						<?php endif; ?>

					</div>
				</div>
				<!-- End Post Tab -->

			<?php } ?>

		</div>
	</div>
</div>
