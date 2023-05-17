<?php get_header() ?>
<?php // <!-- ****** - MAIN - ****** --> ?>
<main class="sub-page__padding container">
    <?php // <!-- HEADER --> ?>
    <header class="blog-page-header">
        <h1 class="blog-title tag-title">         
            <?php single_tag_title(''); ?>
        </h1>   
        <div class="page__header--content page__subpage--content center"> 
        <?php // <!-- Get all used tags displayed --> ?>
            <nav class="all-tags">
                <ul>
                    <?php $tags = get_tags('post_tag');
                        if ( $tags ) :
                        foreach ( $tags as $tag ) : ?>
                            <li class="tags hide-cursor">
                                <a class="tag-link" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>">
                                <?php echo esc_html( $tag->name ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>   
    </header>
    
    <?php if(have_posts()):?>
        <?php // BLOG SECTION  ?>
        <section class="section-blog">
                <div class="section__posts--all"> 
                    <?php while(have_posts()) : the_post(); ?>
                        <?php include(locate_template('template-parts/post-loop.php')) ?>
                    <?php endwhile; ?>
                </div>    
                <?php // ********** PAGINATION ***********  ?>
                <?php include(locate_template('template-parts/pagination.php')) ?>
        </section>
    <?php else: ?>
        <?php  // In case no posts are found  ?>
        <h5 class="hide_cursor"><?php esc_attr_e('No posts were found!', '_themename') ?></h5>     
    <?php endif; ?>
    <?php  // Button  ?>
    <div class="section__posts--button ">
        <a href="<?php echo get_post_type_archive_link('post') ?>" class="btn-primary hide-cursor"> <?php _e(' Show all Posts', '_themename') ?></a>
    </div>
    <?php include(locate_template('template-parts/template-bubbles-deco.php')) ?>
</main>
<?php get_footer(); ?>