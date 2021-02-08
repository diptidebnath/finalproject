<?php

/**
 * Single Post Page
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
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                }
                                $author_id = get_the_author_meta('ID');
                        ?>
                                <h1 class="title"><?php echo get_the_title(); ?></h1>
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
                        <?php
                                the_content();
                            }
                        } ?>
                    </article>
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