<section class="carusel">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">

      <?php
      $i = 0;
      // Check rows exists.
      if (have_rows('slider')) :

        // Loop through rows.
        while (have_rows('slider')) : the_row();

          // Load sub field value.
          $title = get_sub_field('title');
          $disc = get_sub_field('description');
          $background_image = get_sub_field('background_image');
          $background_color = get_sub_field('background_color');
          $button = get_sub_field('button');
          $i++;
          $activeClass = "";
          if ($i == 1) {
            $activeClass = "active";
          }
      ?>


          <div class="carousel-item <?= $activeClass ?>">
            <img class="slide-image" src="<?php echo $background_image['url']; ?>" alt="slide-1">
            <div class="container">
              <div class="carousel-caption">
                <h1 class="display-3 animate__animated animate__fadeInLeft"><?php echo $title; ?></h1>
                <p class="h3 animate__animated animate__fadeInRight animate__delay-1s"><?php echo $disc; ?></p>
                <p></p>
                <p><a class="btn btn-lg btn-primary" href="<?php echo $button; ?>" role="button">Learn more</a></p>

              </div>
            </div>
          </div>
      <?php
        // End loop.
        endwhile;
      endif;
      ?>

    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</section>