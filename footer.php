<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clinica_da_Cidade
 */
 
 // Making $args for query "newsletter" post type
 $news_args = array(
  "post_type" => "newsletter",
  "tax_query" => array(array("taxonomy" => "local", "field" => "slug", "terms" => "rodape"))
 );
 // Querying posts
 $news_posts = new WP_Query($news_args);

?>

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="logo-box">
            <a href="<?php echo esc_html(home_url("/"));?>" title="Clinica da Cidade" ><img src="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/logo-clinica-da-cidade.png" alt="Clinica da Cidade"></a>
          </div>
          <div class="widget-box">
            <?php get_sidebar("footer"); ?>
          </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1 link-boxes">
          <?php 
            // Set de args for the footer menu
            $footer_left_args = array(
              "theme_location"  => "footer",
              "menu_class"      => "footer-menu"
            );
            // Call main menu function
            wp_nav_menu($footer_left_args);
          ?>
        </div>
        <div class="col-sm-3">
          <div class="newsletter-wrapper clearfix">
            <?php
            // Loop for display the "Newsletter" post type query
            while ($news_posts->have_posts()) : $news_posts->the_post(); ?>
              <h4><?php the_title(); ?></h4>
              <div class="newsletter-content-box">
                <?php the_content(); ?>
              </div>
            <?php endwhile; // End of Loop
            wp_reset_postdata(); ?>
            <a class="social-link facebook" href="https://www.facebook.com/clinicacidade" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="row copy">
        <div class="col-sm-12">
          <p>Todos os direitos reservados &copy; 2016 Clinica da cidade</p>
          <a href="http://www.agenciadelucca.com.br" target="_blank">Agência Delucca</a>
        </div>
      </div>
    </div>
  </footer>

</div><!-- #page -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/assets/js/jquery-1.12.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo("template_url"); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/assets/js/jquery.bxslider.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/assets/js/main.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-87497334-1', 'auto');ga('send', 'pageview');
</script>

<?php wp_footer(); ?>

</body>
</html>
