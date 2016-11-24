<form class="custom-search-form clearfix" method="GET" action="<?php echo home_url( '/' ); ?>">
  <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Busca">
  <input type="hidden" value="post" name="post_type" id="post_type" />
  <button type="submit" class="search-btn"><i class="ion-ios-search"></i></button>
</form>