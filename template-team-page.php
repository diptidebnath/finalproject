<?php

/**
 * Template Name: Team Page
 *
 */
get_header();
?>
<main>
<?php

// Check value exists.
if( have_rows('content_for_team_page') ):

    // Loop through rows.
    while ( have_rows('content_for_team_page') ) : the_row();

        // Case: hero_section.
        if( get_row_layout() == 'hero_section' ):
            get_template_part(('components/parts_hero_section'));
        
          // Case: team_section.
          elseif( get_row_layout() == 'team_section' ): 
            get_template_part(('components/parts_team_section'));

        
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