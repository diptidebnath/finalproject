<?php

/**
 * Template Name: Full Width Page
 *
 */
get_header();
?>
<main>
<section class="standard">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12">
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_title('<h1>', '</h1>');
                            the_content();
                        }
                    } ?>
                </div>

            </div>
        </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>