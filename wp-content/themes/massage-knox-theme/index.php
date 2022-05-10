<?php get_header(); ?>

<div style="background-image: url(<?php echo get_theme_file_uri('/images/room1.jpg') ?>)" class="image-container">
  <div class="image-header">
    <h2>Welcome to</h2>
  </div>
  <div class="image-header">
    <span><strong>MASSAGE KNOX BY SHANNON COX</strong><span>
  </div>  
</div>
<div class="bottom-text-container">
    <h5>Located Inside Nourish Skin Studio</h5>
</div>
  <hr>
<div class="about-container"> 
  <div class="about-image-container">
    <img src="<? echo get_theme_file_uri('/images/profile1.jpg') ?>" class="about-profile" />
  </div> 
  <div class="about-content-container">
  <?php show_post('About'); ?>
  </div> 
</div>
<hr>
<div class="reviews">
<?php echo do_shortcode( '[grw id="142"]' ); ?>
</div>
<hr>
<div class="map-container">
<div class="map-content-container">
<img src="<? echo get_theme_file_uri('/images/logo1.png') ?>" class="main-logo" />
</div>
<div class="map-content-container">
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=12Dnh-abPAXdskh4QwQ5ZQjUVu6y2XCQA&ehbc=2E312F" ></iframe>
</div>
</div>
<hr>
<?php get_footer(); ?>
