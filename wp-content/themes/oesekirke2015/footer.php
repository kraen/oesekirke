<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php get_search_form(); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div>
      <div class="col-md-4">
        <address>
          <strong>Øse Kirke</strong><br>
          Sønderskovvej 123, Øse<br>
          6800 Varde<br>
          Tlf. 75 29 80 30
        </address>
        <p><a href="https://www.google.dk/maps/place/Øse+Kirke/@55.645846,8.654002,17z/data=!3m1!4b1!4m2!3m1!1s0x464b1a3b8a1f469d:0x515334ab6925482f?hl=da">Find vej</a></p>
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
};

$(document).ready(main);

</script>

</body>
</html>
