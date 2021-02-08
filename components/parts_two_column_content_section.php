<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$image = get_sub_field('image');

if ($image) {
  $image_url = $image['url'];
} else {
  $image_url = "https://via.placeholder.com/728x90.png?text=placeholder+image";
}
$alignment = get_sub_field('alignment');

?>

<section class="container clearfix animate__animated animate__slideInUp mb-5">
  <div class="container">


    <div class="row featurette">
    <?php if (!$alignment) { ?>
      <div class="col-lg-7">
      
        <img class="first-feature-img rounded img-rounded" src="<?php echo $image_url; ?>" alt="kaleidic">
      </div>
      <?php } ?>
      <div class="col-lg-5">
        <h4 class="featurette-heading"><?php echo $title; ?></h4>
        <?php if ($description) {
          echo $description;
        } ?>
      </div>
      <?php if ($alignment) { ?>
      <div class="col-lg-7">
      
        <img class="first-feature-img rounded img-rounded" src="<?php echo $image_url; ?>" alt="kaleidic">
      </div>
      <?php } ?>
    </div>
  </div>
</section>