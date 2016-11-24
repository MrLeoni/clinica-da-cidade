<?php
 // Creating args for query of post in "Infraestrutura" custom taxonomy inside "Complementos" post type
 $infra_args = array(
  "post_type" => "complementos",
  "orderby" => "modified",
  "tax_query" => array(array("taxonomy" => "tipoComplemento", "field" => "slug", "terms" => "infraestrutura")),
  "posts_per_page" => 9999,
 );
 
 // Creating query...
 $infra_query = new WP_Query($infra_args);
?>

<section id="about-infra">
  <div class="container">
    <div class="row">
      
      <div class="col-sm-12 custom-tabs">
      <ul class="nav nav-tabs" role="tablist">
        <?php
            // Creating $number to track de post number inside de Loop
            // The post $number = 1 will always have class="active"
            // The nexts posts will not have class="active"
            $number = 1;
            // Beginning of the Loop
            while($infra_query->have_posts()): $infra_query->the_post();
            // Getting post slug to use as ID
            global $post;
            // Creating a If to check if is the first post on the loop
            if($number < 2): ?>
            <li role="presentation" class="active">
          <?php else : ?>
            <li role="presentation">
          <?php endif; ?>
              <a href="#<?php echo $post->post_name ?>" aria-controls="<?php echo $post->post_name ?>" role="tab" data-toggle="tab"><?php the_title(); ?></a>
            </li>
          <?php
            // Make $number iterate
            $number++;
            // End of the Loop
            endwhile;
            wp_reset_postdata();
        ?>
      </ul>
      <div class="tab-content">
        <?php
          // Using $number to track de post number inside de Loop
          // The post $number = 1 will always have class="in active"
          // The nexts posts will not have class="in active"
          $number = 1;
          // Beginning of the Loop
          while($infra_query->have_posts()): $infra_query->the_post();
          // ACF Fields - Infraestrutura post
          $infra_img01 = get_field("infra-imagem-01");
          $infra_img02 = get_field("infra-imagem-02");
          $infra_img03 = get_field("infra-imagem-03");
          $infra_img04 = get_field("infra-imagem-04");
          $infra_img05 = get_field("infra-imagem-05");
          $infra_img06 = get_field("infra-imagem-06");
          // Post Slug
          global $post;
          // Creating a If to check if is the first post on the loop
          if($number < 2): ?>
          <div role="tabpanel" class="tab-pane fade in active" id="<?php echo $post->post_name ?>">
          <?php else: ?>
          <div role="tabpanel" class="tab-pane fade" id="<?php echo $post->post_name ?>">
          <?php endif; ?>
            <div class="infra-gallery clearfix">
              <a href="<?php echo $infra_img01["url"]; ?>" class="infra-img-link" title="<?php echo $infra_img01["caption"]; ?>">
                <img src="<?php echo $infra_img01["url"]; ?>" alt="<?php echo $infra_img01["alt"]; ?>">
                <p><i class="ion-ios-search"></i></p>
              </a>
              <a href="<?php echo $infra_img02["url"]; ?>" class="infra-img-link" title="<?php echo $infra_img02["caption"]; ?>">
                <img src="<?php echo $infra_img02["url"]; ?>" alt="<?php echo $infra_img02["alt"]; ?>">
                <p><i class="ion-ios-search"></i></p>
              </a>
              <a href="<?php echo $infra_img03["url"]; ?>" class="infra-img-link" title="<?php echo $infra_img03["caption"]; ?>">
                <img src="<?php echo $infra_img03["url"]; ?>" alt="<?php echo $infra_img03["alt"]; ?>">
                <p><i class="ion-ios-search"></i></p>
              </a>
              <a href="<?php echo $infra_img04["url"]; ?>" class="infra-img-link" title="<?php echo $infra_img04["caption"]; ?>">
                <img src="<?php echo $infra_img04["url"]; ?>" alt="<?php echo $infra_img04["alt"]; ?>">
                <p><i class="ion-ios-search"></i></p>
              </a>
              <a href="<?php echo $infra_img05["url"]; ?>" class="infra-img-link" title="<?php echo $infra_img05["caption"]; ?>">
                <img src="<?php echo $infra_img05["url"]; ?>" alt="<?php echo $infra_img05["alt"]; ?>">
                <p><i class="ion-ios-search"></i></p>
              </a>
              <a href="<?php echo $infra_img06["url"]; ?>" class="infra-img-link" title="<?php echo $infra_img06["caption"]; ?>">
                <img src="<?php echo $infra_img06["url"]; ?>" alt="<?php echo $infra_img06["alt"]; ?>">
                <p><i class="ion-ios-search"></i></p>
              </a>
            </div>
          </div>
          <?php
          // Make $number iterate
          $number++;
          // End of the Loop
          endwhile;
          wp_reset_postdata();
        ?>
        </div>
      </div>
    </div>
  </div>
</section>