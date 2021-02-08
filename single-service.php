<?php

/**
 * Single Service Page
 *
 */
get_header();
?>
<main>
    <section class="standard">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-9">
                <article>
                        <?php if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                $featured_image = get_field('featured_image');

                        ?>
                                <h1 class="title"><?php echo get_the_title(); ?></h1>
                                <?php if($featured_image){?>

                                <img src="<?php echo $featured_image['url']; ?>" alt="project Image" class="project_featured_img" />

                        <?php
                        }
                                the_content();
                            }
                        } ?>
                    </article>
                </div>

                <aside id="secondary" class="col-xs-12 col-md-3">
                    <div id="sidebar">
                        <?php
                        if (is_active_sidebar('service-sidebar')) {
                            dynamic_sidebar('service-sidebar');
                        }
                        ?>
                    </div>
                </aside>


            </div>
        </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>