<?php get_header(); ?>
<?php setup_postdata($post); ?>

<div class='home-slider-outer'><div class='home-slider'>
<?php 
  $home_slider_images = get_field("slider");
  if($home_slider_images):
    /*
    <a href="#" class="unslider-arrow prev">Previous slide</a>
    <a href="#" class="unslider-arrow next">Next slide</a>
    */
  ?>
  <ul>
  <?php 
    //shuffle($home_slider_images);
    foreach($home_slider_images as $slider):
      if ($slider['link']) $data = 'class="link" data="'.$slider['link'].'"';
      echo "<li $data>";
?>
      <div class="item" style="background: url(<?php echo $slider['slider_image']['url'];?>) no-repeat top left; width: 1000px; height: 375px;">
	<h2 class="title"><?php echo $slider['slider_headline'];?></h2>
	<h3 class="subtitle"><?php echo $slider['slider_subhead'];?></h3><?php
	//echo "<Pre>";print_r($img);exit;
	//echo "<img src='".$img['sizes']['large']."' />";
    endforeach;
    echo '</div></li>';
  endif;
?>
    </ul>
</div></div>

<div class="page-content-outer"><div class="page-content clearfix">

<?php the_content(); ?>

</div></div><!-- /page-content, /page-content-outer -->

<?php get_footer(); ?>
