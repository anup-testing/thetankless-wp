<?php

if( ! function_exists('tankless_event_breadcrumb_title') ) {
    function tankless_event_breadcrumb_title($title) {
        if( get_post_type() == 'tribe_events' && is_single()) {
            $etitle = esc_html__( 'Event Detail', 'tankless' );
            return '<h1>'.$etitle.'</h1>';
        } else {
            return $title;
        }
    }

    add_filter( 'tankless_breadcrumb_title', 'tankless_event_breadcrumb_title', 20, 1 );
}

?>