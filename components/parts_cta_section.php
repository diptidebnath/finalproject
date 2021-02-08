<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$background = get_sub_field('background_color');
$button_url = get_sub_field('button_url');
$button_text = get_sub_field('button_text');
?>
<section id="cta" class="cta">
    <div class="container">

      <div class="text-center">
        <h3><?php echo $title;?></h3>
        <p><?php echo $description;?></p>

        <a class="btn btn-lg btn-primary cta-btn" href="<?php echo $button_url;?>" role="button"><b><?php echo $button_text;?></b></a>

      </div>
    </div>
  </section>