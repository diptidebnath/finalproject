<?php

/**
 * Template Name: Home Page
 *
 */
get_header();
?>
<main>
    
    <?php

// Check value exists.
if( have_rows('content_for_home_page') ):

    // Loop through rows.
    while ( have_rows('content_for_home_page') ) : the_row();

        // Case: hero_section.
        if( get_row_layout() == 'hero_section' ):
            get_template_part(('components/parts_hero_section'));
     
        // Case: two_column_content_section.
        elseif( get_row_layout() == 'two_column_content_section' ): 
            get_template_part(('components/parts_two_column_content_section'));

             // Case: features_sections.
        elseif( get_row_layout() == 'features_sections' ): 
            get_template_part(('components/parts_features_sections'));

             // Case: slider_section.
        elseif( get_row_layout() == 'slider_section' ): 
            get_template_part(('components/parts_slider_section'));

            // Case: carousel_section.
        elseif( get_row_layout() == 'carousel_section' ): 
            get_template_part(('components/parts_carousel_section'));

                 // Case: service_section.
            elseif( get_row_layout() == 'service_section' ): 
                get_template_part(('components/parts_service_section'));

                 // Case: clients_section.
            elseif( get_row_layout() == 'clients_section' ): 
                get_template_part(('components/parts_clients_section'));
               
                // Case: lid_testimonial_section.
            elseif( get_row_layout() == 'lid_testimonial_section' ): 
                get_template_part(('components/parts_lid_testimonial_section'));

                // Case: cta_section.
          elseif( get_row_layout() == 'cta_section' ): 
            get_template_part(('components/parts_cta_section'));

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
    
    ?>
    
</main>

<?php
get_footer();
?>