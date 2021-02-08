<?php
$contact_form_title = get_sub_field('contact_form_title');
$address_title = get_sub_field('address_title');
$address = get_sub_field('address');
$map = get_sub_field('map');

?>



<main class="main clearfix container">
  <div class="row">

    <div class="col-lg-6">

      <h3 class="bold contact-row"><?php echo $address_title;?></h3>
  <p class="form-group"><?php echo $address;?>
      </p>
     <div>
      <?php echo $map;?>
      </div> 
    </div>
   
    <div class="col-lg-6 pl-md-3">

    <div>
      <h3 class="bold contact-row"><?php echo $contact_form_title;?></h3>
    </div>
      <?php
      $thankYouPage = getTplPageURL('page-thankyou.php');
      ?>
      <form class="mb-5 mt-4 mt-lg-0" name="myForm" action="<?php echo $thankYouPage; ?>" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="cname" id="name" aria-describedby="name" placeholder="Enter your name" required>

        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="phone" placeholder="Enter phone no" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Message</label>
          <textarea name="message" class="form-control"  id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <input type="submit" class="btn btn-primary submit-btn" value="Submit">
      </form>

    </div>



  </div>
</main>