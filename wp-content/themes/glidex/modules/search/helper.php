<?php

    add_action( 'glidex_after_main_css', 'search_style' );
    function search_style() {
        wp_enqueue_style( 'glidex-quick-search', get_theme_file_uri('/modules/search/assets/css/search.css'), false, GLIDEX_THEME_VERSION, 'all');
    }

    add_action('wp_ajax_glidex_search_data_fetch' , 'glidex_search_data_fetch');
	add_action('wp_ajax_nopriv_glidex_search_data_fetch','glidex_search_data_fetch');
	function glidex_search_data_fetch(){

        $search_val = glidex_sanitization($_POST['search_val']);

        $nonce = $_POST['security'];
        if ( ! wp_verify_nonce( $nonce, 'search_data_fetch_nonce' ) ) {
            die( 'Security check failed' );
        }

        $the_query = new WP_Query( array( 'posts_per_page' => 5, 's' => $search_val, 'post_type' => array('post', 'product') ) );
        if( $the_query->have_posts() ) :
            while( $the_query->have_posts() ): $the_query->the_post(); ?>
                <li class="quick_search_data_item">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php the_post_thumbnail( 'thumbnail', array( 'class' => ' ' ) ); ?>
                        <?php the_title();?>
                    </a>
                </li>
            <?php endwhile;
            wp_reset_postdata();
        else:
            echo'<p>'. esc_html__( 'No Results Found', 'glidex') .'</p>';
        endif;

        die();
    }

    add_action( 'wp_enqueue_scripts', 'glidex_enqueue_scripts' );
    function glidex_enqueue_scripts() {
       
        wp_enqueue_script( 'glidex-jqcustom', get_theme_file_uri('/assets/js/custom.js'), array('jquery'), false, true );
    
        $ajax_nonce = wp_create_nonce( 'search_data_fetch_nonce' );
        wp_localize_script( 'glidex-jqcustom', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $ajax_nonce ) );
    }

?>