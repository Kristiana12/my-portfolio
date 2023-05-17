<?php get_header() ?>
<?php //<!-- ****** - MAIN - ****** -->  ?>
<main class="container sub-page__padding">
    <?php // <!-- HEADER --> ?>
    <header class="subpage__header">
        <h1 class="section-title">           
            <?php // <!-- Wenn category => cat_title archive=> archive_title --> ?>
            <?php 
                if(is_category()) {
                    single_cat_title();
                } else {
                    the_archive_title();
                };    
            ?>
        </h1>
        <?php the_archive_description('<p>', '</p>') ?>

        <?php // <!-- CATEGORIES --> ?>
        <div class="page__header--content page__subpage--content center">  
            <h5 class="hide-cursor"><?php _e('What would you like to learn about?', '_themename') ?></h5>
            <?php // <!-- CATEGORIES NAVIGATION --> ?>
            <nav class="category-nav">
                <ul class = "categories hide-cursor">
                    <?php // <!-- List of Categories - Need to make them on WP to work  ?>
                    <?php
                        wp_list_categories(array(
                            'hierarchical' => false,
                            'show_option_all' => false,
                            'title_li' => '',
                            // Show categories even if they are empty
                            //'hide_empty' => false
                        ))
                    ?>
                </ul>
            </nav>         
        </div>   
        <?php include(locate_template('template-parts/template-bubbles-deco.php')) ?>
    </header>

    <?php // <!-- BLOG SECTION 1 --> ?>
    <?php if(have_posts()):?>  
        <section class="section-blog section__posts">
                <div class="section__posts--all">
                    <?php while(have_posts()) : the_post(); ?>
                        <?php include(locate_template('template-parts/post-loop.php')) ?>
                    <?php endwhile; ?>
               </div>        	
               <?php //<!-- ********** PAGINATION *********** --> ?>
               <?php include(locate_template('template-parts/pagination.php')) ?>
        </section>
    <?php else: ?>
    <?php // <!-- In case no posts are found --> ?>
    <h5 class="hide_cursor">
        <?php _e('No posts were found!', '_themename') ?>
    </h5>         
    <?php endif; ?>
    <!-- Button -->
    <div class="section__posts--button ">
        <a href="<?php echo get_post_type_archive_link('post') ?>" class="btn-primary hide-cursor"> <?php _e('Back to all Posts', '_themename') ?></a>
    </div>
</main>
 <?php get_footer(); ?>