<?php

/**
 * 404 page
 *
 */
get_header();
?>
<main>
    <section class="standard">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12">
                    <h1 class="entry-title"><?php _e('Oops! Page not found', 'lidit'); ?></h1>

                    <div class="intro-text-not-found">
                        <p><?php _e('The page you are looking for doesnot exist or an another error occurred. Go back and choose a new direction. ', 'lidit'); ?></p>
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