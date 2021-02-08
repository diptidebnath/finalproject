<?php
$title = get_sub_field('title');
$disc = get_sub_field('description');
$backgroundcolor = get_sub_field('background_color');
?>
 
    <div class="container marketing team_container">
      <!-- Three columns of text below the carousel -->
      <div class="team-sub-heading mb-5">
        <h2 class="text-center"><?php echo $title;?> </h2>
        <p class="text-center mx-auto"><?php echo $disc;?></p>
      </div>
      
      <div class="row">
      <?php 
       // Check rows exists.
       if (have_rows('team_member')) :

       // Loop through rows.
        while (have_rows('team_member')) : the_row();

    // Load sub field value.
    $image = get_sub_field('image');
    $name = get_sub_field('name');
    $title = get_sub_field('title');
    $email = get_sub_field('email');
    $social_icon = get_sub_field('social_icon');
   
    ?>  
        <div class="col-lg-4">
        
          <img class="bd-placeholder-img border border-primary" width="325" height="400" src="<?php echo $image['url']; ?>"
            alt="team member">
          <h2><?php echo $name;?></h2>
          <p><i><?php echo $title;?></i></p>
          <p><a href="mailto:<?php echo $email;?>"><i class="fas fa-envelope"></i></a>  <a href="<?php echo $social_icon;?>"><i class="fab fa-linkedin-in"></i></a></p>
         
        </div><!-- /.col-lg-4 -->
        <?php
                // End loop.
                endwhile;
            endif;
            ?>
      </div><!-- /.row -->
      
    </div>

 