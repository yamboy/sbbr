<?php get_header(); ?>
<div class="page-content-outer"><div class="page-content clearfix">

  <div class="left">
      <div class="subhead clearfix">
	<h1><?php echo $title; ?></h1>
      </div>
      <?php if ($description): ?>
      <div class="tag_description"><?php echo $description;?></div>
      <?php endif; ?>

      <div class="news posts">
      <?php
      while ( have_posts() ) : the_post(); ?>
	  <div class='item'>
	    <?php if ($post->post_type == 'events'): ?>
	      <div class="event_date">EVENT: <?php
		echo strtoupper(date('M d, Y', strtotime(get_field('event_date'))));
		$location = get_field('location');
		if ($location):
		  ?> in <span class="location"><?php echo $location;?></span><?php
		endif;
	      ?></div>
	    <?php else: ?>
	      <div class="date"><?php echo get_the_date('m/d/y'); ?></div>
	    <?php endif; ?>
	      <h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
	      <div class="image"><a href='<?php the_permalink(); ?>'><?php the_post_thumbnail("thumbnail"); ?></a></div>
	      <?php the_excerpt(); ?>
	      <div class="clearfix">
		<div class="more pill"><a href='<?php the_permalink(); ?>'>Learn More</a></div>
		<div class="share bubble"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($post));?>">+ Share</a></div>
	      </div>
	  </div>
      <?php endwhile; // end of the loop. ?>
      </div>

      <div class="pager clearfix">
	<div class="prev"><?php echo get_previous_posts_link('&laquo; Previous'); ?></div>
	<div class="next"><?php echo get_next_posts_link('Next &raquo;'); ?></div>
      </div>

  </div>

</div></div><!-- /page-content , /page-content-outer -->

<?php get_footer(); ?>
