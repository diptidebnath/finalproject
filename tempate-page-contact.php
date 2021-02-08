<?php

/**
 * Template Name: Contact Page
 *
 */
get_header();
?>
<main>
<?php

// Check value exists.
if( have_rows('content_for_contact_page') ):

    // Loop through rows.
    while ( have_rows('content_for_contact_page') ) : the_row();

        // Case: hero_section.
        if( get_row_layout() == 'hero_section' ):
            get_template_part(('components/parts_hero_section'));
        
          // Case: contact_section.
          elseif( get_row_layout() == 'contact_section' ): 
            get_template_part(('components/parts_contact_section'));

        
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