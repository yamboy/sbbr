<?php get_header(); ?>

<div class="page-content-outer"><div class="page-content clearfix">

  <div class="left">
      <div class="subhead clearfix">
	<h1>News Archive</h1>
      </div>

      <div class="news-archive posts-archive">
<?php
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    query_posts(array("post_type"=>"post", "posts_per_page"=>get_option("posts_per_page") * 2, "paged"=>$paged));
    while ( have_posts() ) : the_post(); ?>
        <div class='news-item'>
            <div class="date"><?php echo get_the_date('m/d/y'); ?></div>
            <a href='<?php the_permalink(); ?>'><h2> <?php the_title(); ?> </h2></a>
        </div>
    <?php endwhile; // end of the loop. ?>
      </div>

      <div class="pager clearfix">
	<div class="prev"><?php echo get_previous_posts_link('&laquo; Previous'); ?></div>
	<div class="next"><?php echo get_next_posts_link('Next &raquo;'); ?></div>
      </div>

  </div>

  <div class='sidebar'><div class='sidebar-inside'>
    <?php dynamic_sidebar("news-archive-sidebar"); ?>
    <?php dynamic_sidebar("all-sidebar"); ?>
  </div></div><!-- /sidebar-inside, /sidebar -->

</div></div><!-- /page-content , /page-content-outer -->

<?php get_footer(); ?>
