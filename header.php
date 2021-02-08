<!DOCTYPE html>
<html>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <?php
  $logo = get_field('logo', 'option');
  $primary_color = get_field('primary_color', 'option') ? get_field('primary_color', 'option') : "#154959";
  $secondary_color = get_field('secondary_color', 'option') ? get_field('secondary_color', 'option') : "#dbf73f";
  $text_color = get_field('text_color', 'option') ? get_field('text_color', 'option') : "#000000";

  ?>
  <style>
    body .primary {
      color: <?php echo $primary_color; ?>;
    }

    body .primary_bg,
    .btn-primary {
      background-color: <?php echo $primary_color; ?> !important;
    }

    .btn-primary {
      border-color: <?php echo $primary_color; ?> !important;
    }

    .secondary {
      color: <?php echo $secondary_color; ?>;
    }

    body .secondary_bg {
      background-color: <?php echo $secondary_color; ?> !important;
    }

    .text-color,
    body {
      color: <?php echo $text_color; ?>;
    }
  </style>

</head>

<body <?php body_class(); ?>>



  <header>
    <nav class="navbar navbar-expand-md navbar-dark primary_bg fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
        <?php if ($logo) { ?>
          <img src="<?php echo $logo; ?>">
        <?php } else {
          echo get_bloginfo('name');
        }

        ?>
      </a>
      <i id="mobile_menu_icon" class="fas fa-bars d-lg-none"></i>
      <div class="navbar-collapse primary_bg" id="navbarCollapse">


       <?php

        /* Displays a navigation menu */
        wp_nav_menu(array(
          'theme_location' => 'header-menu',
          'container' => 'ul',
          'menu_class' => 'menu ml-auto',
        )); ?>

      </div>
    </nav>
  </header>
  <?php
  if (function_exists('get_breadcrumb')) {
    get_breadcrumb();
  }

  ?>