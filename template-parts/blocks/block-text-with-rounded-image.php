<?php $text_with_rounded_image = get_field('text_with_rounded_image'); 
      // Sets the class .left .right
      $reverse_layout = $text_with_rounded_image['reverse'];
?>
<div class="subpage__header--block-container <?php echo  $reverse_layout ?>">
  <?php // <!-- IMAGE --> ?>
  <?php // <!-- Check if there is an Image (Styles the text and Btn in the Middle) --> ?>
  <?php if(empty($text_with_rounded_image['image'])) {
      $class_without_image = 'page__header--content__has-no-image';
    } else {
      $class_without_image = '';
    }
  ?>

  <?php //<!-- Show image if one is selected --> ?>
  <?php if(!empty($text_with_rounded_image['image'])): ?>
    <div class="page__header--image rounded-image hide-cursor">
       <?php echo wp_get_attachment_image($text_with_rounded_image['image'], 'large') ?>
    </div>
  <?php endif; ?>

  <?php // <!-- TEXT --> ?>
    <div class="page__header--content page__subpage--content <?php echo $class_without_image ?>">
        <?php // <!-- Paragraphs --> ?>
        <div class="text-wrapper has-image hide-cursor">
          <?php if(have_rows('text_with_rounded_image')): while(have_rows('text_with_rounded_image')): the_row() ?>
              <?php if(have_rows('text_block')) : while (have_rows('text_block')) : the_row(); ?>
            <p class="text">
               <?php $paragraph = get_sub_field('paragraph') ?>
               <?php echo $paragraph ?>
            </p>
              <?php endwhile; endif; ?>
            <?php endwhile; endif; ?>
          </div>
  
        <?php // <!-- BUTTON --> ?>
        <a href="<?php echo $text_with_rounded_image['page_link'] ?>" class="btn-primary hide-cursor">
           <?php echo $text_with_rounded_image['button_text'] ?>
        </a>
    </div> 
</div>
