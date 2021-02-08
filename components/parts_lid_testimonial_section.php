<?php
$title = get_sub_field('title');

?>
<section class="text-center my-5 testimonial-section">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5"><?php echo $title; ?></h2>

  <div class="wrapper-carousel-fix">
    <!-- Carousel Wrapper -->
    <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel" data-interval="false">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <?php
        // Check rows exists.
        if (have_rows('slider')) :

          // Loop through rows.
          while (have_rows('slider')) : the_row();
          $blank_review = 0;
            // Load sub field value.
            $image = get_sub_field('image');
            $description = get_sub_field('description');
            $name = get_sub_field('name');
            $jobtitle = get_sub_field('title');
            $starsymbol = (int) get_sub_field('star_symbol');
            $i++;
            $activeClass = "";
            if ($i == 1) {
              $activeClass = "active";
            }
        ?>
            <!--First slide-->
            <div class="carousel-item <?= $activeClass ?>">
              <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="<?php echo $image['url']; ?>" class="rounded-circle img-fluid" alt="First sample avatar image">
                </div>
                <!--Content-->
                <p>
                  <i class="fas fa-quote-left"></i><?php echo $description; ?>
                </p>
                <h4 class="font-weight-bold"><?php echo $name; ?></h4>
                <h6 class="font-weight-bold my-3"><?php echo $jobtitle; ?></h6>

                <?php 
                for ($i=1; $i<=$starsymbol; $i++ ){
                  echo '<i class="fas fa-star blue-text"> </i>';
                }
                $blank_review =  5 - $starsymbol;
                if($blank_review >= 1){
                  for ($i=1; $i<=$blank_review; $i++ ){
                    echo '<i class="fa fa-star-o blue-text"> </i>';
                  }
                }
              ?>

              </div>
            </div>
            <!--First slide-->



        <?php
          // End loop.
          endwhile;
        endif;
        ?>
      </div>
      <!--Slides-->
      <!--Controls-->
      <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
      <!--Controls-->


    </div>
    <!-- Carousel Wrapper -->
  </div>
</section>