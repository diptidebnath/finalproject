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
				<div id="primary" class="col-xs-12 ">

					<h1 class="page-title"><?php echo custom_get_the_archive_title(); ?></h1>
					<div class="masonry">
						<?php if (have_posts()) {
							while (have_posts()) {
								the_post();
								$author_id = get_the_author_meta('ID');
						?> <div class="item">
									<article>
										<?php
										$featured_image = get_field('featured_image');

										if ($featured_image) { ?>

											<img src='<?php echo $featured_image["url"]; ?>' alt="project Image" class="project_featured_img" />

										<?php } ?> <div class="overlay_content">
											<h2 class="title">
												<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
											</h2>
										</div>
									</article>
								</div>
						<?php }
						}
						?>
					</div>

				</div>

			</div>
		</div>
		</div>
	</section>
</main>

<?php
get_footer();
?>