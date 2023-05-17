<?php /* Template Name: Posts */ ?>
<?php get_header() ?>
<?php // <!-- ****** - MAIN - ****** -->  ?>
<main class="container sub-page__padding">
<?php // <!-- HEADER --> ?>
    <header class="subpage__header">
        <h1 class="section-title">
             <?php the_title() ?>          
        </h1>
        <?php include(locate_template('template-parts/template-categories.php'));?>  
        <?php include(locate_template('template-parts/template-bubbles-deco.php')) ?>
    </header>

    <?php // <!-- *********** FIRST POSTS SECTION *************** --> ?>
    <?php // <!-- Create an empty array to later push the post-ids into the variable (Avoid Double Posts) --> ?>
    <?php $post_ids = array(); ?>
    <?php // <!-- Retrieve Data --> ?>
    <?php $blog_posts = new WP_Query(array (
        'post_type' => 'post',
        'posts_per_page' => 9,
        'orderby' => 'date',
        'oder' => 'DESC', //descending order from highest to lowest values
    )) ?>
    <?php // <!-- Print Post Data --> ?>
    <?php if($blog_posts->have_posts()): ?>
        <section class="section-blog">
            <h3 class="hide-cursor"><?php _e('Latest posts', '_themename') ?></h3>
             <!-- CAROUSEL -->
             <div class="owl-carousel owl-theme hide-cursor">
                <?php while($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <?php include(locate_template('template-parts/post-loop.php')) ?>
                <?php endwhile; ?>
             </div>
        </section>
    <?php endif; ?>
    <?php // <!-- Reset Data --> ?>
    <?php wp_reset_postdata(); ?>

    <?php // <!-- ************* SECOND POSTS SECTION ***************** -->   ?>
    <?php // <!-- Retrieve Data --> ?>
    <?php $blog_posts = new WP_Query(array (
    'post_type' => 'post',
    'posts_per_page' => 9,
    'orderby' => 'rand',
    //will not show the post-ids that already have been displayed
    'post__not_in' => $post_ids
    )) ?>
    <?php if($blog_posts ->have_posts()): ?>
        <section class="section-blog">
            <h3 class="hide-cursor"><?php _e('Recommended posts', '_themename') ?></h3>
            <?php // <!-- CAROUSEL --> ?>
             <div class="owl-carousel owl-theme hide-cursor">
                <?php while($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <?php include(locate_template('template-parts/post-loop.php')) ?>
                <?php endwhile; ?>
             </div>
        </section>
    <?php endif; ?>
    <?php // <!-- Reset Data --> ?>
    <?php wp_reset_postdata(); ?>

    <?php // <!-- Enqueue the styles --> ?>
    <?php 
                wp_enqueue_style('owl-css');
                wp_enqueue_style('owl-theme-css');
                wp_enqueue_script('owl-script-min');
                wp_enqueue_script('owl-script');
    ?>

    <?php // <!-- Button --> ?>
    <div class="section__posts--button">
        <a href="<?php echo get_post_type_archive_link('post') ?>" class="btn-primary hide-cursor"> <?php _e(' Show all Posts', '_themename') ?></a>
    </div>
</main>
<?php get_footer() ?>
