<?php
$title = get_sub_field('title');
$disc = get_sub_field('description');
$background_image = get_sub_field('background_image');
$background_color = get_sub_field('background_color');


?>



<section class="header-banner" style="background-image: url(<?php echo $background_image['url']; ?>); background-color:<?php echo $background_color; ?>">
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-5"><?php echo $title; ?></h1>
          <p><?php echo $disc; ?></p>

        </div>
      </div>
    </section>