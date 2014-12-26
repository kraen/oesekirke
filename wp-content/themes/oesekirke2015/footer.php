<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php get_search_form(); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <a href="https://www.facebook.com/pages/Øse-og-Næsbjerg-kirker/106219799469101" id="noscript" target="_blank">Følg på facebook</a>
      </div>
      <div class="col-md-4">
        <aside class="widget">
          <h3 class="widget-title">Kontakt</h3>
          <address>
            <strong>Øse Kirke</strong><br>
            Sønderskovvej 123, Øse<br>
            6800 Varde<br>
            Tlf. 75 29 80 30<br>
            <?php 
    $content = "info@oesekirke.dk"; 
    $args = array('text' => '',
                              'css_class' => '',
                              'css_id' => '',
                              'echo' => 1); 
    if (function_exists('encryptx')) { 
        encryptx($content, $args); 
    } else { 
        echo sprintf('<a href="mailto:%s" id="%s" class="%s">%s</a>', $content, $args['css_id'], $args['css_class'], ($args['text'] != '' ? $args['text'] : $content)); 
    } 
?>
          </address>
          <p><a href="https://www.google.dk/maps/place/Øse+Kirke/@55.645846,8.654002,17z/data=!3m1!4b1!4m2!3m1!1s0x464b1a3b8a1f469d:0x515334ab6925482f?hl=da">Find vej</a></p>
        </aside>
      </div>
    </div>
  </div>
</div><!-- end .footer -->


<?php wp_footer(); ?>
<script>
var main = function() {

  $('.ngg-albumoverview').addClass('row').removeClass('ngg-albumoverview');
  $('.ngg-album').addClass('col-xs-6 col-md-3').removeClass('ngg-album');

  $('.ngg-navigation').children().each(function(){
    $(this).wrap('<li>');
  });

  $('.ngg-navigation li').wrapAll('<ul class="pagination">');
  $('.pagination .current').parent().addClass('active');
  $('.ngg-navigation').removeClass('ngg-navigation').addClass('clear');

  var atb = $(".fb-like");

  setTimeout(function() {

    if( (atb.height()==0) ||
      (atb.filter(":visible").length==0) ||
      (atb.filter(":hidden").length>0) ||
      (atb.is("hidden")) ||
      (atb.css("visibility")=="hidden") ||
      (atb.css("display")=="none") )
      {
        $("#noscript").css("display", "inline");
      }

    },500);

};



$(document).ready(main);

</script>

</body>
</html>
