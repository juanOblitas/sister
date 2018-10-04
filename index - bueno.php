<?php
  get_header();
?>
  
    <main>

    <!-- Carrusel dinamico -->

    <?php
        $args = array(
          'post_type' => 'rebeca_slider',
          'posts_per_page' => 3
          );
        $loop = new WP_Query( $args );

        if ($loop->have_posts()) : ?>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
              $l = $loop->post_count;
              for ($i = 0; $i < $l; $i++) { ?>
                <li data-target="#carouselExampleControls"
                    data-slide-to="<?php echo $i; ?>"
                    <?php if ($i == 0) { ?> class="active"<?php } ?>>
                </li>
              <?php
              }
              ?>
            </ol>
            <div class="carousel-inner w-100 text-center" role="listbox">
            <?php
              $n = 0;
              while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="carousel-item <?php if($n == 0) { echo 'active'; } ?>">

                  <?php echo get_the_post_thumbnail( $loop->ID, 'rebeca-featured-image' ); ?>

                  <div class="carousel-caption">

                    <?php the_content(); ?>

                  </div>

                </div>

                <?php
                $n++;
              endwhile;
            ?>
            </div>
          </div>
        <?php
        endif;
        ?>
    <!-- Fin carrusel dinamico -->
    
    </main>
 
<?php
  get_footer();
?>
