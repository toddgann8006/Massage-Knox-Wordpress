<?php

get_header();

while(have_posts()) {
    the_post(); ?>

    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/knoxville2.jpg') ?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--medium"><?php the_title(); ?></h1>
      </div>
    </div>
    <?php if (is_page('About')) {?>
    <div class="about-container">
  <div class="about-content-container">
    <?php echo get_the_content(); ?>
  </div>  
  <div class="about-content-container">
  <img src="<? echo get_theme_file_uri('/images/profile1.jpg') ?>" class="main-profile" />
  </div> 
</div>
  
<?php
    } if (is_page('Reviews')){ ?>
      <div class="reviews">
    <?php  echo do_shortcode( '[grw id="142"]' );?>
    </div>
   <?php } if(!is_page('About') && !is_page('Reviews')) {
        ?>
        <div class="services-content-container">
    <?php echo get_the_content(); ?>
    </div>
    <?php
    }
    ?>

<?php
}
?>

<hr>

<?php

get_footer();

?>