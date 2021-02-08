<?php

/**
 * main blog page
 *
 */
get_header();

?>
<main>
	<section class="standard">
		<div class="container">
			<div class="row">
				<div id="primary" class="col-xs-12 col-md-9">
					
					<h1 class="page-title"><?php echo custom_get_the_archive_title();?></h1>
					<?php if (have_posts()) {
						while (have_posts()) {
							the_post();
							$author_id = get_the_author_meta('ID');
					?>
							<article>
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail();
								} ?>
								<h2 class="title">
									<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
								</h2>
								<ul class="meta">
									<li>
										<i class="fa fa-calendar"></i> <?php echo get_the_date('j F, Y'); ?>
									</li>
									<li>
										<i class="fa fa-user"></i><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
									</li>
									<li>
										<i class="fa fa-tag"></i>
										<?php
										$categories = get_the_category();
										$separator = ', ';
										$output = '';
										if (!empty($categories)) {
											foreach ($categories as $category) {
												$output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
											}
											echo trim($output, $separator);
										}
										?>
									</li>
								</ul>
								<p><?php echo get_the_excerpt() ?></p>
							</article>
					<?php }
					}
					?>
					<?php
					/* 
					** call the pagination function which is defined in functions.php 
					*/
					wp_numeric_posts_nav();
					?>

				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
		</div>
	</section>
</main>

<?php
get_footer();
?>