<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?> 
<?php 
      //PDF FILE
      $file = get_field('resume_pdf', 'options');
      $text_with_image = get_field('text_with_image'); 
      // Sets the class .left .right
      $reverse_layout = $text_with_image['reverse'];
?>

<?php // ****** - MAIN - ****** ?>
<main class="container">
<?php // HEADER ?>
  <header class="page__header <?php echo $reverse_layout ?>">
    <?php // Check if there is an Image (Styles the text and Btn in the Middle)?>
    <?php if(empty($text_with_image['image'])) {
    $class_without_image = 'page__header--content__has-no-image';
    } else {
    $class_without_image = '';
    } ?>

<?php // HEADER TEXT ?>
    <div class="page__header--content <?php echo $class_without_image ?>">
      <div class="text-wrapper text-wrapper-small hide-cursor">
        <?php // Title ?>
        <h1 class="main-heading">
            <?php echo $text_with_image['heading']; ?>
            <?php // Last Word (may be colorized) ?>
            <?php if(!empty($text_with_image['heading_last_word'])): ?>
              <span  class="<?php echo $text_with_image['colorise_text'] ?>">               
              <?php echo $text_with_image['heading_last_word']; ?>
              </span>  
            <?php endif; ?>
          </h1>
          <?php // Text ?>
          <p class="text">
            <?php echo  $text_with_image['paragraph']; ?>
          </p>
      </div>
      <?php //PDF File ?>
      <?php if(!empty($text_with_image['button_text'] && !empty($file['url'])) ): ?>
      <a
        href="<?php echo $file['url']; ?>"
        class="btn-primary hide-cursor"
        target="_blank"
      >
        <?php echo $text_with_image['button_text'] ?>
      </a>
      <?php endif; ?>
    </div>
    <?php // HEADER IMAGE ?>
    <?php if(!empty($text_with_image['image'])): ?>
      <div class="page__header--image">
        <img
          class="hide-cursor"
          src="<?php echo $text_with_image['image'] ?>"
          aria-hidden="true"
        />
      </div>
    <?php endif; ?>
  </header>

  <?php include(get_template_directory() . '/template-parts/template-bubbles-deco.php') ?>
</main>
<?php get_footer() ?>
