
<?php get_header(); ?>

<div class="page-content-outer"><div class="page-content clearfix">

  <div class="left">
    <?php
      $post_nav_title_len = 30;
      $prev_post = get_previous_post();
      $next_post = get_next_post();
      if ($prev_post || $next_post) {
	echo "<div class='post_nav clearfix'>";
      }
      if ($prev_post) {
	$title = $prev_post->post_title;
	if (strlen($title) > $post_nav_title_len) {
	  $title = substr($title, 0, $post_nav_title_len) . '...';
	}

	print "<div class='prev_post'>&laquo; <A href='".get_permalink($prev_post)."'>" . $title . "</a></div>";
      }
      if ($next_post) {
	$title = $next_post->post_title;
	if (strlen($title) > $post_nav_title_len) {
	  $title = substr($title, 0, $post_nav_title_len) . '...';
	}
	print "<div class='next_post'><A href='".get_permalink($next_post)."'>" . $title . "</a> &raquo;</div>";
      }
      if ($prev_post || $next_post) {
	echo "</div>";
      }
    ?> 
    <?php while ( have_posts() ) : the_post();
      $grantee = get_field('grantee');
    ?>

      <div class="main_image"><?php the_post_thumbnail("large"); ?></div>
      <?php if ($post->post_type == 'events'): ?>
      <div class="event_date"><?php
	echo strtoupper(date('M d, Y', strtotime(get_field('event_date'))));
	$location = get_field('location');
	if ($location):
	  ?> in <span class="location"><?php echo $location;?></span><?php
	endif;
      ?></div>
      <?php else: ?>
      <div class="date"><?php echo get_the_date('m/d/y'); ?></div>
      <?php endif; ?>
      <?php if ($grantee) echo '<h2><a href="'.get_permalink($grantee->ID).'">'.$grantee->post_title.'</a></h2>'; ?> 
      <h1> <?php the_title(); ?> </h1>
      <?php /*
      <div class="share bubble clearfix"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($post));?>">+ Share</a></div>
      */ ?>

      <div class="hupso-share-buttons">
	<!-- Hupso Share Buttons - http://www.hupso.com/share/ -->
	<a class="hupso_pop" href="http://www.hupso.com/share/"><img src="/wp-content/themes/rex-theme/images/share.png" style="border:0px" alt="Share" /></a>
	<script type="text/javascript">var hupso_services=new Array("Twitter","Facebook","Google Plus");var hupso_icon_type = "icons";var hupso_background="#EAF4FF";var hupso_border="#66CCFF";var hupso_twitter_via = "rexfoundation";var hupso_image_folder_url = "";var hupso_twitter_via="rexfoundation";var hupso_url="<?php echo addslashes(get_permalink($post));?>";var hupso_title="<?php echo addslashes($post->post_title);?>";</script>
	<script type="text/javascript" src="http://static.hupso.com/share/js/share.js"></script>
	<!-- Hupso Share Buttons -->
      </div>      

      <?php the_content(); ?>
      <?php //the_tags( 'Tags: ', ', ', ''); ?>
    <?php endwhile; // end of the loop. ?>
  </div>

  <div class='sidebar'><div class='sidebar-inside'>
	<?php
	    if($post->post_type == "events") {
	      dynamic_sidebar("upcoming-events-sidebar");
	      dynamic_sidebar("all-sidebar");
	      include_once("inc-event-upcoming_archive.php");
	    }
	    else {
	      dynamic_sidebar("recent-news-sidebar");
	      dynamic_sidebar("all-sidebar");
	      if ($post->post_type == 'grantee-news') {
		include_once('inc-grantee-news-archive.php');
	      }
	      else {
		include_once("inc-news-archive.php"); 
	      }
	    }
	?>

  </div></div><!-- /sidebar-inside, /sidebar -->

</div></div><!-- /page-content , /page-content-outer -->

<?php get_footer(); ?>
