
<?php
$title = get_sub_field('title');

?>

<section id="clients" class="clients section-bg">
    <div class="container">
      <div class="text-center">
        <h2 class="h1-responsive font-weight-bold my-5"><?php echo $title;?></h2>
      </div>
      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
      <?php 
       // Check rows exists.
       if (have_rows('clients_logo')) :

       // Loop through rows.
        while (have_rows('clients_logo')) : the_row();

    // Load sub field value.
    $singlelogo = get_sub_field('single_logo');
    ?>
        

        <div class="col-lg-2 col-md-4 col-6">
          <div class="client-logo">
            <img src="<?php echo $singlelogo ['url']; ?>" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="500">
          </div>
        </div>
        <?php
                // End loop.
                endwhile;
            endif;
            ?>
      </div>
      
    </div>
  </section>