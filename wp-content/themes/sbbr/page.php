<?php get_header(); ?>
<?php setup_postdata($post); ?>

<div class="page-content-outer"><div class="page-content clearfix">

  <div class="left">
      <div class="subhead clearfix">
	<h1><?php the_title(); ?></h1>
      </div>
      <?php the_content(); ?>

      <div class="hupso-share-buttons share">
	<!-- Hupso Share Buttons - http://www.hupso.com/share/ -->
	<a class="hupso_pop" href="http://www.hupso.com/share/"><img src="/wp-content/themes/rex-theme/images/share.png" style="border:0px" alt="Share" /></a>
	<script type="text/javascript">var hupso_services=new Array("Twitter","Facebook","Google Plus");var hupso_icon_type = "icons";var hupso_background="#EAF4FF";var hupso_border="#66CCFF";var hupso_twitter_via = "rexfoundation";var hupso_image_folder_url = "";var hupso_twitter_via="rexfoundation";var hupso_url="<?php echo addslashes(get_permalink());?>";var hupso_title="<?php echo addslashes(get_the_title());?>";</script>
	<script type="text/javascript" src="http://static.hupso.com/share/js/share.js"></script>
	<!-- Hupso Share Buttons -->
      </div>      

  </div>

  <div class='sidebar'><div class='sidebar-inside'>
    <?php dynamic_sidebar("about-sidebar"); ?>
    <?php dynamic_sidebar("all-sidebar"); ?>
  </div></div><!-- /sidebar-inside, /sidebar -->

</div></div><!-- /page-content , /page-content-outer -->

<?php get_footer(); ?>
