<?php get_header()?>
<?php // <!-- ****** - MAIN - ****** --> ?>
<main class="container sub-page__padding" >
  <?php // <!-- HEADER --> ?>
  <header class="subpage__header">
    <h1 class="section-title"><?php the_title(); ?></h1>
  </header>
  <?php // <!-- Gutenberg Loop --> ?>
  <?php include(locate_template('template-parts/gutenberg-loop.php')) ?>
  <?php include(get_template_directory() . '/template-parts/template-bubbles-deco.php') ?> 
</main>
<?php get_footer() ?>