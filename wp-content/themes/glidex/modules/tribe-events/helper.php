<?php

if( ! function_exists('glidex_event_breadcrumb_title') ) {
    function glidex_event_breadcrumb_title($title) {
        if( get_post_type() == 'tribe_events' && is_single()) {
            $etitle = esc_html__( 'Event Detail', 'glidex' );
            return '<h1>'.$etitle.'</h1>';
        } else {
            return $title;
        }
    }

    add_filter( 'glidex_breadcrumb_title', 'glidex_event_breadcrumb_title', 20, 1 );
}

?>