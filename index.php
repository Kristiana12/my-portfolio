<?php get_header() ?>
<?php // <!-- ****** - MAIN - ****** -->  ?>
<main class="container sub-page__padding">
<?php // <!-- HEADER --> ?>
    <header class="subpage__header container">
        <h1 class="section-title">         
            <!-- Wenn category => cat_title archive=> Posts -->
            <?php 
                if(is_category()) {
                    single_cat_title();
                } else {
                    echo 'Posts';
                };    
            ?>
        </h1>
        <?php include(locate_template('template-parts/template-categories.php'));?>     
        <?php include(locate_template('template-parts/template-bubbles-deco.php')) ?>
    </header>

    <?php // <!-- ******** ALL POSTS  ******** --> ?>
    <?php $blog_posts = new WP_Query(array (
        'post_type' => 'post',
        'posts_per_page' => 6,
        'orderby' => 'date',
    )) ?>

    <?php if($blog_posts->have_posts()):?>  
        <?php // <!-- BLOG SECTION 1 --> ?>
        <section class="section-blog">
            <h3 class="hide-cursor"><?php  _e('All posts', '_themename') ?></h3>
                <?php // <!-- CAROUSEL 1 --> ?>
            <div class="section__posts--all">
                <?php while($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <?php include(locate_template('template-parts/post-loop.php')) ?>
                <?php endwhile; ?>
            </div>         
            <?php //<!-- ********** PAGINATION *********** --> ?>
            <?php include(locate_template('template-parts/pagination.php')) ?>
        </section>
    <?php else: ?>
        <?php // <!-- In case no posts are found --> ?>
        <h5 class="hide_cursor"><?php esc_attr_e('No posts were found!', '_themename') ?></h5>        
    <?php endif; ?>
    <?php // <!-- Delete Data --> ?>
    <?php wp_reset_postdata(); ?>
</main>
<?php get_footer() ?>

    