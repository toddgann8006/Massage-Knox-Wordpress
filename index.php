<?php get_header(); ?>

<div class="image-container">
  <div class="image-header">
    <h1>Welcome</h1>
  </div>  
</div>

<div class="carousel-container">

<?php echo do_shortcode('[metaslider id="42"]'); ?>

</div>

<div class="map-container">
<div class="about-content-container">
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=12Dnh-abPAXdskh4QwQ5ZQjUVu6y2XCQA&ehbc=2E312F" ></iframe>
</div>
<div class="about-content-container">
<img src="<? echo get_theme_file_uri('/images/logo1.png') ?>" class="main-profile" />
</div>
</div>
<?php get_footer(); ?>
