<?php get_header();?>
    <?php // <!-- ****** - MAIN - ****** --> ?>
    <main class="container page__error--container">
      <?php $error_page = get_field('error_page', 'options'); ?>
      <?php // <!-- Check if there is an Image (Styles the text and Btn in the Middle) --> ?>
      <?php if(empty($error_page['image'])) {
      $class_without_image = 'page__header--content__has-no-image';
      $container_without_image = 'center';
      } else {
      $class_without_image = '';
      $container_without_image = '';
      } ?>

      <?php // <!-- HEADER --> ?>
      <header class="page__error <?php echo $container_without_image ?>">
        <?php // <!-- HEADER IMAGE --> ?>
        <?php if(!empty($error_page['image'])): ?>
            <div class="page__error--image">
              <img
                class="hide-cursor"
                src="<?php echo $error_page['image'] ?>"
                aria-hidden="true"
              />
            </div>
        <?php endif; ?>

        <?php // <!-- HEADER TEXT --> ?>
        <div class="page__header--content page__error--content <?php echo $class_without_image; ?>">
          <div class="text-wrapper text-wrapper-small hide-cursor">
            <h1 class="main-heading">
                <?php echo $error_page['title']; ?>
                <?php // <!-- Last Word (may be colorised) --> ?>
                <?php if(!empty($error_page['title_last_word'])): ?>
                    <span  class="<?php echo $error_page['colorise_text'] ?>">               
                    <?php echo $error_page['title_last_word']; ?>
                    </span>  
                <?php endif; ?>
            </h1>
            <p class="text">
              <?php echo  $error_page['text']; ?>
            </p>
          </div>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
            class="btn-primary hide-cursor" 
          >
            <?php echo $error_page['button_text'] ?>
          </a>
        </div>
        <?php include(locate_template('template-parts/template-bubbles-deco.php')); ?>
      </header>
    </main>
<?php get_footer();?>