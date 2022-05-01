<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Massage Knox</title>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
      <div class="logo-container">
        <div class="logo">
          <a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/images/navlogo.png') ?>"/></a>
        </div>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
            <li><a href="<?php echo site_url('About') ?>">About</a></li>
              <li><a href="<?php echo site_url('Services') ?>">Services</a></li>
              <li><a href="<?php echo site_url('Appointments') ?>">Appointments</a></li>
              <li><a href="#">Covid</a></li>
              <li><a href="#">Gift Cards</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
