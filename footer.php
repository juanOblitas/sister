<?php 
/* Footer for corporate-landing-page
 Footer Widgets and scripts are loaded here 
 */
?>
    <footer id="colophon" class="site-footer" role="conteninfo">
        <div class="holder">
            <div class="container">
                <div class="widget-area">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <?php dynamic_sidebar('footer-1');?>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <?php dynamic_sidebar('footer-2');?>    
                        </div>

                            <div class="col-lg-3 col-sm-6">
                                <?php dynamic_sidebar('footer-3');?>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <?php dynamic_sidebar('footer-4');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php do_action( 'corporate_landing_page_footer'); ?>
            <!-- Jc -->
            <div class="container mb-3 mt-3">
                <p class="text-primary p-jc">Siguenos en:</p>
                <a href="https://www.youtube.com/channel/UCkwn9S2MEmsgAFZMz-8Jm5A?view_as=subscriber" target="blank"><i class="fab fa-instagram fa-3x"></i></a>  
                <a href="https://www.facebook.com/joblitasnunez" target="blank"><i class="fab fa-facebook-f fa-3x"></i></a>
                <a href="https://www.youtube.com/channel/UCkwn9S2MEmsgAFZMz-8Jm5A?view_as=subscriber" target="blank"><i class="fab fa-pinterest fa-3x"></i></a>
            </div>
            <!-- fin jc  -->
            
        </footer>
        </div>
        <?php wp_footer();?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        
    </body>
</html>
