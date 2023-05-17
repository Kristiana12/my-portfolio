<?php get_header() ?>
<?php $project_details = get_field('project_detail_page');?>
<?php // <!-- ****** - MAIN - ****** --> ?>
<main class="container sub-page__padding">


    <a href='<?php the_field('project_link') ?>' class='btn-secondary hide-cursor'>
        <?php _e('Back', '_themename') ?>
    </a>
    <?php // <!-- HEADER --> ?>
    <header>
        <h1 class="section-title">
            <?php //Set a title 
                if(!empty($project_details['page_title'])) {
                    echo $project_details['page_title'];
                } else {
                    the_title(); 
                } ?>
        </h1>
        <?php echo wp_get_attachment_image($project_details['image'], 'full', false, array('class' => 'project__header--image hide-cursor')) ?>
    </header>
    <?php // <!-- Show the tools used for this project --> ?>
    <div class="project__content--tech">
        <h3 class="project__content--subtitle hide-cursor">Build with: </h3>
        <?php if(have_rows('project_tools')): ?>
        <ul class='project__content--tech__list'>
            <?php while(have_rows('project_tools')) : the_row();
                     $tool = get_sub_field('tool_image'); ?>
            <li class='project__content--tech__list--image'>
                <?php echo wp_get_attachment_image($tool) ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
    <?php // <!-- SECTION DESCRIPTION --> ?>
    <section class="project__content">
        <h2 class="project__content--title hide-cursor"><?php _e('Description', '_themename') ?></h2>
        <?php if( have_rows('project_detail_page') ): while ( have_rows('project_detail_page') ) : the_row(); ?>
        <div class="project__content--text hide-cursor">
            <?php if( have_rows('text') ): while ( have_rows('text') ) : the_row(); 
                        $paragraph = get_sub_field('paragraph'); ?>
            <?php if(!empty($paragraph)): ?>
            <p class="text"><?php echo $paragraph ?> </p>
            <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
        <?php endwhile; endif; ?>
        <div class="project__content--actions">
            <a href="<?php echo $project_details['url'] ?>" class="btn-primary project__content--button hide-cursor"
                rel="nofollow" target="_blank">Show website</a>
            <a href="<?php echo $project_details['github_url'] ?>"
                class="btn-primary project__content--button hide-cursor" rel="nofollow" target="_blank">Show Github
                Repo</a>
        </div>
    </section>
    <?php include(locate_template('template-parts/template-bubbles-deco.php')); ?>
</main>
<?php get_footer() ?>