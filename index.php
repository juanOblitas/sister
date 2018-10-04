

<?php 
get_header();

$colmain = (is_active_sidebar( 'sidebar-1' )) ? 'col-md-8 col-lg-8' : 'col-md-12 col-lg-12';
/* jc */
/*$colmain = (is_active_sidebar( 'sidebar-1' )) ? 'col-md-12 col-lg-12' : 'col-md-12 col-lg-12';*/
$layout = get_theme_mod( 'corporate_landing_page_homepage_layout_style', 'default');?>
<div id="content" class="site-content blog-two">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($colmain); ?>">
        <div id="primary" class="content-area">
          <main id="main" class="site-main">
            <!-- Carrusel dinamico -->

            <?php
            $args = array(
              'post_type' => 'rebeca_slider',
              'posts_per_page' => 3
            );
            $loop = new WP_Query( $args );

            if ($loop->have_posts()) : ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                $l = $loop->post_count;
                $active="";
                for ($i = 0; $i < $l; $i++) { 
                  if ($i == 0){
                    $active="active";
                  }else{
                    $active="";
                  } ?>
                  <li data-target="#carouselExampleIndicators"
                  data-slide-to="<?php echo $i; ?>" class="mr-2 ml-2 "<?php echo $active; ?>
                  ></li>
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
            <!-- Estos a hacen referencia a las flechas de los costados -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <?php
        endif;
        ?>
        <!-- Fin carrusel dinamico -->
        <!-- Inicio post -->
        <?php  
        if(have_posts()):
          while(have_posts()): the_post();
            get_template_part( 'template-parts/content' ); 
          endwhile;
        else:
          get_template_part('template-parts/content' , 'none' );        
          endif;?>
          <div class="clearfix"></div>
          <!-- Fin post -->


        </main>
        <?php corporate_landing_page_pagination(); ?>
      </div>
    </div>
    <?php 
    get_sidebar(); 
    ?>
  </div>
</div>
</div>
<?php get_footer();?>
