<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$services = get_sub_field('services');

?>
<section id="services" class="services section-bg my-5">
    <div class="container">

      <div class="section-title">
        <h2 data-aos="fade-in"><?php echo $title;?></h2>
        <p data-aos="fade-in"><?php echo $description;?></p>
      </div>

      <div class="row">

      
     <?php  if( $services ): 
     foreach( $services as $service ): 
        $permalink = get_permalink( $service->ID );
        $service_title = get_the_title( $service->ID );
        $image = get_field( 'featured_image', $service->ID );
        $excerpt = get_field( 'excerpt', $service->ID );
     ?>

<div class="col-lg-6 d-flex align-items-stretch animate__animated animate__slideInLeft" data-aos="fade-right">
          <div class="card">
            <div class="card-img">
              <img src="<?php echo $image['url'];?>" alt="design1">
            </div>
            <div class="card-body">
              <h5 class="card-title "><a href="<?php echo esc_url( $permalink ); ?>" class="primary"><?php echo esc_html( $service_title); ?></a></h5>
              <p class="card-text text-color"><?php echo $excerpt;?></p>
              <div class="service-btn">
                <p><a class=" service-btn btn btn-lg btn-primary" href="<?php echo esc_url( $permalink ); ?>" role="button">View </a></p>
              </div>
            </div>
          </div>
        </div>

      
    <?php endforeach; ?>
<?php endif; ?>

       
       
      
        
      </div>

    </div>
  </section>