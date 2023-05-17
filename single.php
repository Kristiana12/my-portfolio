<?php get_header() ?>
<?php // Get the category slug
      $categories = get_the_category( get_the_ID());        
?>

<?php //<!-- ****** - MAIN - ****** --> ?>
<main class='hide-cursor sub-page__padding blog-page-container'>
<?php // <!-- HEADER --> ?>
   <header class='blog-page-header'> 
      
         <h1 class="blog-title <?php if(!empty($categories)): ?>blog-title-<?php echo esc_html( $categories[0]->slug )?><?php endif; ?>">
            <?php the_title(); ?>
         </h1>
      
      <div class="blog-page-subheader ">
         <?php $post_icons = get_field('post_icons', 'options'); ?>
         <div class="blog-page-subheader__field">
            <?php if(!empty($post_icons['clock'])): ?>
               <?php echo wp_get_attachment_image($post_icons['clock']) ?>
            <?php endif; ?>
            <p><?php _e('Read Time: ', '_themename')?> <?php echo reading_time(); ?> </p>
         </div>
         <?php // <!-- Check if there are any tags linked to the post --> ?>
         <?php the_tags('<div class="blog-page-subheader__field">' . wp_get_attachment_image($post_icons['tag']) .  '<p class="tags">', ', ' , '</p> </div>') ?>
      </div>
   </header>

   
      <section class="blog-page-content <?php if(!empty($categories)): ?>blog-page-<?php echo esc_html( $categories[0]->slug )?><?php endif; ?>">
         <!-- Gutenberg Loop -->
         <?php include(locate_template('template-parts/gutenberg-loop.php')); ?>
      </section>
   
   <?php // <!-- Button --> ?>
    <div class="section__posts--button">
        <a href="<?php echo get_post_type_archive_link('post') ?>" class="btn-primary hide-cursor"> <?php _e(' Back to all Posts', '_themename') ?></a>
   </div>
</main>
<?php get_footer() ?>
