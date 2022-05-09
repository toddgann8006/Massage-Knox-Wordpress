<?php

get_header();

while(have_posts()) {
    the_post(); ?>
<div style="background-image: url(<?php echo get_theme_file_uri('/images/knoxville.jpg') ?>)" class="page-image-container">
<div class="page-image-header">
  <h1><?php the_title(); ?></h1>
</div>  
</div>
<div class="services-content-container">
    <?php echo get_the_content(); ?>
</div>
<?php
}
?>
<hr>
<?php

get_footer();

?>