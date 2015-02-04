
  <div style='clear: both; height: 0px'></div>
</div><!-- end .container -->


<div class="footer-outside"><div class="footer clearfix">

    <div class="copy">
    </div>

    <div class="wrap clearfix">
        <div class="navigation">
            <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'footer-navbar', 'container' => false, 'items_wrap' => '<ul class="nav footer-navbar-socialnav">%3$s</ul>')); ?>
        </div>
	<div class="credits clearfix">
	<a class="meatoes" target="_blank" href="http://www.meatoes.com/">Meat &amp; Potatoes</a>
	<a class="chime" target="_blank" href="http://www.chime.com/"><img alt="chime" border=0 width="62" height="23" src="<?php echo get_template_directory_uri();?>/images/chime-logo.png"></a>
	</div>
    </div>

</div></div>

<?php wp_footer(); ?>
</body>
</html>
