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
				<div id="primary" class="col-xs-12">
				
					<h1 class="page-title"><?php echo custom_get_the_archive_title();?></h1>
					<div class="row">
					<?php if (have_posts()) {
						while (have_posts()) {
							the_post();
							$permalink = get_permalink();
							$service_title = get_the_title();
							$image = get_field( 'featured_image');
							$excerpt = get_field( 'excerpt');
						 ?>
					
					<div class="col-lg-4 d-flex mb-3 align-items-stretch animate__animated animate__slideInLeft" data-aos="fade-right">
							  <div class="card">
								<div class="card-img">
								  <img src="<?php echo $image['url'];?>" alt="design1">
								</div>
								<div class="card-body">
								  <h5 class="card-title "><a href="<?php echo esc_url( $permalink ); ?>" class="primary"><?php echo esc_html( $service_title); ?></a></h5>
								  <p class="card-text text-color"><?php echo $excerpt;?></p>
								  <div class="service-btn">
									<p><a class=" service-btn btn btn-lg btn-primary" href="<?php echo esc_url( $permalink ); ?>" role="button">View </a></p>
								  </div>
								</div>
							  </div>
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