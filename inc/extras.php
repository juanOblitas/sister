<?php
//Bread Crumb
if( ! function_exists( 'corporate_landing_page_breadcrumbs' ) ) :
    function corporate_landing_page_breadcrumbs() {
        /* Translator: %s Home url*/    
        printf( '<a href="%1s" class="link">%2s</a>', esc_url( home_url() ), esc_html__( 'Home', 'corporate-landing-page' ) );
        if (is_category() || is_single()) {
            echo esc_attr__( "&nbsp;-&nbsp; ", "corporate-landing-page" );
            the_category(' &bull; ');
            if (is_single()) {
                if( corporate_landing_page_woocommerce_activated() && is_woocommerce() ){
                    $woo_cat = get_the_terms( get_the_ID(), 'product_cat');
                    $main_count = 0;
                    foreach ($woo_cat as $wcat) {
                        $main_count ++;
                        /* Translator: %1s term link */    
                        printf( '<a href="%1s">%2s</a>', esc_url(get_term_link($wcat->term_id)), esc_html($wcat->name) );
                        if( $main_count != count($woo_cat) ){
                            echo esc_attr(' &bull; ');
                        }
                    }
                }
                echo esc_attr__( "&nbsp;-&nbsp;", "corporate-landing-page" );
                the_title();
            }
        } elseif (is_page()) {
            echo esc_attr__( "&nbsp;-&nbsp;", "corporate-landing-page" );
            the_title();
        } elseif (is_search()) {
            echo esc_attr__( "&nbsp;-&nbsp;Search Results for... ", "corporate-landing-page" );
            echo '"<em>';
            echo the_search_query();
            echo '</em>"';
        } elseif (is_archive()){
            echo esc_attr__( "&nbsp;-&nbsp;", "corporate-landing-page" );
            if(corporate_landing_page_woocommerce_activated() && is_shop()) {
                echo esc_attr__( 'Shop', 'corporate-landing-page' );
            } elseif ( is_day() ) {
                echo esc_html(get_the_date() );
            } elseif ( is_month() ) {
               echo esc_html(get_the_date( _x( 'F Y', 'monthly archives date format', 'corporate-landing-page' ) ) );
            } elseif ( is_year() ) {
                echo esc_html(get_the_date( _x( 'Y', 'yearly archives date format', 'corporate-landing-page' ) ) );
            }else {
                the_archive_title( '', '' );
            }
            
        }
    }
    endif;

//Changes Hex Color to RGBA 
function corporate_landing_page_hex_to_rgb($hex, $alpha = false) {
    $hex      = str_replace('#', '', $hex);
    $length   = strlen($hex);
    $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
    $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
    $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
    if ( $alpha ) {
       $rgb['a'] = $alpha;
    }
    $rgb = implode(",", $rgb);
    return $rgb;
 }

/**
 * Main post category dropdown
 */
function corporate_landing_page_main_cat_dropdown() {
    $choices_array = array();
    $terms = get_terms( array( 'taxonomy' => 'category') );
    foreach( $terms as $term ) {
        $choices_array[ $term -> term_id ] = $term -> name;
    }
    return $choices_array;
}

/*Footer copyright*/
if ( ! function_exists( 'corporate_landing_page_footer_credit' ) ) :

    function corporate_landing_page_footer_credit(){
        $allowedposttags = array (
            'div'   => array(
                'class' =>  true
            ),
            'span'  =>  array(
                'class' => true
            ),
            'a' =>  array(
                'href'  =>  true,
                'rel'   =>  true,
                'target'    =>  true,
            )
        );
        /*$variable = array(
                'Descúbrenos' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/',
                    'Pide presupuesto'=>'https://www.google.es/'), 
                '¿Necesitas ayuda?' => array(
                    'Contacto' => 'https://www.google.es/',
                     'Politica de cookies' => 'https://es-es.facebook.com/',
                     'Politica de privacidad' => 'https://www.google.es/',
                     'Mapa web' => 'https://www.google.es/'),
                
                'Servicios' => array(
                    'Mesoterapia' => 'https://www.google.es/',
                     'Cabello' => 'https://es-es.facebook.com/',
                     'Masajes' => 'https://www.google.es/',
                     'Maderoterapia' => 'https://www.google.es/')
            );*/
        $variable = array(
                'Descúbrenos' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/'), 
                'Descúbrenos2' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/'), 
                'Descúbrenos3' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/'), 
                'Descúbrenos4' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/'),
                'Descúbrenos5' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/'), 
                'Descúbrenos6' => array(
                    '¿Quiénes somos?'=>'https://www.google.es/')
            );
        $numColumnas=count($variable);
        $division=12/$numColumnas;
        $rejilla="col-md-".$division;
        $fila="row text-center";
        $row="";
        $atributoCopyright="left-text mb-copyright";
        if($numColumnas==1){
            $row="row";
            $fila="text-right col-xs-6";
            $atributoCopyright="left-text mb-copyright col-xs-6";
        }elseif($numColumnas==2){
            $rejilla="col-xs-".$division;
        }elseif($numColumnas==3){
            $rejilla="myWidth3 col-xs-".$division;
        }elseif($numColumnas==4){
            $rejilla="myWidth col-xs-".$division;
        }elseif($numColumnas==5){
            $rejilla="myWidth2 col-xs-3";
        }elseif($numColumnas==6){
            $rejilla="myWidth2 col-xs-".$division;
        }elseif($numColumnas==7){
            $rejilla="myWidth col-xs-3";
        }elseif($numColumnas==8){
            $rejilla="myWidth col-xs-3";
        }
        $copyright_text = __('Copyright', 'corporate-landing-page').' '.get_bloginfo('name').' '.date('Y');
        $text  = '<div class="site-info">';
        $text .= '<div class="container '.$row.'">';
        $text .= '<div class="'.$atributoCopyright.'">';
        $text .=  $copyright_text;
        $text .= '</div>';
        $text .= '<div class="'.$fila.'">';
                   
        foreach ($variable as $count => $servers_array){
            
        $text .= '<div class="'.$rejilla.'">';
        $text .= '<ul>
                        <div>
                            <li><h2>'.$count.'
                            </h2></li>
                        </div>';
        foreach ($servers_array as $num => $value){
                        
        $text .=       '<div>
                            <li><a href="'.$value.'" target="blank">'.$num.'
                            </a></li>
                        </div>';                                              
        }              
        $text .=   '</ul>';
        $text .= '</div>';            
        }
        $text .= '</div>';
        $text .= '</div>';    


        /*$text .=__('Theme Corporate Landing Page by','corporate-landing-page');
        $text .= '<a href="' . esc_url( 'https://themethread.com/theme/corporate-landing-page/') .'" rel="author" target="_blank">' . esc_html__( ' ThemeThread ', 'corporate-landing-page' ).'</a>';
        $text .=' | ';
        $text .= __(' Powered By', 'corporate-landing-page');
        $text .= '<a href="' . esc_url( 'http://www.wordpress.com') .'" rel="author" target="_blank">' . esc_html__( ' WordPress ', 'corporate-landing-page' ).'</a>';*/
        /*$text .= '</span>';*/
        /*$text .= '</div>';*/
        $text .= '</div>';
      
       echo wp_kses(apply_filters( 'corporate_landing_page_footer_text', $text ), $allowedposttags);
    }
    endif;
    add_action( 'corporate_landing_page_footer', 'corporate_landing_page_footer_credit' );


    
