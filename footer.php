<footer class="mt-5">
  <div class="container">
    <div class="row py-5">
      <div class="col-12 text-center">

        <p>Copyright &copy; 2018</p>
        <p><a href="https://www.google.dk/maps/place/Øse+Kirke/@55.645846,8.6518133,17z/data=!3m1!4b1!4m5!3m4!1s0x464b1a3b8a1f469d:0x515334ab6925482f!8m2!3d55.645846!4d8.654002?hl=da">Sønderskovvej 123, Øse, 6800 Varde</a></p>
<p>Tlf. 75 29 80 30
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
    }  ?></p>
      </div>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
