<?php
add_action( 'glidex_after_main_css', 'footer_style' );
function footer_style() {
    wp_enqueue_style( 'glidex-footer', get_theme_file_uri('/modules/footer/assets/css/footer.css'), false, GLIDEX_THEME_VERSION, 'all');
}

add_action( 'glidex_footer', 'footer_content' );
function footer_content() {
    glidex_template_part( 'content', 'content', 'footer' );
}