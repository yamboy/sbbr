$ = jQuery.noConflict();
$(document).ready(function() {

  // handle video player inline player replacement
  $(".video-player").click(function() {
    var yt_id = $(this).attr("data-youtube-id");

    var v_width = $(this).width();
    var v_height = $(this).height();
    // override to make sure it stays 16:9 aspect ratio for responsive mode
    v_height = parseInt(v_width * 9 / 16);
    
    //Maybe use the youtube chromeless api instead
    $(this).html('<iframe width="'+v_width+'" height="'+v_height+'" src="//www.youtube.com/embed/'+yt_id+'?autoplay=1" frameborder="0" allowfullscreen></iframe>').css({height: v_height +"px"});
  });

  /*
  // take care of mouseover on the share button image states
  $('a.hupso_pop img').mouseover(function(){
    $(this).attr('src', '/wp-content/themes/rex-theme/images/share-over.png');
  }).mouseout(function(){
    $(this).attr('src', '/wp-content/themes/rex-theme/images/share.png');
  });
  */

  // reponsive nav in mobile hamburger mode
  $('.responsive_menu_container').click(function(){
    $('.header .nav_area .navbar-nav').slideToggle();
    return false;
  }).css({cursor: 'pointer'});
});
