<?php /* Template Name: Projects */ ?>
<?php get_header()?>
<?php // <!-- ****** - MAIN - ****** --> ?>
<main class="container sub-page__padding" >
  <?php // <!-- HEADER --> ?>
  <header class="subpage__header">
    <h1 class="section-title"><?php the_title(); ?></h1>
  </header>
  <?php // <!-- Gutenberg Loop --> ?>
  <?php include(locate_template('template-parts/gutenberg-loop.php')) ?>
    <?php 
    //Daten Holen 
    $projects_posts = new WP_Query(array(  
        'post_type' => 'projects',
        'posts_per_page' => -1, 
        'orderby' => 'date',
    )); ?>
    <?php // <!-- Daten Ausgeben --> ?>
    <?php if( $projects_posts->have_posts()): ?>
        <?php // <!-- SKILLS SECTION --> ?>
        <section class="section-projects projects__gallery container">
            <h4 class="hide-cursor">
                <?php _e('A few projects I\'ve worked on recently:', '_themename') ?> 
            </h4>
            <?php while($projects_posts->have_posts( )) : $projects_posts->the_post();?>
                <?php $project_image = get_field('project_image') ?>
                <a
                href="<?php the_permalink() ?>"
                title="<?php the_title();  ?>"
                class="projects__gallery--card hide-cursor"
                >
                    <?php echo wp_get_attachment_image($project_image, 'full')  ;?>
                    <div class="projects__gallery--card__text">
                        <p> <?php  the_title(); ?> </p>
                    </div>
                </a>       
            <?php endwhile?>            
        </section>           
        <?php wp_enqueue_script('projects-script'); ?>           
    <?php endif; ?>
    <?php // <!-- Daten löschen --> ?>
    <?php  wp_reset_postdata();  ?> 

    <?php include(get_template_directory() . '/template-parts/template-bubbles-deco.php') ?>
</main>
<?php get_footer() ?>
