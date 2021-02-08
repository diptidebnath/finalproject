<?php

/**
 * Template Name: Thank you page
 *
 */
get_header();
?>
<main>
<section class="standard">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12">
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_title('<h1>', '</h1>');
                            the_content();
                        }
                    } ?>
                </div>

            </div>
        </div>
        </div>
    </section>
</main>
<?php
/**
 * form data processing
 */

$name = $_POST['cname'];
$visitor_email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
?>
<?php
	$email_from = 'diptibj@gmail.com';

	$email_subject = "New Form submission";

    $email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n".$message. "\nPhone:".$phone;


$to = "diptibj@gmail.com";

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

?>
<?php
get_footer();
?>