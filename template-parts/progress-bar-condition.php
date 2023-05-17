<?php 
    if(is_singular()) {
        if ( has_block( 'acf/progress-bar' ) ) {
            wp_enqueue_script('progress-bar');
        }
    }
?>