<?php       $pagination_controls = get_field('pagination', 'options');
            the_posts_pagination( array(
                'class' => 'hide-cursor',
                'type' => 'list',
                'mid_size'  => 1,
                'prev_text' => __( $pagination_controls['pagination_previous'] , '_themename' ),
                'next_text' => __( $pagination_controls['pagination_next'], '_themename' ),
                'screen_reader_text' => __('Posts navigation', '_themename') ) ); 
 ?>