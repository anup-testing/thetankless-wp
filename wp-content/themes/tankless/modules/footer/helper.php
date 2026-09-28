<?php
add_action( 'tankless_after_main_css', 'footer_style' );
function footer_style() {
    wp_enqueue_style( 'tankless-footer', get_theme_file_uri('/modules/footer/assets/css/footer.css'), false, TANKLESS_THEME_VERSION, 'all');
}

add_action( 'tankless_footer', 'footer_content' );
function footer_content() {
    tankless_template_part( 'content', 'content', 'footer' );
}