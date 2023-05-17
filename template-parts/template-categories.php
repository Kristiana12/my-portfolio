<!-- CATEGORIES -->
<div class="page__header--content page__subpage--content center">
    <?php // <!-- Title --> ?>
    <h5 class="hide-cursor"><?php _e('What would you like to learn about?', '_themename')?></h5>
    <?php // <!-- List of categories --> ?>
    <nav class="category-nav">
        <ul class = "categories hide-cursor">
            <?php // <!-- List of Categories - Need to make them on WP to work --> ?>
            <?php
                wp_list_categories(array(
                    'hierarchical' => false,
                    'show_option_all' => false,
                    'title_li' => '',
                    // Show categories even if they are empty (useful for styling beforehand)
                    //'hide_empty' => false
                ))
            ?>
        </ul>
    </nav>       
</div>  