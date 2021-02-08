<?php

/**
 * Template Name: Right Sidebar Page
 *
 */
get_header();
?>
<main>
    <section class="standard">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-9">
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_title('<h1>', '</h1>');
                            the_content();
                        }
                    } ?>

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