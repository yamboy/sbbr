<?php
/*
Template Name: Search Page
*/

global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();
foreach($query_args as $key => $string) {
  $query_split = explode("=", $string);
  $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach
$search_term = '';
if (!empty($search_query['s'])) {
  $search_term = ": ".$search_query['s'];
}

$total_results = $wp_query->found_posts;
if ($total_results) {
  $search_term .= " ($total_results matches";
  if( $wp_query->max_num_pages ):
    $curpage = intval(get_query_var('paged'));
    if (!$curpage) $curpage = 1;
    $search_term .= ' - page '.$curpage.'/'.intval($wp_query->max_num_pages);
  endif;
  $search_term .= ")";
}
?>
<?php get_header(); ?>

<div class="page-content-outer"><div class="page-content clearfix">

  <div class="left">
      <div class="subhead clearfix">
	<h1>Search Results<?php echo $search_term;?></h1>
      </div>

    <div class="posts">
      <?php
      if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
	  <div class='item'>
	      <div class="date"><?php echo get_the_date('m/d/y'); ?></div>
	      <h2> <a href="<?php the_permalink();?>"><?php the_title(); ?></a> </h2>
	      <?php if (has_post_thumbnail()): ?>
	      <a href="<?php the_permalink();?>"><?php the_post_thumbnail("thumbnail"); ?></a>
	      <?php endif; ?>
	      <?php the_excerpt(); ?>
	      <div class="clearfix">
		<Div class="more pill"><a href='<?php the_permalink(); ?>'>Learn More</a></div>
		<?php /* <div class="share bubble"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($post));?>">+ Share</a></div> */ ?>
		<div class="hupso-share-buttons share">
		  <!-- Hupso Share Buttons - http://www.hupso.com/share/ -->
		  <a class="hupso_pop" href="http://www.hupso.com/share/"><img src="/wp-content/themes/rex-theme/images/share.png" style="border:0px" alt="Share" /></a>
		  <script type="text/javascript">var hupso_services=new Array("Twitter","Facebook","Google Plus");var hupso_icon_type = "icons";var hupso_background="#EAF4FF";var hupso_border="#66CCFF";var hupso_twitter_via = "rexfoundation";var hupso_image_folder_url = "";var hupso_twitter_via="rexfoundation";var hupso_url="<?php echo addslashes(get_permalink($post));?>";var hupso_title="<?php echo addslashes($post->post_title);?>";</script>
		  <script type="text/javascript" src="http://static.hupso.com/share/js/share.js"></script>
		  <!-- Hupso Share Buttons -->
		</div>      

	      </div>
	  </div>
      <?php endwhile; // end of the loop.
      else:
	  echo "No results matching \"" . get_search_query() . "\".";
      endif;
	  ?>

      <div class="pager clearfix">
	<div class="prev"><?php echo get_previous_posts_link('&laquo; Previous'); ?></div>
	<div class="next"><?php echo get_next_posts_link('Next &raquo;'); ?></div>
      </div>
    </div>

  </div>

  <div class='sidebar'><div class='sidebar-inside'>
    <?php dynamic_sidebar("events-archive-sidebar"); ?>
    <?php dynamic_sidebar("all-sidebar"); ?>
  </div></div><!-- /sidebar-inside, /sidebar -->

</div></div><!-- /page-content , /page-content-outer -->

<?php get_footer(); ?>

